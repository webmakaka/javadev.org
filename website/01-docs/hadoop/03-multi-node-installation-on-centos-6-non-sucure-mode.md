---
layout: page
title: Hadoop Multi Node Installation on Centos 6.X (Non-Secure Mode)
permalink: /docs/hadoop/centos/6/installation/multi-node-installation-on-centos-6-non-sucure-mode/
---


> Java should be installed  
> http://javadev.org/java_basics/installation/jdk/8/linux/centos/6/x86_x64/


Hadoop installation is same as in the single mode.
Difference between only in the config files.

We have 4 virtual mashines with centos 6.

<br/>

### Next packages should be installed on all computers in the cluster.

	# yum install -y \
	openssh-clients


<br/>


Network congigs looks like:

	# vi /etc/sysconfig/network

	NETWORKING=yes
	HOSTNAME=hadoopmaster1.localdomain

<br/>

	# vi /etc/hosts

	192.168.1.10 hadoopmaster1.localdomain hadoopmaster1

	192.168.1.11 hadoopslave1.localdomain hadoopslave1
	192.168.1.12 hadoopslave2.localdomain hadoopslave2
	192.168.1.13 hadoopslave3.localdomain hadoopslave3

<br/>


### Grant permission to access on localhost by SSH without password (hadoopmaster1, hadoopslave1, hadoopslave2, hadoopslave3)

	$ ssh-keygen -t dsa -P '' -f ~/.ssh/id_dsa
	$ cat ~/.ssh/id_dsa.pub >> ~/.ssh/authorized_keys
	$ chmod 0700 ~/.ssh/authorized_keys
	$ ssh localhost

<br/>

### Grant permission to access between nodes and master server by SSH without password (hadoopmaster1 и hadoopslave1, hadoopslave2, hadoopslave3)

	hadoopslave1

	$ scp ~/.ssh/id_dsa.pub hadoop@hadoopmaster1:/tmp/id_dsa_slave1.pub

	hadoopmaster1

	$ cat /tmp/id_dsa_slave1.pub >> ~/.ssh/authorized_keys
	$ scp ~/.ssh/id_dsa.pub hadoop@hadoopslave1:/tmp/id_dsa_master1.pub

	hadoopslave1

	$ cat /tmp/id_dsa_master1.pub >> ~/.ssh/authorized_keys
	$ ssh hadoopmaster1
	$ ssh hadoopslave1


	=====

	hadoopslave2

	$ scp ~/.ssh/id_dsa.pub hadoop@hadoopmaster1:/tmp/id_dsa_slave2.pub

	hadoopmaster1

	$ cat /tmp/id_dsa_slave2.pub >> ~/.ssh/authorized_keys
	$ scp ~/.ssh/id_dsa.pub hadoop@hadoopslave2:/tmp/id_dsa_master1.pub


	hadoopslave2

	$ cat /tmp/id_dsa_master1.pub >> ~/.ssh/authorized_keys
	$ ssh hadoopmaster1
	$ ssh hadoopslave2

	=====

	hadoopslave3

	$ scp ~/.ssh/id_dsa.pub hadoop@hadoopmaster1:/tmp/id_dsa_slave3.pub

	hadoopmaster1

	$ cat /tmp/id_dsa_slave3.pub >> ~/.ssh/authorized_keys
	$ scp ~/.ssh/id_dsa.pub hadoop@hadoopslave3:/tmp/id_dsa_master1.pub


	hadoopslave3

	$ cat /tmp/id_dsa_master1.pub >> ~/.ssh/authorized_keys
	$ ssh hadoopmaster1
	$ ssh hadoopslave3


<br/>

### hadoopmaster1


	$ mkdir -p ~/hadoop_data/hdfs/namenode

<br/>

	$ vi /opt/hadoop/2.7.1/etc/hadoop/hdfs-site.xml

<br/>

	***

	<configuration>
		<property>
			<name>dfs.replication</name>
			<value>3</value>
		</property>
		<property>
			<name>dfs.namenode.name.dir</name>
			<value>file:/home/hadoop/hadoop_data/hdfs/namenode</value>
		</property>
	</configuration>



<br/>

### hadoopslave1, hadoopslave2, hadoopslave3


	$ mkdir -p ~/hadoop_data/hdfs/datanode

<br/>

	$ vi /opt/hadoop/2.7.1/etc/hadoop/hdfs-site.xml

<br/>

	***

	<configuration>
		<property>
			<name>dfs.replication</name>
			<value>3</value>
		</property>
		<property>
			<name>dfs.datanode.data.dir</name>
			<value>file:/home/hadoop/hadoop_data/hdfs/datanode</value>
		</property>
	</configuration>


<br/>

### Next configs are the same on all computers in the cluster (hadoopmaster1, hadoopslave1, hadoopslave2, hadoopslave3)


	$ vi /opt/hadoop/2.7.1/etc/hadoop/core-site.xml

<br/>

	***

	<configuration>
	    <property>
	        <name>fs.defaultFS</name>
	        <value>hdfs://hadoopmaster1:9000</value>
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
		<property>
			<name>yarn.resourcemanager.resource-tracker.address</name>
			<value>hadoopmaster1:8025</value>
		</property>
		<property>
			<name>yarn.resourcemanager.scheduler.address</name>
			<value>hadoopmaster1:8030</value>
		</property>
		<property>
			<name>yarn.resourcemanager.address</name>
			<value>hadoopmaster1:8050</value>
		</property>
	</configuration>


<br/>

	$ cp /opt/hadoop/2.7.1/etc/hadoop/mapred-site.xml.template /opt/hadoop/2.7.1/etc/hadoop/mapred-site.xml
	$ vi /opt/hadoop/2.7.1/etc/hadoop/mapred-site.xml

<br/>

	***

	<configuration>
	    <property>
	        <name>mapreduce.framework.name</name>
	        <value>yarn</value>
	    </property>
	</configuration>

<br/>


	$ vi /opt/hadoop/2.7.1/etc/hadoop/masters

	hadoopmaster1

<br/>

	$ vi /opt/hadoop/2.7.1/etc/hadoop/slaves

	hadoopslave1
	hadoopslave2
	hadoopslave3


<br/>

### Start hadoop daemons on hadoopmaster1


	$ hadoop namenode -format

	$ start-all.sh

	$ jps
	3744 SecondaryNameNode
	4005 Jps
	2169 NameNode
	1599 ResourceManager

<br/>

### hadoopslave1, hadoopslave2, hadoopslave3

	$ jps
	1552 NodeManager
	1265 DataNode
	1739 Jps


<br/>

### Connect to hadoop browser console

Summary

	http://192.168.1.10:50070/
	http://192.168.1.10:50090/

All Applications

	http://192.168.1.10:8088/



<br/><br/><br/><br/>


Links:

http://hadoop.apache.org/docs/current/hadoop-project-dist/hadoop-common/ClusterSetup.html

http://www.youtube.com/watch?v=DteSiloXesw
