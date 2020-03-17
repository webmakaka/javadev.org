---
layout: page
title: Installing Apache Hadoop by book Tom White
permalink: /docs/hadoop/centos/6/installation/by-book/
---

# Installing Apache Hadoop by book Tom White


Hadoop can be run in one of three modes:

<ul>
    <li><strong>Standalone (or local) mode</strong> - There are no daemons running and everything runs in a single JVM. Standalone
    mode is suitable for running MapReduce programs during development, since it is
    easy to test and debug them.</li>
    <li><strong>Pseudodistributed mode</strong> - The Hadoop daemons run on the local machine, thus simulating a cluster on a small
    scale.</li>
    <li><strong>Fully distributed mode</strong> - The Hadoop daemons run on a cluster of machines.</li>
</ul>


To run Hadoop in a particular mode, you need to do two things: set the appropriate
properties, and start the Hadoop daemons. Table A-1 shows the minimal set of prop‐
erties to configure each mode. In standalone mode, the local filesystem and the local
MapReduce job runner are used. In the distributed modes, the HDFS and YARN daemons are started, and MapReduce is configured to use YARN.


|  Component | Property  |  Standalone | Pseudodistributed  | Fully distributed  |
|---|---|---|---|---|
| Common  | fs.defaultFS  | file:/// (default)  | hdfs://localhost/  | hdfs://namenode/  |
|  HDFS | dfs.replication  | N/A  | 1  | 3 (default)  |
|  MapReduce | mapreduce.frame work.name  | local (default)  | yarn  | yarn |
|  YARN | yarn.resourcemanager.hostname  |  N/A | localhost  | resourcemanager  |
|   | yarn.nodemanager.aux-services |  N/A | mapreduce_shuffle | mapreduce_shuffle  |


<br/>

## Standalone Mode

In standalone mode, there is no further action to take, since the default properties are set for standalone mode and there are no daemons to run.

<br/>

## Pseudodistributed Mode

In pseudodistributed mode, the configuration files should be created with the following
contents and placed in the etc/hadoop directory. Alternatively, you can copy the etc/
hadoop directory to another location, and then place the *-site.xml configuration files
there. The advantage of this approach is that it separates configuration settings from
the installation files. If you do this, you need to set the HADOOP_CONF_DIR environment
variable to the alternative location, or make sure you start the daemons with the
--config option:


    <?xml version="1.0"?>
    <!-- core-site.xml -->
    <configuration>
        <property>
            <name>fs.defaultFS</name>
            <value>hdfs://localhost/</value>
        </property>
    </configuration>

<br/>

    <?xml version="1.0"?>
    <!-- hdfs-site.xml -->
    <configuration>
        <property>
            <name>dfs.replication</name>
            <value>1</value>
        </property>
    </configuration>

<br/>

    <?xml version="1.0"?>
    <!-- mapred-site.xml -->
    <configuration>
        <property>
            <name>mapreduce.framework.name</name>
            <value>yarn</value>
        </property>
    </configuration>

<br/>

    <?xml version="1.0"?>
    <!-- yarn-site.xml -->
    <configuration>
        <property>
            <name>yarn.resourcemanager.hostname</name>
            <value>localhost</value>
        </property>
        <property>
            <name>yarn.nodemanager.aux-services</name>
            <value>mapreduce_shuffle</value>
        </property>
    </configuration>



<br/>

### Configuring SSH


In pseudodistributed mode, we have to start daemons, and to do that using the supplied scripts we need to have SSH installed. Hadoop doesn’t actually distinguish between pseudodistributed and fully distributed modes; it merely starts daemons on the set of
hosts in the cluster (defined by the slaves file) by SSHing to each host and starting a daemon process. Pseudodistributed mode is just a special case of fully distributed mode in which the (single) host is localhost, so we need to make sure that we can SSH to localhost and log in without having to enter a password.

First, make sure that SSH is installed and a server is running. On Ubuntu, for example, this is achieved with:

    % sudo apt-get install ssh

On Mac OS X, make sure Remote Login (under System Preferen‐
ces→Sharing) is enabled for the current user (or all users).
Then, to enable passwordless login, generate a new SSH key with an empty passphrase:

    % ssh-keygen -t rsa -P '' -f ~/.ssh/id_rsa
    % cat ~/.ssh/id_rsa.pub >> ~/.ssh/authorized_keys

You may also need to run ssh-add if you are running ssh-agent.
Test that you can connect with:

    % ssh localhost

If successful, you should not have to type in a password.

<br/>

### Formatting the HDFS filesystem

Before HDFS can be used for the first time, the filesystem must be formatted. This is done by running the following command:

    % hdfs namenode -format

Starting and stopping the daemons
To start the HDFS, YARN, and MapReduce daemons, type:

    % start-dfs.sh
    % start-yarn.sh
    % mr-jobhistory-daemon.sh start historyserver


If you have placed configuration files outside the default conf directory, either export the HADOOP_CONF_DIR environment variable before running the scripts, or start the daemons with the --config option, which takes an absolute path to the configuration directory:

    % start-dfs.sh --config path-to-config-directory
    % start-yarn.sh --config path-to-config-directory
    % mr-jobhistory-daemon.sh --config path-to-config-directory start historyserver


The following daemons will be started on your local machine: a namenode, a secondary
namenode, a datanode (HDFS), a resource manager, a node manager (YARN), and a
history server (MapReduce). You can check whether the daemons started successfully
by looking at the logfiles in the logs directory (in the Hadoop installation directory) or
by looking at the web UIs, at http://localhost:50070/ for the namenode, http://localhost:
8088/ for the resource manager, and http://localhost:19888/ for the history server. You
can also use Java’s jps command to see whether the processes are running.

Stopping the daemons is done as follows:

    % mr-jobhistory-daemon.sh stop historyserver
    % stop-yarn.sh
    % stop-dfs.sh

<br/>

### Creating a user directory

Create a home directory for yourself by running the following:

    % hadoop fs -mkdir -p /user/$USER

## Fully Distributed Mode

Setting up a cluster of machines brings many additional considerations, so this mode is covered in Chapter 10.


> Tom White - Hadoop: The Definitive Guide, 4th Edition [ENG, 2015]
