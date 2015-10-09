---
layout: page
title: Wildfly 8.2 setup jdbc connection with PostgreSQL
permalink: /appservers/wildfly/8.2/jdbc/postgresq/
---


**Download source:**  
https://jdbc.postgresql.org/download.html


**Driver:**
postgresql-9.4-1201.jdbc41.jar  

    $ mkdir -p mkdir -p /opt/wildfly/8.2.0/modules/org/postgresql/main
    $ cd /opt/wildfly/8.2.0/modules/org/postgresql/main
    $ wget  https://jdbc.postgresql.org/download/postgresql-9.4-1201.jdbc41.jar



### Connect JDBC driver as Wildfly module

$ vi /opt/wildfly/8.2.0/modules/org/postgresql/main/module.xml


{% highlight xml %}

<?xml version="1.0" encoding="UTF-8"?>
<module xmlns="urn:jboss:module:1.0" name="org.postgresql">
    <resources>
        <resource-root path="postgresql-9.4-1201.jdbc41.jar"/>
    </resources>

    <dependencies>
        <module name="javax.api"/>
        <module name="javax.transaction.api"/>
    </dependencies>
</module>

{% endhighlight %}



### PostgreSQL Datasource


    $ cp /opt/wildfly/8.2.0//standalone/configuration/standalone.xml /opt/wildfly/8.2.0//standalone/configuration/standalone.xml.orig

<br/>

    $ vi /opt/wildfly/8.2.0/standalone/configuration/standalone.xml


Replase datasource description:

{% highlight xml %}

<subsystem xmlns="urn:jboss:domain:datasources:2.0">
    <datasources>
        <datasource jndi-name="java:jboss/datasources/ExampleDS" pool-name="ExampleDS" enabled="true" use-java-context="true">
            <connection-url>jdbc:h2:mem:test;DB_CLOSE_DELAY=-1;DB_CLOSE_ON_EXIT=FALSE</connection-url>
            <driver>h2</driver>
            <security>
                <user-name>sa</user-name>
                <password>sa</password>
            </security>
        </datasource>
        <drivers>
            <driver name="h2" module="com.h2database.h2">
                <xa-datasource-class>org.h2.jdbcx.JdbcDataSource</xa-datasource-class>
            </driver>
        </drivers>
    </datasources>
</subsystem>

{% endhighlight %}

on

{% highlight xml %}

<subsystem xmlns="urn:jboss:domain:datasources:2.0">
    <datasources>
             <datasource jta="false" jndi-name="java:jboss/postgresDS" pool-name="PostgresDS" enabled="true" use-ccm="false">
                 <connection-url>jdbc:postgresql://192.168.56.3:5432/mydatabase</connection-url>
                 <driver-class>org.postgresql.Driver</driver-class>
                 <driver>postgresql</driver>
                 <pool>
                    <min-pool-size>5</min-pool-size>
                    <max-pool-size>200</max-pool-size>
                </pool>
                 <security>
                     <user-name>scott</user-name>
                     <password>tiger</password>
                 </security>
                 <validation>
                     <validate-on-match>false</validate-on-match>
                     <background-validation>false</background-validation>
                     <background-validation-millis>1</background-validation-millis>
                 </validation>
                 <statement>
                     <prepared-statement-cache-size>0</prepared-statement-cache-size>
                     <share-prepared-statements>false</share-prepared-statements>
                 </statement>
             </datasource>

                   <drivers>
                       <driver name="postgresql" module="org.postgresql">
                          <xa-datasource-class>org.postgresql.Driver</xa-datasource-class>
                       </driver>
                   </drivers>
    </datasources>
</subsystem>

{% endhighlight %}


And in default-bindings block i replaced datasource

{% highlight xml %}

<default-bindings context-service="java:jboss/ee/concurrency/context/default" datasource="java:jboss/datasources/ExampleDS" jms-connection-factory="java:jboss/DefaultJMSConnectionFactory" managed-executor-service="java:jboss/ee/concurrency/executor/default" managed-scheduled-executor-service="java:jboss/ee/concurrency/scheduler/default" managed-thread-factory="java:jboss/ee/concurrency/factory/default"/>

{% endhighlight %}


{% highlight xml %}

<default-bindings context-service="java:jboss/ee/concurrency/context/default" datasource="java:jboss/postgresDS" jms-connection-factory="java:jboss/DefaultJMSConnectionFactory" managed-executor-service="java:jboss/ee/concurrency/executor/default" managed-scheduled-executor-service="java:jboss/ee/concurrency/scheduler/default" managed-thread-factory="java:jboss/ee/concurrency/factory/default"/>

{% endhighlight %}



### PostgreSQL XA Datasource


$ vi /opt/jboss/7.1.1/standalone/configuration/standalone.xml

{% highlight xml %}

<datasources>
***

<xa-datasource jndi-name="java:jboss/PostgresXADS" pool-name="PostgresXADS" enabled="true" use-ccm="false">
      <xa-datasource-property name="ServerName">
          192.168.56.3
      </xa-datasource-property>
      <xa-datasource-property name="PortNumber">
          5432
      </xa-datasource-property>
      <xa-datasource-property name="DatabaseName">
          mydatabase
      </xa-datasource-property>
      <driver>postgresqlXA</driver>
      <xa-pool>
          <min-pool-size>5</min-pool-size>
          <max-pool-size>200</max-pool-size>
          <is-same-rm-override>false</is-same-rm-override>
          <interleaving>false</interleaving>
          <pad-xid>false</pad-xid>
          <wrap-xa-resource>false</wrap-xa-resource>
      </xa-pool>
      <security>
          <user-name>scott</user-name>
          <password>tiger</password>
      </security>
      <validation>
          <validate-on-match>false</validate-on-match>
          <background-validation>false</background-validation>
      </validation>
      <statement>
          <share-prepared-statements>false</share-prepared-statements>
      </statement>
  </xa-datasource>


  ***

  <drivers>

    ***
      <driver name="postgresqlXA" module="org.postgresql">
         <xa-datasource-class>org.postgresql.xa.PGXADataSource</xa-datasource-class>
      </driver>
    ***

  </drivers>

</datasources>


{% endhighlight %}



___



Error:  

    Caused by: org.postgresql.util.PSQLException: FATAL: Ident authentication failed for user "scott" ...

The reason was, because not right properties has been written in the config file.  
/var/lib/pgsql/data/pg_hba.conf

On my test environment i changed all ident on trust. And all start working.

local   all             all                                     peer


___


https://access.redhat.com/documentation/en-US/JBoss_Enterprise_Application_Platform/6/html/Administration_and_Configuration_Guide/Example_PostgreSQL_XA_Datasource.html
