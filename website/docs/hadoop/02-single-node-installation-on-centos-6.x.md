---
layout: page
title: Hadoop Single Node Installation on Centos 6.X
permalink: /docs/hadoop/centos/6/installation/single-node-installation-on-centos-6/
---

We have virtual mashine with Centos IP 192.168.1.11

<br/>

> Java should be installed
> http://javadev.org/java_basics/installation/jdk/8/linux/centos/6/x86_x64/



<br/>

### Grant permission to access on localhost by SSH without password

	$ ssh-keygen -t dsa -P '' -f ~/.ssh/id_dsa
	$ cat ~/.ssh/id_dsa.pub >> ~/.ssh/authorized_keys
	$ chmod 0700 ~/.ssh/authorized_keys

<br/>


### Hadoop Installation

	# yum install -y \
	openssh-clients

<br/>

	# cd /tmp
    # wget http://apache.claz.org/hadoop/common/hadoop-2.7.1/hadoop-2.7.1.tar.gz

<br/>

    # tar -xvzpf hadoop-2.7.1.tar.gz
    # mkdir -p /opt/hadoop/2.7.1
    # mv hadoop-2.7.1/* /opt/hadoop/2.7.1/

<br/>

    # useradd hadoop
	# passwd hadoop
	# chown -R hadoop /opt/hadoop/

<br/>

    # su - hadoop

<br/>

    $ vi ~/.bash_profile

<br/>


	#### HADOOP 2.7.1 #######################

	export HADOOP_HOME=/opt/hadoop/2.7.1
	export PATH=$PATH:$HADOOP_HOME/bin
	export PATH=$PATH:$HADOOP_HOME/sbin

	#### HADOOP 2.7.1 #######################

<br/>

     $ source ~/.bash_profile

<br/>

	$ hadoop version

<br/>


### Configuration scripts

	$ vi /opt/hadoop/2.7.1/etc/hadoop/hadoop-env.sh

<br/>

	export JAVA_HOME=${JAVA_HOME}

replace on:

	# export JAVA_HOME=${JAVA_HOME}
	export JAVA_HOME=/opt/jdk/current


<br/>

	$ vi /opt/hadoop/2.7.1/etc/hadoop/core-site.xml

<br/>

	***

	<configuration>
	    <property>
	        <name>fs.defaultFS</name>
	        <value>hdfs://localhost:9000</value>
	    </property>
	</configuration>

<br/>

	mkdir -p ~/hadoop_data/hdfs/namenode
	mkdir -p ~/hadoop_data/hdfs/datanode

<br/>

	$ vi /opt/hadoop/2.7.1/etc/hadoop/hdfs-site.xml

<br/>

	***

	<configuration>
	    <property>
	        <name>dfs.replication</name>
	        <value>1</value>
	    </property>
		<property>
			<name>dfs.namenode.name.dir</name>
			<value>file:/home/hadoop/hadoop_data/hdfs/namenode</value>
		</property>
		<property>
			<name>dfs.datanode.name.dir</name>
			<value>file:/home/hadoop/hadoop_data/hdfs/datanode</value>
		</property>
	</configuration>

<br/>

	$ vi /opt/hadoop/2.7.1/etc/hadoop/yarn-site.xml

<br/>

	***

	<configuration>
	    <property>
	        <name>yarn.nodemanager.aux-services</name>
	        <value>mapreduce_shuffle</value>
	    </property>
		<property>
			<name>yarn.nodemanager.aux-services.mapreduce.shuffle.class</name>
			<value>org.apache.hadoop.mapred.ShuffleHandler</value>
		</property>
	</configuration>


<br/>

	$ cp /opt/hadoop/2.7.1/etc/hadoop/mapred-site.xml.template /opt/hadoop/2.7.1/etc/hadoop/mapred-site.xml
	$ vi /opt/hadoop/2.7.1/etc/hadoop/mapred-site.xml

<br/>

	<configuration>
	    <property>
	        <name>mapreduce.framework.name</name>
	        <value>yarn</value>
	    </property>
	</configuration>

<br/>

### Start hadoop daemons

	$ hadoop namenode -format
	$ hadoop-daemon.sh start datanode
	$ hadoop-daemon.sh start namenode

<br/>

	$ jps
	9506 DataNode
	9704 NameNode
	9789 Jps

<br/>

	$ yarn-daemon.sh start resourcemanager
	$ yarn-daemon.sh start nodemanager

<br/>

	$ jps
	9506 DataNode
	10164 Jps
	10055 NodeManager
	9704 NameNode
	9817 ResourceManager


<br/>

	$ mr-jobhistory-daemon.sh start historyserver

<br/>

	$ jps
	9506 DataNode
	10259 Jps
	10195 JobHistoryServer
	10055 NodeManager
	9704 NameNode
	9817 ResourceManager


<br/>

### Connect to hadoop browser console

Summary

	http://192.168.1.11:50070/

All Applications

	http://192.168.1.11:8088/

job history

	http://192.168.1.11:19888



<br/><br/><br/><br/>


Links:

http://hadoop.apache.org/docs/current/hadoop-project-dist/hadoop-common/SingleCluster.html

http://www.youtube.com/watch?v=-XW7IHYTdQc

fix: Unable to load native-hadoop library (NOT TESTED)  
http://www.ercoppa.org/Linux-Compile-Hadoop-220-fix-Unable-to-load-native-hadoop-library.htm
