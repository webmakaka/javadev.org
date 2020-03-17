---
layout: page
title: Apache Hadoop, Pig, Hive, Derby installation in Centos Linux
description: Apache Hadoop, Pig, Hive, Derby installation in Centos Linux
keywords: Apache. Hadoop, installation, pig, hive, derby, centos, linux
permalink: /devtools/bigdata/hadoop/install/linux/
---

# Apache Hadoop, Pig, Hive, Derby installation in Centos Linux


<a href="/devtools/jdk/install/linux/">JDK should be installed</a>

<br/>

    $ cd ~
    $ wget  http://mirrors.ibiblio.org/apache/hadoop/common/hadoop-2.8.5/hadoop-2.8.5.tar.gz
    $ tar -xvzpf hadoop-2.8.5.tar.gz
    $ sudo mkdir -p /opt/hadoop/2.8.5
    $ sudo mv hadoop-2.8.5/* /opt/hadoop/2.8.5/
    $ sudo ln -s /opt/hadoop/2.8.5/ /opt/hadoop/current

    $ rm -rf hadoop-2.8.5/
    $ rm -rf hadoop-2.8.5.tar.gz

<br/>

    $ sudo vi /etc/profile.d/hadoop.sh

<br/>

```
#### HADOOP 2.8.5 #######################

export HADOOP_HOME=/opt/hadoop/current
export PATH=${HADOOP_HOME}/bin:$PATH

#### HADOOP 2.8.5 #######################
```
<!--
export HADOOP_OPTS="-Djava.library.path=${HADOOP_HOME}/lib/native"
>


<!--
    $ source /etc/profile.d/java.sh
-->

    $ source /etc/profile.d/hadoop.sh


<br/>

**Create Users and Groups**

    $ sudo su -

    # groupadd hadoop
    # useradd -g hadoop yarn
    # useradd -g hadoop hdfs
    # useradd -g hadoop mapred

<!-- # adduser --disabled-password --gecos "" yarn
    # adduser --disabled-password --gecos "" hdfs
    # adduser --disabled-password --gecos "" mapred

    # usermod -aG hadoop yarn
    # usermod -aG hadoop hdfs
    # usermod -aG hadoop mapred -->

<br/>

**Make Data and Log Directories**

    # mkdir -p /var/data/hadoop/hdfs/nn
    # mkdir -p /var/data/hadoop/hdfs/snn
    # mkdir -p /var/data/hadoop/hdfs/dn
    # chown -R hdfs:hadoop /var/data/hadoop/hdfs 

<br/>

**Create the log directory and set the owner and group as follows:**

    # cd /opt/hadoop/current
    # mkdir logs
    # chmod g+w logs
    # chown -R yarn:hadoop ./


<br/>

**Configure core-site.xml**

    # vi /opt/hadoop/current/etc/hadoop/core-site.xml

```xml
<configuration>
       <property>
               <name>fs.default.name</name>
               <value>hdfs://localhost:9000</value>
       </property>
       <property>
               <name>hadoop.http.staticuser.user</name>
               <value>hdfs</value>
       </property>
</configuration>
```

<br/>

**Configure hdfs-site.xml**

    # vi /opt/hadoop/current/etc/hadoop/hdfs-site.xml

```xml
<configuration>
 <property>
   <name>dfs.replication</name>
   <value>1</value>
 </property>
 <property>
   <name>dfs.namenode.name.dir</name>
   <value>file:/var/data/hadoop/hdfs/nn</value>
 </property>
 <property>
   <name>fs.checkpoint.dir</name>
   <value>file:/var/data/hadoop/hdfs/snn</value>
 </property>
 <property>
   <name>fs.checkpoint.edits.dir</name>
   <value>file:/var/data/hadoop/hdfs/snn</value>
 </property>
 <property>
   <name>dfs.datanode.data.dir</name>
   <value>file:/var/data/hadoop/hdfs/dn</value>
 </property>
</configuration>
```

<br/>

**Configure mapred-site.xml**

  # cd /opt/hadoop/current/etc/hadoop/
 
  # cp mapred-site.xml.template mapred-site.xml

  # vi /opt/hadoop/current/etc/hadoop/mapred-site.xml

<br/>

```xml
<configuration>
<property>
   <name>mapreduce.framework.name</name>
   <value>yarn</value>
</property>
<property>
   <name>mapreduce.jobhistory.intermediate-done-dir</name>
   <value>/mr-history/tmp </value>
</property>
<property>
   <name> mapreduce.jobhistory.done-dir</name>
   <value>/mr-history/done</value>
</property>
</configuration>
```

<br/>

**Configure yarn-site.xml**

    # vi /opt/hadoop/current/etc/hadoop/yarn-site.xml

```xml
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
```

<br/>

**Modify Java Heap Sizes**

    # vi /opt/hadoop/current/etc/hadoop/hadoop-env.sh

```
export HADOOP_HEAPSIZE=500
export HADOOP_NAMENODE_INIT_HEAPSIZE="500"
```

<br/>

    # vi /opt/hadoop/current/etc/hadoop/mapred-env.sh

```
# export HADOOP_JOB_HISTORYSERVER_HEAPSIZE=1000
export HADOOP_JOB_HISTORYSERVER_HEAPSIZE=250
```

<br/>

    # vi /opt/hadoop/current/etc/hadoop/yarn-env.sh

```
JAVA_HEAP_MAX=-Xmx1000m 
YARN_HEAPSIZE=1000
```

<!--

Не добавлял в последний раз

-->

<br/>

    # vi /opt/hadoop/current/etc/hadoop/hadoop-env.sh

add the following to the end:

```
export HADOOP_COMMON_LIB_NATIVE_DIR=$HADOOP_HOME/lib/native
export HADOOP_OPTS="$HADOOP_OPTS -Djava.library.path=$HADOOP_HOME/lib"
```

<br/>

**Format HDFS**

    # su - hdfs

    $ cd /opt/hadoop/current/bin
    $ ./hdfs namenode -format

If the command worked, you should see the following near the end of a long list of messages:

    INFO common.Storage: Storage directory /var/data/hadoop/hdfs/nn has been successfully formatted.

<br/>

**Start the HDFS Services**

As user hdfs

    $ cd /opt/hadoop/current/sbin
    $ ./hadoop-daemon.sh start namenode
    $ ./hadoop-daemon.sh start secondarynamenode
    $ ./hadoop-daemon.sh start datanode

If the daemon started, you should see responses above that will point to the log file.
(Note that the actual log file is appended with ".log" not ".out.")
Issue a jps command to see that all the services are running. The actual PID values will be different than shown in this listing:

    $ jps
    2849 DataNode
    2791 SecondaryNameNode
    2701 NameNode
    2943 Jps


All Hadoop services can be stopped using the hadoop-daemon.sh script.  
For example, to stop the datanode service enter the following

    $ ./hadoop-daemon.sh stop datanode

The same can be done for the Namenode and SecondaryNameNode

<br/>

**create /mr-history for job history server directory in hdfs**

(Also a good test to make sure HDFS is working)

<!-- $ export HADOOP_OPTS="$HADOOP_OPTS -Djava.library.path=$HADOOP_HOME/lib/native" -->

<br/>

    $ hdfs dfs -mkdir -p /mr-history/tmp
    $ hdfs dfs -mkdir -p /mr-history/done
    $ hdfs dfs -chown -R yarn:hadoop  /mr-history

<!-- $ hdfs dfs -chmod go+rwx /tmp -->

    $ exit

<br/>

<!-- There are two convenience scripts in the scripts directory to start and stop HDFS services (run as root)

You can add them to /etc/rc.local file

<!-- # cd /opt/hadoop/current/sbin 

    # start-hdfs.sh   
    # stop-hdfs.sh 
    
-->

<br/>

### Start YARN Services

as user "yarn"

    # su - yarn
    $ cd /opt/hadoop/current/sbin
    $ ./yarn-daemon.sh start resourcemanager
    $ ./yarn-daemon.sh start nodemanager
    $ ./mr-jobhistory-daemon.sh start historyserver

<br/>

    $ jps
    3156 ResourceManager
    3637 Jps
    3403 NodeManager
    3563 JobHistoryServer

<br/>

    $ exit

<br/>

Similar to HDFS, the services can be stopped by issuing a stop argument to the daemon script:
  
  ./yarn-daemon.sh stop nodemanager

<!-- There are two convenience scripts in the scripts directory to start and stop YARN services (run as root)

You can add them to /etc/rc.local file

    # start-yarn.sh      
    # stop-yarn.sh -->

<br/>

**Verify the Running Services Using the Web Interface**

    // To see the HDFS web interface (other browsers can be used):
    http://<hadoop_server_ip>:50070

<br/>

    // To see the ResourceManager (YARN) web interface:
    http://<hadoop_server_ip>:8088

<br/>

**Run a Sample MapReduce Examples**

    # su - hdfs

    $ export YARN_EXAMPLES=/opt/hadoop/current/share/hadoop/mapreduce/

    // To test your installation, run the sample "pi" application
    $ yarn jar $YARN_EXAMPLES/hadoop-mapreduce-examples-2.8.5.jar pi 8 100000

If these tests worked, the Hadoop installation should be working correctly. 


<br/>

## Install Apache Pig

    $ cd ~
    $ wget http://mirrors.ibiblio.org/apache/pig/pig-0.17.0/pig-0.17.0.tar.gz

    $ tar -xvzpf pig-0.17.0.tar.gz
    $ sudo mkdir -p /opt/pig/0.17.0
    $ sudo mv pig-0.17.0/* /opt/pig/0.17.0
    $ sudo ln -s /opt/pig/0.17.0/ /opt/pig/current

    $ rm -rf pig-0.17.0/
    $ rm -rf pig-0.17.0.tar.gz

<br/>

    $ sudo vi /etc/profile.d/pig.sh

<br/>

```
#### PIG 0.17.0 #######################

export PIG_HOME=/opt/pig/current
export PATH=${PIG_HOME}/bin:$PATH

export PIG_CLASSPATH=/opt/hadoop/current/etc/hadoop

#### PIG 0.17.0 #######################
```

<br/>

    $ source /etc/profile.d/pig.sh

<br/>

**Create a Pig user and change ownership (do as root)**

    # useradd -g hadoop pig
    # chown -R pig:hadoop /opt/pig/

Pig is ready for use by users (they must re-login or "source /etc/profile.d/pig.sh")

    # pig --version
    Apache Pig version 0.17.0 (r1797386) 
    compiled Jun 02 2017, 15:41:58


<br/>

### Install Apache Hive 

**Install and Configure Hive**

<!--
As root, get sources, extract, create /etc/profile.d/hive.sh

-->

    $ wget http://mirrors.ibiblio.org/apache/hive/hive-2.3.5/apache-hive-2.3.5-bin.tar.gz

    $ tar -xvzpf apache-hive-2.3.5-bin.tar.gz

    $ sudo mkdir -p /opt/hive/2.3.5
    $ sudo mv apache-hive-2.3.5-bin/* /opt/hive/2.3.5
    $ sudo ln -s /opt/hive/2.3.5/ /opt/hive/current

    $ rm -rf apache-hive-2.3.5-bin/
    $ rm -rf apache-hive-2.3.5-bin.tar.gz

<br/>

    $ sudo vi /etc/profile.d/hive.sh

<br/>

```
#### HIVE 2.3.5 #######################

export HIVE_HOME=/opt/hive/current
export PATH=${HIVE_HOME}/bin:$PATH

#### HIVE 2.3.5 #######################
```

<br/>

    $ source /etc/profile.d/hive.sh

<br/>

    $ hive --version
    Hive 2.3.5

<br/>

make needed directories in HDFS



<!-- $ su - hdfs -c "hdfs dfs -mkdir -p /user/hive/warehouse"
    $ su - hdfs -c "hdfs dfs -chmod g+w /user/hive/warehouse" -->

    $ su - hdfs

    $ hdfs dfs -mkdir -p /user/hive/warehouse
    $ hdfs dfs -chmod g+w /user/hive/warehouse
    $ hdfs dfs -ls /user/hive


<br/>

    $ sudo vi /opt/hive/current/conf/hive-site.xml

```xml
<configuration>

<property>
  <name>javax.jdo.option.ConnectionURL</name>
  <value>jdbc:derby://localhost:1527/metastore_db;create=true</value>
  <description>JDBC connect string for a JDBC metastore</description>
</property>
 
<property>
  <name>javax.jdo.option.ConnectionDriverName</name>
  <value>org.apache.derby.jdbc.ClientDriver</value>
  <description>Driver class name for a JDBC metastore</description>
</property>

</configuration>
```

<br/>

remove the extra log4j-slf4j library (included in Hadoop install)

  $ mv /opt/hive/current/lib/log4j-slf4j-impl-2.6.2.jar /opt/hive/current/lib/log4j-slf4j-impl-2.6.2.jar.extra

<br/>

Create a Hive user and change ownership (do as root)

    # useradd -g hadoop hive
    # chown -R hive:hadoop /opt/hive/


<br/>

## Install Apache Derby

Hive needs a "metastore" database for metadata. The default is Apache Derby

    $ wget https://archive.apache.org/dist/db/derby/db-derby-10.13.1.1/db-derby-10.13.1.1-bin.tar.gz

    $ tar -xvzpf db-derby-10.13.1.1-bin.tar.gz

    $ sudo mkdir -p /opt/derby/10.13.1.1
    $ sudo mv db-derby-10.13.1.1-bin/* /opt/derby/10.13.1.1
    $ sudo ln -s /opt/derby/10.13.1.1/ /opt/derby/current

    $ rm -rf db-derby-10.13.1.1-bin/
    $ rm -rf db-derby-10.13.1.1-bin.tar.gz

<br/>

    $ sudo vi /etc/profile.d/derby.sh

<br/>

```
#### DERBY 10.13.1.1 #######################

export DERBY_HOME=/opt/derby/current
export PATH=${DERBY_HOME}/bin:$PATH

export DERBY_OPTS="-Dderby.system.home=$DERBY_HOME/data"

#### DERBY 10.13.1.1 #######################
```

<br/>

    $ source /etc/profile.d/derby.sh

Change derby to hive user

    # chown -R hive:hadoop /opt/derby/

    
copy these libraries to $HIVE_HOME

    # su - hive

    $ cp $DERBY_HOME/lib/derbyclient.jar $HIVE_HOME/lib

    $ cp $DERBY_HOME/lib/derbytools.jar $HIVE_HOME/lib

Start (and Stop) Derby (nohup will leave log file in the directory you run command)

    $ nohup startNetworkServer -h 0.0.0.0 &

<br/>

configure Hive schema

    $ schematool -initSchema -dbType derby

<!-- # There are two convenience scripts in the scripts directory to start and stop Derby (run as root)
# You can add them to /etc/rc.local file
  
  start-derby.sh  
  stop-derby.sh -->

<br/>

### Start/Test Hive

Make sure all Hadoop services are running
As user hdfs

     # su - hdfs

Enter "hive" at prompt. Output as follows. Ignore "which: no hbase" warning 

    $ hive
    hive> show tables;
    OK
    Time taken: 9.731 seconds
    hive> quit;
