---
layout: page
title: Integrate ActiveMQ with WildFly
permalink: /java-ee/jms/wildfly-activemq-integration/
---

<div align="center">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/n8Nb6biyeH4" frameborder="0" allowfullscreen></iframe>
</div>

<br/><br/>

Screencast shows how to:  

1\. Deploy ActiveMQ  
2\. Run consumer/supplier samples  
3\. Integrate JBoss AS 6 and ActiveMQ  
4\. Enqueue TextMessage from EJB using ActiveMQ

<br/><br/>
Distrib:  
http://activemq.apache.org/activemq-5111-release.html
<br/><br/>

apache-activemq-5.11.1-bin.tar.gz

<br/><br/>



http://localhost:8161/admin/

login: admin  
pass: admin  


https://github.com/javadev-org/JBoss-AS-and-ActiveMQ


run ProducerTool.java as Java Application

Queue --> 10 Queues added


run ConsumerTool.java as Java Application



==========================================================================

### WildFly Integration with apache activemq


    $ cd /tmp/

    $ wget http://repo1.maven.org/maven2/org/apache/activemq/activemq-rar/5.11.1/activemq-rar-5.11.1.rar

    $ unzip activemq-rar-5.11.1.rar -d /opt/wildfly/8.2.0/standalone/deployments/activemq-rar-5.11.1.rar

    $ cd /opt/wildfly/8.2.0/standalone/deployments

    $ ls
    activemq-rar-5.11.1.rar


============================================================

$ cd /opt/wildfly/8.2.0/standalone/configuration

$ cp standalone.xml standalone.xml.backup

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



$ standalone.sh -b=0.0.0.0 -bmanagement=0.0.0.0



http://www.mastertheboss.com/jboss-server/jboss-jms/integrate-activemq-with-wildfly



==========================================================


vi /opt/wildfly/8.2.0/modules/system/layers/base/org/apache/activemq/main/module.xml

<module xmlns="urn:jboss:module:1.3" name="org.apache.activemq" slot="5.10" >  
    <resources>  

        <resource-root path="."/>  
        <resource-root path="activemq-broker-5.10.0.jar"/>  
        <resource-root path="activemq-client-5.10.0.jar"/>  
        <resource-root path="activemq-jms-pool-5.10.0.jar"/>  
        <resource-root path="activemq-kahadb-store-5.10.0.jar"/>  
        <resource-root path="activemq-openwire-legacy-5.10.0.jar"/>  
        <resource-root path="activemq-pool-5.10.0.jar"/>  
        <resource-root path="activemq-protobuf-1.1.jar"/>  
        <resource-root path="activemq-ra-5.10.0.jar"/>  
        <resource-root path="activemq-spring-5.10.0.jar"/>  
        <resource-root path="aopalliance-1.0.jar"/>  
        <resource-root path="commons-pool-1.6.jar"/>  
        <resource-root path="commons-logging-1.1.3.jar"/>  
        <resource-root path="hawtbuf-1.10.jar"/>  
        <resource-root path="spring-aop-3.2.8.RELEASE.jar"/>  
        <resource-root path="spring-beans-3.2.8.RELEASE.jar"/>  
        <resource-root path="spring-context-3.2.8.RELEASE.jar"/>  
        <resource-root path="spring-core-3.2.8.RELEASE.jar"/>  
        <resource-root path="spring-expression-3.2.8.RELEASE.jar"/>  
        <resource-root path="xbean-spring-3.16.jar"/>  
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


==========================================================

    $ vi activemq-jms-ds.xml

<?xml version="1.0" encoding="UTF-8"?>

<!DOCTYPE connection-factories
    PUBLIC "-//JBoss//DTD JBOSS JCA Config 1.5//EN"
    "http://www.jboss.org/j2ee/dtd/jboss-ds_1_5.dtd">

<connection-factories>

   <tx-connection-factory>
      <jndi-name>activemq/QueueConnectionFactory</jndi-name>
      <xa-transaction/>
      <track-connection-by-tx/>
      <rar-name>activemq-rar.rar</rar-name>
      <connection-definition>javax.jms.QueueConnectionFactory</connection-definition>
      <ServerUrl>vm://localhost</ServerUrl>
      <!--
      <UserName>sa</UserName>
      <Password></Password>
      -->
      <min-pool-size>1</min-pool-size>
      <max-pool-size>200</max-pool-size>
      <blocking-timeout-millis>30000</blocking-timeout-millis>
      <idle-timeout-minutes>3</idle-timeout-minutes>
   </tx-connection-factory>

   <tx-connection-factory>
      <jndi-name>activemq/TopicConnectionFactory</jndi-name>
      <xa-transaction/>
      <track-connection-by-tx/>
      <rar-name>activemq-rar.rar</rar-name>
      <connection-definition>javax.jms.TopicConnectionFactory</connection-definition>
      <ServerUrl>vm://localhost</ServerUrl>
      <!--
      <UserName>sa</UserName>
      <Password></Password>
      -->
      <min-pool-size>1</min-pool-size>
      <max-pool-size>200</max-pool-size>
      <blocking-timeout-millis>30000</blocking-timeout-millis>
      <idle-timeout-minutes>3</idle-timeout-minutes>
   </tx-connection-factory>

   <mbean code="org.jboss.resource.deployment.AdminObject" name="activemq.queue:name=outboundQueue">
      <attribute name="JNDIName">activemq/queue/outbound</attribute>
      <depends optional-attribute-name="RARName">jboss.jca:service=RARDeployment,name=activemq-rar.rar'</depends>
      <attribute name="Type">javax.jms.Queue</attribute>
      <attribute name="Properties">PhysicalName=queue.outbound</attribute>
   </mbean>

   <mbean code="org.jboss.resource.deployment.AdminObject" name="activemq.topic:name=inboundTopic">
      <attribute name="JNDIName">activemq/topic/inbound</attribute>
      <depends optional-attribute-name="RARName">jboss.jca:service=RARDeployment,name='activemq-rar.rar'</depends>
      <attribute name="Type">javax.jms.Topic</attribute>
      <attribute name="Properties">PhysicalName=topic.inbound</attribute>
   </mbean>

</connection-factories>



    $ standalone.sh -b=0.0.0.0 -bmanagement=0.0.0.0



    http://activemq.apache.org/integrating-apache-activemq-with-jboss.html
