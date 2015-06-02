---
layout: page
title: ActiveMQ installation on Centos 6.X
permalink: /java_basics/installation/activemq/centos/6/x86_x64/
---

1) java should be installed. (I had problem when i worked with jdk 1.8.X)

	$ java -version
	java version "1.7.0_75"


<br/>

2)

	# su - root
	# cd /tmp
	# wget http://mirrors.sonic.net/apache/activemq/5.11.1/apache-activemq-5.11.1-bin.tar.gz
	# tar -xvzpf apache-activemq-5.11.1-bin.tar.gz


	# mkdir -p /opt/activemq/5.11.1/
	# mv apache-activemq-5.11.1/* /opt/activemq/5.11.1/

	# ln -s /opt/activemq/5.11.1 /opt/activemq/current

<br/>

3) Change permission to activemq admin on created folder.

You can create new admin with next command

	# useradd user1



	# chown -R user1 /opt/activemq/

Switch to the activemq admin

	# su - user1

<br/>

4) Change the active mq environment variables for activemq admin

	$ vi ~/.bash_profile

<br/>

	#### ACTIVE MQ 5.11.1 #######################

		export ACTIVEMQ_HOME=/opt/activemq/current
		export PATH=$PATH:$ACTIVEMQ_HOME/bin

	#### ACTIVE MQ 5.11.1 #######################


<br/>

	$ source ~/.bash_profile


	$ nohup activemq start


	$ netstat -tulpn | grep 61616

	(No info could be read for "-p": geteuid()=500 but you should be root.)
	tcp        0      0 :::61616                    :::*                        LISTEN      -


	$ netstat -tulpn | grep 8161
        tcp        0      0 :::8161                     :::*                        LISTEN      -



<br/>

5) Login to Active MQ admin console:

http://localhost:8161/admin

Login Username: admin  
Login Password: admin


### hawtio console for active mq release > 5.9


	$ cd /tmp
	$ wget http://central.maven.org/maven2/io/hawt/hawtio-default/1.3.1/hawtio-default-1.3.1.war
	$ unzip hawtio-default-1.3.1.war -d ${ACTIVEMQ_HOME}/webapps/hawtio


	$ cd $ACTIVEMQ_HOME

	$ vi conf/jetty.xml

<br/>

	<bean class="org.eclipse.jetty.webapp.WebAppContext">
	    <property name="contextPath" value="/hawtio" />
	    <property name="resourceBase" value="${ACTIVEMQ_HOME}/webapps/hawtio" />
	    <property name="logUrlOnStart" value="true" />
	</bean>

	$ cd $ACTIVEMQ_HOME/bin

	$ cp activemq activemq.backup
	$ vi activemq

<br/>

	invoke_start(){

	***

	ACTIVEMQ_OPTS="$ACTIVEMQ_OPTS -Dhawtio.realm=activemq"
	ACTIVEMQ_OPTS="$ACTIVEMQ_OPTS -Dhawtio.role=admins"
	ACTIVEMQ_OPTS="$ACTIVEMQ_OPTS -Dhawtio.rolePrincipalClasses=org.apache.activemq.jaas.GroupPrincipal"

<br/>

	$ activemq restart

<br/>

http://192.168.1.11:8161/hawtio/


<br/>


Path: /api/jolokia


With hawtio-default-2.0.0.war not working.  
After i press login (admin/admin), hothing change.  

If you know how to correct, please write.



<!--

<bean class="org.eclipse.jetty.webapp.WebAppContext">
    <property name="contextPath" value="/hawtio" />
    <property name="war" value="${ACTIVEMQ_HOME}/webapps/hawtio-default-1.3.1.war" />
    <property name="logUrlOnStart" value="true" />
</bean>


http://sensatic.net/activemq/activemq-and-hawtio.html
http://stackoverflow.com/questions/26674726/how-to-configure-the-activemq-5-10-0-hawtio-interface

-->
