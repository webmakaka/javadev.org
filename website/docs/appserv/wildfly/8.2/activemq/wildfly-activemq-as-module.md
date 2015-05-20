---
layout: page
title: Configuring a Resource Adapter for ActiveMQ on WildFly 8.2
permalink: /java-ee/jms/wildfly-activemq-as-module/
---

### NOT WORKING!


    $ mkdir -p /opt/wildfly/8.2.0/modules/system/layers/base/org/apache/activemq/main/

    $ cd /opt/wildfly/8.2.0/modules/system/layers/base/org/apache/activemq/main/
    $ vi module.xml

<br/><br/>

    <module xmlns="urn:jboss:module:1.1" name="org.apache.activemq" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
      <resources>
        <resource-root path="."/>
        <resource-root path="activemq-amqp-5.11.1.jar"/>
        <resource-root path="activemq-broker-5.11.1.jar"/>
        <resource-root path="activemq-client-5.11.1.jar"/>
        <resource-root path="activemq-jms-pool-5.11.1.jar"/>
        <resource-root path="activemq-kahadb-store-5.11.1.jar"/>
        <resource-root path="activemq-mqtt-5.11.1.jar"/>
        <resource-root path="activemq-openwire-legacy-5.11.1.jar"/>
        <resource-root path="activemq-pool-5.11.1.jar"/>
        <resource-root path="activemq-protobuf-1.1.jar"/>
        <resource-root path="activemq-ra-5.11.1.jar"/>
        <resource-root path="activemq-spring-5.11.1.jar"/>
        <resource-root path="aopalliance-1.0.jar"/>
        <resource-root path="commons-logging-1.1.3.jar"/>
        <resource-root path="commons-net-3.3.jar"/>
        <resource-root path="commons-pool-1.6.jar"/>
        <resource-root path="geronimo-j2ee-management_1.1_spec-1.0.1.jar"/>
        <resource-root path="hawtbuf-1.11.jar"/>
        <resource-root path="hawtdispatch-1.21.jar"/>
        <resource-root path="hawtdispatch-transport-1.21.jar"/>
        <resource-root path="log4j-1.2.17.jar"/>
        <resource-root path="mqtt-client-1.10.jar"/>
        <resource-root path="proton-j-0.8.jar"/>
        <resource-root path="proton-jms-0.8.jar"/>
        <resource-root path="slf4j-api-1.7.10.jar"/>
        <resource-root path="slf4j-log4j12-1.7.10.jar"/>
        <resource-root path="spring-aop-3.2.11.RELEASE.jar"/>
        <resource-root path="spring-beans-3.2.11.RELEASE.jar"/>
        <resource-root path="spring-context-3.2.11.RELEASE.jar"/>
        <resource-root path="spring-core-3.2.11.RELEASE.jar"/>
        <resource-root path="spring-expression-3.2.11.RELEASE.jar"/>
        <resource-root path="xbean-spring-3.18.jar"/>
      </resources>
      <exports>
        <exclude path="org/springframework/**"/>
        <exclude path="org/apache/xbean/**"/>
        <exclude path="org/apache/commons/**"/>
        <exclude path="org/aopalliance/**"/>
        <exclude path="org/fusesource/**"/>
      </exports>
      <dependencies>
        <module name="javax.api"/>
        <module name="org.slf4j"/>
        <module name="javax.resource.api"/>
        <module name="javax.jms.api"/>
        <module name="javax.management.j2ee.api"/>
      </dependencies>
    </module>

<br/><br/>


    $ cd /tmp
    $ wget http://repo1.maven.org/maven2/org/apache/activemq/activemq-rar/5.11.1/activemq-rar-5.11.1.rar
    $ unzip ./activemq-rar-5.11.1.rar -d /opt/wildfly/8.2.0/modules/system/layers/base/org/apache/activemq/main/


ironjacama
http://www.ironjacamar.org

    $ wget http://sourceforge.net/projects/ironjacamar/files/1.2.4.Final/ironjacamar-1.2.4.Final.zip

    $ unzip ironjacamar-1.2.4.Final.zip
    $ cd ironjacamar-1.2.4.Final/doc/as/


=======================================================================
=======================================================================

You need to manually edit the rar-info.sh file and add to the classpath.

/opt/wildfly/8.2.0/modules/system/layers/base/javax/jms/api/main/jboss-jms-api_2.0_spec-1.0.0.Final.jar

/opt/wildfly/8.2.0/modules/system/layers/base/javax/transaction/api/main/jboss-transaction-api_1.2_spec-1.0.0.Final.jar

Simply add paths for them in the rar-info.sh file (separated by character);


    $ vi rar-info.sh

    And i added -Dlog4j.ignoreTCL=true in the beginning

    #!/bin/sh
    java -Dlog4j.ignoreTCL=true -classpath ./ironjacamar-as.jar:../../lib/jboss-logging.jar:../../lib/jboss-common-core.jar:../../lib/ironjacamar-spec-api.jar:../../lib/jandex.jar:../../lib/ironjacamar-common-impl.jar:../../lib/ironjacamar-common-api.jar:../../lib/ironjacamar-common-spi.jar:../../lib/ironjacamar-core-impl.jar:../../lib/ironjacamar-core-api.jar:../../lib/ironjacamar-validator.jar:../../lib/jandex.jar:../../lib/validation-api.jar:/opt/wildfly/8.2.0/modules/system/layers/base/javax/jms/api/main/jboss-jms-api_2.0_spec-1.0.0.Final.jar:/opt/wildfly/8.2.0/modules/system/layers/base/javax/transaction/api/main/jboss-transaction-api_1.2_spec-1.0.0.Final.jar:../../lib/hibernate-validator.jar org.jboss.jca.as.rarinfo.Main $*




    $ ./rar-info.sh /tmp/activemq-rar-5.11.1.rar -o result.txt




    2015-05-15 09:43:49,512 [ActiveMQ Task-1] INFO  FailoverTransport              - Successfully connected to tcp://localhost:61616
    Done.


