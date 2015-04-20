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
	# wget http://apache-mirror.rbc.ru/pub/apache/activemq/5.11.1/apache-activemq-5.11.1-bin.tar.gz
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


	$ nohup activemq start &


	$ netstat -tulpn | grep 61616

	(No info could be read for "-p": geteuid()=500 but you should be root.)
	tcp        0      0 :::61616                    :::*                        LISTEN      -


<br/>

5) Login to Active MQ admin console:

http://localhost:8161/admin

Login Username: admin  
Login Password: admin
