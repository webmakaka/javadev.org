---
layout: page
title: Configuring a Resource Adapter for ActiveMQ on WildFly 8.2
description: Configuring a Resource Adapter for ActiveMQ on WildFly 8.2
keywords: Configuring a Resource Adapter for ActiveMQ on WildFly 8.2
permalink: /docs/appserv/wildfly/8.2/active-mq//wildfly-activemq-integration-as-module/
---

# Configuring a Resource Adapter for ActiveMQ on WildFly 8.2

<br/>

<strong><a href="/docs/appserv/wildfly/8.2/active-mq/wildfly-activemq-integration-as-application/5.9.0/">For active mq version 5.9.0</a></strong>

### Here we will work with active mq version 5.11.1

    $ cd /tmp
    $ mkdir -p /opt/wildfly/8.2.0/modules/system/layers/base/org/apache/activemq/main/

<br/>

    $ wget http://repo1.maven.org/maven2/org/apache/activemq/activemq-rar/5.11.1/activemq-rar-5.11.1.rar
    $ unzip ./activemq-rar-5.11.1.rar -d /opt/wildfly/8.2.0/modules/system/layers/base/org/apache/activemq/main/

<br/>

    $ cd /opt/wildfly/8.2.0/modules/system/layers/base/org/apache/activemq/main/

<br/>

```
$ vi module.xml
```

<br/>

```xml
<module xmlns="urn:jboss:module:1.3" name="org.apache.activemq" slot="main">
    <resources>
        <resource-root path="."/>
        <resource-root path="activemq-broker-5.11.1.jar"/>
        <resource-root path="activemq-client-5.11.1.jar"/>
        <resource-root path="activemq-jms-pool-5.11.1.jar"/>
        <resource-root path="activemq-kahadb-store-5.11.1.jar"/>
        <resource-root path="activemq-openwire-legacy-5.11.1.jar"/>
        <resource-root path="activemq-pool-5.11.1.jar"/>
        <resource-root path="activemq-protobuf-1.1.jar"/>
        <resource-root path="activemq-ra-5.11.1.jar"/>
        <resource-root path="activemq-spring-5.11.1.jar"/>
        <resource-root path="aopalliance-1.0.jar"/>
        <resource-root path="commons-pool-1.6.jar"/>
        <resource-root path="commons-logging-1.1.3.jar"/>
        <resource-root path="hawtbuf-1.11.jar"/>
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
```

<br/>

    $ cd /opt/wildfly/8.2.0/standalone/configuration
    $ cp standalone-full.xml standalone-full.xml.backup

<br/>

    $ vi standalone-full.xml

<br/>

```xml
<subsystem xmlns="urn:jboss:domain:resource-adapters:2.0"/>
```

replace on:

```xml
<subsystem xmlns="urn:jboss:domain:resource-adapters:2.0">
    <resource-adapters>
        <resource-adapter id="activemq-5.11.1">
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
```

<br/>

**restart wildfly server**

```
$ standalone.sh -c standalone-full.xml -b=0.0.0.0 -bmanagement=0.0.0.0
```

<br/>

![WildFly ActiveMQ as Module](/img/appserv/wildfly/8.2/active-mq/resource_adapters.png 'WildFly ActiveMQ as Module'){: .center-image }

<br/><br/>

### Error

```
14:43:38,202 ERROR [org.jboss.as.controller.management-operation] (ServerService Thread Pool -- 49) JBAS014613: Operation ("add") failed - address: ([
    ("subsystem" => "resource-adapters"),
    ("resource-adapter" => "activemq-5.11.1")
]) - failure description: "JBAS010473: Failed to load module for RA [org.apache.activemq]"
```

<br/>

I solved this error by replace parameters slot in standalone-full.xml and module.xml on main

<!--

## WORKS -5.10


<module xmlns="urn:jboss:module:1.3" name="org.apache.activemq" slot="main" >
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

-->
