---
layout: page
title: Integrate ActiveMQ with WildFly
permalink: /docs/appserv/wildfly/8.2/active-mq/wildfly-activemq-integration-as-application/
---


# WildFly Integration with apache activemq


    $ cd /tmp/
    $ wget http://repo1.maven.org/maven2/org/apache/activemq/activemq-rar/5.11.1/activemq-rar-5.11.1.rar
    $ unzip activemq-rar-5.11.1.rar -d /opt/wildfly/8.2.0/standalone/deployments/activemq-rar-5.11.1.rar
    $ ls /opt/wildfly/8.2.0/standalone/deployments/activemq-rar-5.11.1.rar


<br/>

    $ cd /opt/wildfly/8.2.0/standalone/configuration
    $ cp standalone-full.xml standalone-full.xml.backup
    $ vi standalone-full.xml

replace block

    <subsystem xmlns="urn:jboss:domain:resource-adapters:2.0">

on

    <subsystem xmlns="urn:jboss:domain:resource-adapters:2.0">
        <resource-adapters>
            <resource-adapter id="activemq">
                <archive>
                    activemq-rar-5.11.1.rar
                </archive>

                <transaction-support>XATransaction</transaction-support>

                <config-property name="UseInboundSession">
                    false
                </config-property>

                <config-property name="UserName">
                    defaultUser
                </config-property>

                <config-property name="Password">
                    defaultPassword
                </config-property>

                <config-property name="ServerUrl">
                    tcp://localhost:61616
                </config-property>

                <connection-definitions>
                    <connection-definition class-name="org.apache.activemq.ra.ActiveMQManagedConnectionFactory" jndi-name="java:/ConnectionFactory" enabled="true" pool-name="ConnectionFactory">

                        <xa-pool>
                            <min-pool-size>1</min-pool-size>
                            <max-pool-size>20</max-pool-size>
                            <prefill>false</prefill>
                            <is-same-rm-override>false</is-same-rm-override>
                        </xa-pool>

                    </connection-definition>
                </connection-definitions>

                <admin-objects>
                    <admin-object class-name="org.apache.activemq.command.ActiveMQQueue" jndi-name="java:jboss/activemq/queue/TestQueue" use-java-context="true" pool-name="TestQueue">

                        <config-property name="PhysicalName">
                            activemq/queue/TestQueue
                        </config-property>

                    </admin-object>

                    <admin-object class-name="org.apache.activemq.command.ActiveMQTopic" jndi-name="java:jboss/activemq/topic/TestTopic" use-java-context="true" pool-name="TestTopic">

                        <config-property name="PhysicalName">
                            activemq/topic/TestTopic
                        </config-property>

                    </admin-object>
                </admin-objects>
            </resource-adapter>
        </resource-adapters>
    </subsystem>


<br/>

    $ standalone.sh -c standalone-full.xml -b=0.0.0.0 -bmanagement=0.0.0.0


<br/>

### To generare resource adaprers xml


    $ wget http://repo1.maven.org/maven2/org/apache/activemq/activemq-rar/5.11.1/activemq-rar-5.11.1.rar
    $ unzip ./activemq-rar-5.11.1.rar -d /opt/wildfly/8.2.0/modules/system/layers/base/org/apache/activemq/main/



ironjacamar  
http://www.ironjacamar.org

    $ wget http://sourceforge.net/projects/ironjacamar/files/1.2.4.Final/ironjacamar-1.2.4.Final.zip

    $ unzip ironjacamar-1.2.4.Final.zip
    $ cd ironjacamar-1.2.4.Final/doc/as/



You need to manually edit the rar-info.sh file and add to the classpath.

/opt/wildfly/8.2.0/modules/system/layers/base/javax/jms/api/main/jboss-jms-api_2.0_spec-1.0.0.Final.jar

/opt/wildfly/8.2.0/modules/system/layers/base/javax/transaction/api/main/jboss-transaction-api_1.2_spec-1.0.0.Final.jar

Simply add paths for them in the rar-info.sh file (separated by character);


    $ vi rar-info.sh

And i added -Dlog4j.ignoreTCL=true in the beginning

    #!/bin/sh
    java -Dlog4j.ignoreTCL=true -classpath ./ironjacamar-as.jar:../../lib/jboss-logging.jar:../../lib/jboss-common-core.jar:../../lib/ironjacamar-spec-api.jar:../../lib/jandex.jar:../../lib/ironjacamar-common-impl.jar:../../lib/ironjacamar-common-api.jar:../../lib/ironjacamar-common-spi.jar:../../lib/ironjacamar-core-impl.jar:../../lib/ironjacamar-core-api.jar:../../lib/ironjacamar-validator.jar:../../lib/jandex.jar:../../lib/validation-api.jar:/opt/wildfly/8.2.0/modules/system/layers/base/javax/jms/api/main/jboss-jms-api_2.0_spec-1.0.0.Final.jar:/opt/wildfly/8.2.0/modules/system/layers/base/javax/transaction/api/main/jboss-transaction-api_1.2_spec-1.0.0.Final.jar:../../lib/hibernate-validator.jar org.jboss.jca.as.rarinfo.Main $*


<br/>

    $ ./rar-info.sh /tmp/activemq-rar-5.11.1.rar -o result.txt




    2015-05-15 09:43:49,512 [ActiveMQ Task-1] INFO  FailoverTransport              - Successfully connected to tcp://localhost:61616
    Done.


Remove the opening <resource-adapters> and <resource-adapter> tags and replace with an <ironjacamar.xml> opening tag in the standalone-full.xml.
