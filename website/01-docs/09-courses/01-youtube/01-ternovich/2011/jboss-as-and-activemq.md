---
layout: page
title: Integrate ActiveMQ with JBoss
description: Integrate ActiveMQ with JBoss
keywords: Integrate ActiveMQ with JBoss
permalink: /courses/youtube/ternovich/2011/jboss-as-and-activemq/
---

# Integrate ActiveMQ with JBoss

<br/>

<div align="center">
    <iframe width="853" height="480" src="https://www.youtube.com/embed/n8Nb6biyeH4" frameborder="0" allowfullscreen></iframe>
</div>

<br/><br/>

Screencast shows how to:

1\. Deploy ActiveMQ  
2\. Run consumer/supplier samples  
3\. Integrate JBoss AS 6 and ActiveMQ  
4\. Enqueue TextMessage from EJB using ActiveMQ

<br/><br/>
<strong>Software:</strong><br/>
JBoss 6.1.0  
Apache Active MQ 5.4.3

<br/>

And i will use centos 6.6.

<br/>

<strong>I created user jboss and installed jdk 1.7.0_75</strong>

<br/>

### JBoss 6.1.0.Final Installation

    # mkdir -p /opt/jboss/6.1.0/
    # chown -R jboss /opt/jboss/6.1.0/
    # su - jboss

<br/>

    $ cd /tmp/
    $ wget http://download.jboss.org/jbossas/6.1/jboss-as-distribution-6.1.0.Final.zip

<br/>

    $ unzip jboss-as-distribution-6.1.0.Final.zip
    $ cd jboss-6.1.0.Final/
    $ mv * /opt/jboss/6.1.0/

<br/>

    $ vi ~/.bash_profile

<br/>

    #### JBoss 6.1.0 ##################

    export JBOSS_HOME=/opt/jboss/6.1.0
    export PATH=$PATH:$HOME/bin:$JBOSS_HOME/bin

    #### JBoss 6.1.0 ##################

<br/>

    $ source ~/.bash_profile

<br/>

### Active MQ 5.4.3 Installation

    # mkdir -p /opt/active-mq/5.4.3/
    # chown -R jboss /opt/active-mq/5.4.3/
    # su - jboss

<br/>

    $ cd /tmp/
    $ wget http://archive.apache.org/dist/activemq/apache-activemq/5.4.3/apache-activemq-5.4.3-bin.zip

<br/>

    $ unzip apache-activemq-5.4.3-bin.zip
    $ cd apache-activemq-5.4.3
    $ mv * /opt/active-mq/5.4.3/

<br/>

    $ cd /opt/active-mq/5.4.3/bin/
    $ java -jar run.jar start

http://192.168.56.3:8161/admin/

192.168.56.3 - my virtual mashine ip address.

<br/>

### First Example with Active MQ Server

Eclipse -> Project Explorer -> Right Click -> Import -> Import -> Git

[Project source codes](https://github.com/webmak1/JBoss-AS-and-ActiveMQ)

<br/>

To work with remote server, you should change url:

    private String url = "failover://tcp://192.168.56.3:61616";

run ProducerTool.java as Java Application

Queue --> 10 Queues added

run ConsumerTool.java as Java Application

Queue --> 10 Queues received

<br/>

### Active MQ integrating with JBoss

    $ cd /opt/active-mq/5.4.3/lib/optional

<br/>

    $ ls activemq-rar-5.4.3.rar
    activemq-rar-5.4.3.rar

<br/>

    $ unzip activemq-rar-5.4.3.rar -d /opt/jboss/6.1.0/server/default/deploy/activemq-rar.rar

<br/>

    $ cd /opt/jboss/6.1.0/server/default/deploy/

<br/>

    $ vi activemq-jms-ds.xml

<br/>

```xml
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
        <depends optional-attribute-name="RARName">jboss.jca:service=RARDeployment,name='activemq-rar.rar'</depends>
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
```

<br/>

**Original article:**  
http://activemq.apache.org/integrating-apache-activemq-with-jboss.html

run jboss server

    $ cd /tmp/
    $ nohup run.sh -c default -b 0.0.0.0

<br/>
+1 ssh session to  console:
<br/>

    $ cd /tmp/
    $ less nohup.out

<br/><br/>
I found in JBoss log:
<br/>

    ***
    10:03:51,828 INFO  [AdminObject] Bound admin object 'org.apache.activemq.command.ActiveMQQueue' at 'activemq/queue/outbound'
    10:03:51,871 INFO  [AdminObject] Bound admin object 'org.apache.activemq.command.ActiveMQTopic' at 'activemq/topic/inbound'
    10:03:52,138 INFO  [ConnectionFactoryBindingService] Bound ConnectionManager 'jboss.jca:service=ConnectionFactoryBinding,name=activemq/QueueConnectionFactory' to JNDI name 'java:activemq/QueueConnectionFactory'
    10:03:52,261 INFO  [ConnectionFactoryBindingService] Bound ConnectionManager 'jboss.jca:service=ConnectionFactoryBinding,name=activemq/TopicConnectionFactory' to JNDI name 'java:activemq/TopicConnectionFactory'
    ***

<br/>

**Project from video:**  
https://www.youtube.com/watch?v=85Zw-Z_GDpQ

<br/>

**Result my source code:**

(If project will not work, change java:/ on java: in the QueueConnectionFactory)

<br/>

[repo](https://github.com/webmak1/Integrate-ActiveMQ-with-JBoss-master)

<br/>

I compiled this project with jdk 1.6 and copied project to deploy folder.

<br/>

<div align="center">
    <img src="/img/courses/youtube/ternovich/2011/jboss-as-and-activemq/pic01.png" alt="JBoss Active MQ Integration">
</div>

---

<br/>

### Next Step. I want to repeat this lesson with wildfly 8.2.

[I installed wildfly 8.2, and attached activemq as a module](//javadev.org/docs/appserv/wildfly/8.2/active-mq/wildfly-activemq-integration-as-application/5.9.0/)

<br/>

**standalone-full.xml**

```xml
<subsystem xmlns="urn:jboss:domain:resource-adapters:2.0">
    <resource-adapters>
        <resource-adapter id="activemq-rar.rar">
            <module slot="main" id="org.apache.activemq"/>
            <transaction-support>NoTransaction</transaction-support>
            <config-property name="ServerUrl">
                tcp://localhost:61616
            </config-property>
            <connection-definitions>
                <connection-definition class-name="org.apache.activemq.ra.ActiveMQManagedConnectionFactory" jndi-name="java:/activemq/QueueConnectionFactory" enabled="true" use-java-context="true" pool-name="QueueConnectionFactory"/>
            </connection-definitions>
            <admin-objects>
                <admin-object class-name="org.apache.activemq.command.ActiveMQQueue" jndi-name="activemq/queue/outbound" use-java-context="true" pool-name="test_queue">
                    <config-property name="PhysicalName">
                        queue.outbound
                    </config-property>
                </admin-object>
            </admin-objects>
        </resource-adapter>
    </resource-adapters>
</subsystem>
```

<br/>

    20:11:01,958 INFO  [org.jboss.as.connector.deployment] (MSC service thread 1-1) JBAS010401: Bound JCA ConnectionFactory [java:/activemq/QueueConnectionFactory]
    20:11:01,959 INFO  [org.jboss.as.connector.deployment] (MSC service thread 1-1) JBAS010401: Bound JCA AdminObject [java:/activemq/queue/outbound]

All Works.
