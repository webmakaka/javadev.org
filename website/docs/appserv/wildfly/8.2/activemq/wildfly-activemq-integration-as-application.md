---
layout: page
title: Integrate ActiveMQ with WildFly
permalink: /java-ee/jms/wildfly-activemq-integration/
---


### WildFly Integration with apache activemq


    $ cd /tmp/

    $ wget http://repo1.maven.org/maven2/org/apache/activemq/activemq-rar/5.11.1/activemq-rar-5.11.1.rar

    $ unzip activemq-rar-5.11.1.rar -d /opt/wildfly/8.2.0/standalone/deployments/activemq-rar-5.11.1.rar

    $ ls /opt/wildfly/8.2.0/standalone/deployments/activemq-rar-5.11.1.rar


============================================================

$ cd /opt/wildfly/8.2.0/standalone/configuration

$ cp standalone-full.xml standalone-full.xml.backup

$ vi standalone.xml

add to block

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



$ standalone.sh -c standalone-full.xml -b=0.0.0.0 -bmanagement=0.0.0.0



http://www.mastertheboss.com/jboss-server/jboss-jms/integrate-activemq-with-wildfly