=======================================================================
=======================================================================

    $ cd /opt/wildfly/8.2.0/standalone/configuration
    $ cp standalone-full.xml standalone-full.xml.backup
    $ vi standalone-full.xml

<br/>

    <subsystem xmlns="urn:jboss:domain:resource-adapters:2.0"/>


replace on:

    <subsystem xmlns="urn:jboss:domain:resource-adapters:2.0">
    <resource-adapters>
      <resource-adapter>
        <archive>activemq-rar-5.11.1.rar</archive>
        <config-property name="UseInboundSession">false</config-property>
        <config-property name="UserName">defaultUser</config-property>
        <config-property name="ServerUrl">tcp://localhost:61616</config-property>
        <config-property name="BrokerXmlConfig"/>
        <config-property name="Clientid"/>
        <config-property name="Password">defaultPassword</config-property>
        <transaction-support>XATransaction</transaction-support>
        <connection-definitions>
          <connection-definition class-name="org.apache.activemq.ra.ActiveMQManagedConnectionFactory" connectable="false" enabled="true" enlistment="true" jndi-name="java:jboss/eis/Connection" pool-name="Connection" sharable="true" use-ccm="true" use-java-context="true">
            <xa-pool>
              <min-pool-size>0</min-pool-size>
              <max-pool-size>10</max-pool-size>
              <prefill>false</prefill>
              <use-strict-min>false</use-strict-min>
              <flush-strategy>FailingConnectionOnly</flush-strategy>
              <pad-xid>false</pad-xid>
              <wrap-xa-resource>true</wrap-xa-resource>
            </xa-pool>
            <security>
              <application/>
            </security>
            <recovery no-recovery="false">
              <recover-credential>
                <security-domain>domain</security-domain>
              </recover-credential>
            </recovery>
          </connection-definition>
          <connection-definition class-name="org.apache.activemq.ra.ActiveMQManagedConnectionFactory" connectable="false" enabled="true" enlistment="true" jndi-name="java:jboss/eis/QueueConnection" pool-name="QueueConnection" sharable="true" use-ccm="true" use-java-context="true">
            <xa-pool>
              <min-pool-size>0</min-pool-size>
              <max-pool-size>10</max-pool-size>
              <prefill>false</prefill>
              <use-strict-min>false</use-strict-min>
              <flush-strategy>FailingConnectionOnly</flush-strategy>
              <pad-xid>false</pad-xid>
              <wrap-xa-resource>true</wrap-xa-resource>
            </xa-pool>
            <security>
              <application/>
            </security>
            <recovery no-recovery="false">
              <recover-credential>
                <security-domain>domain</security-domain>
              </recover-credential>
            </recovery>
          </connection-definition>
          <connection-definition class-name="org.apache.activemq.ra.ActiveMQManagedConnectionFactory" connectable="false" enabled="true" enlistment="true" jndi-name="java:jboss/eis/TopicConnection" pool-name="TopicConnection" sharable="true" use-ccm="true" use-java-context="true">
            <xa-pool>
              <min-pool-size>0</min-pool-size>
              <max-pool-size>10</max-pool-size>
              <prefill>false</prefill>
              <use-strict-min>false</use-strict-min>
              <flush-strategy>FailingConnectionOnly</flush-strategy>
              <pad-xid>false</pad-xid>
              <wrap-xa-resource>true</wrap-xa-resource>
            </xa-pool>
            <security>
              <application/>
            </security>
            <recovery no-recovery="false">
              <recover-credential>
                <security-domain>domain</security-domain>
              </recover-credential>
            </recovery>
          </connection-definition>
        </connection-definitions>
        <admin-objects>
          <admin-object class-name="org.apache.activemq.command.ActiveMQQueue" enabled="true" jndi-name="java:jboss/eis/ao/ActiveMQQueue" pool-name="ActiveMQQueue" use-java-context="true">
            <config-property name="PhysicalName"/>
          </admin-object>
          <admin-object class-name="org.apache.activemq.command.ActiveMQTopic" enabled="true" jndi-name="java:jboss/eis/ao/ActiveMQTopic" pool-name="ActiveMQTopic" use-java-context="true">
            <config-property name="PhysicalName"/>
          </admin-object>
          <admin-object class-name="org.apache.activemq.ActiveMQConnectionFactory" enabled="true" jndi-name="java:jboss/eis/ao/ActiveMQConnectionFactory" pool-name="ActiveMQConnectionFactory" use-java-context="true">
            <config-property name="brokerUrl"/>
          </admin-object>
          <admin-object class-name="org.apache.activemq.pool.XaPooledConnectionFactory" enabled="true" jndi-name="java:jboss/eis/ao/XaPooledConnectionFactory" pool-name="XaPooledConnectionFactory" use-java-context="true">
            <config-property name="tmFromJndi"/>
            <config-property name="brokerUrl"/>
          </admin-object>
        </admin-objects>
      </resource-adapter>
    </resource-adapters>
    </subsystem>


restart wildfly server

    $ standalone.sh -c standalone-full.xml -b=0.0.0.0 -bmanagement=0.0.0.0



<div align="center">
    <img src="https://raw.githubusercontent.com/javadev-org/javadev-org.github.io/master/website/java-ee/jms/wildfly/resource_adapters.png" alt="WildFly ActiveMQ as Module">

</div>


Based on article:  
http://www.mastertheboss.com/jboss-frameworks/ironjacamar/configuring-a-resource-adapter-for-activemq-on-jbosswildfly
