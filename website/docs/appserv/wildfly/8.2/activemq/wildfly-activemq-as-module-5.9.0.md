---
layout: page
title: Configuring a Resource Adapter for ActiveMQ on WildFly 8.2
permalink: /java-ee/jms/wildfly-activemq-as-module/
---


    $ mkdir -p /opt/wildfly/8.2.0/modules/system/layers/base/org/apache/activemq/main/

    $ cd /opt/wildfly/8.2.0/modules/system/layers/base/org/apache/activemq/main/
    $ vi module.xml

<br/><br/>

    <module xmlns="urn:jboss:module:1.1" name="org.apache.activemq" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
      <resources>
        <resource-root path="."/>
        <resource-root path="activemq-broker-5.9.0.jar"/>
        <resource-root path="activemq-client-5.9.0.jar"/>
        <resource-root path="activemq-jms-pool-5.9.0.jar"/>
        <resource-root path="activemq-kahadb-store-5.9.0.jar"/>
        <resource-root path="activemq-openwire-legacy-5.9.0.jar"/>
        <resource-root path="activemq-pool-5.9.0.jar"/>
        <resource-root path="activemq-protobuf-1.1.jar"/>
        <resource-root path="activemq-ra-5.9.0.jar"/>
        <resource-root path="activemq-spring-5.9.0.jar"/>
        <resource-root path="aopalliance-1.0.jar"/>
        <resource-root path="commons-pool-1.6.jar"/>
        <resource-root path="commons-logging-1.1.3.jar"/>
        <resource-root path="hawtbuf-1.9.jar"/>
        <resource-root path="spring-aop-3.2.4.RELEASE.jar"/>
        <resource-root path="spring-beans-3.2.4.RELEASE.jar"/>
        <resource-root path="spring-context-3.2.4.RELEASE.jar"/>
        <resource-root path="spring-core-3.2.4.RELEASE.jar"/>
        <resource-root path="spring-expression-3.2.4.RELEASE.jar"/>
        <resource-root path="xbean-spring-3.14.jar"/>
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
    $ wget http://repo1.maven.org/maven2/org/apache/activemq/activemq-rar/5.9.0/activemq-rar-5.9.0.rar
    $ unzip ./activemq-rar-5.9.0.rar -d /opt/wildfly/8.2.0/modules/system/layers/base/org/apache/activemq/main/




    $ cd /opt/wildfly/8.2.0/standalone/configuration
    $ cp standalone-full.xml standalone-full.xml.backup
    $ vi standalone-full.xml

<br/>

    <subsystem xmlns="urn:jboss:domain:resource-adapters:2.0"/>


replace on:


    <subsystem xmlns="urn:jboss:domain:resource-adapters:2.0">
        <resource-adapters>
            <resource-adapter id="activemq-rar.rar">
                <module slot="main" id="org.apache.activemq"/>
                <transaction-support>NoTransaction</transaction-support>
                <config-property name="ServerUrl">
                    tcp://localhost:61616
                </config-property>
                <connection-definitions>
                    <connection-definition class-name="org.apache.activemq.ra.ActiveMQManagedConnectionFactory" jndi-name="java:/ConnectionFactory" enabled="true" use-java-context="true" pool-name="ConnectionFactory"/>
                </connection-definitions>
                <admin-objects>
                    <admin-object class-name="org.apache.activemq.command.ActiveMQQueue" jndi-name="queue/test-queue" use-java-context="true" pool-name="test_queue">
                        <config-property name="PhysicalName">
                            testQueue
                        </config-property>
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
