---
layout: page
title: Installation kafka in linux
description: Installation kafka in linux
keywords: kafka, installation, linux, vagrant, ansible
permalink: /devtools/bigdata/kafka/install/linux/
---


# Installation kafka in linux

**3 virtual machines with 2 CPU and 4 GB memory**

<br/>

    $ mkdir ~/vagrant-kafka && cd ~/vagrant-kafka

<br/>

    $ vagrant plugin install vagrant-hostmanager

<br/>

    $ git clone https://github.com/matematika-org/vagrant-kafka .
    $ cd centos7/

<br/>

    $ vagrant box update
    $ vagrant up

<br/>

    $ vagrant status
    Current machine states:

    broker1                   running (virtualbox)
    broker2                   running (virtualbox)
    broker3                   running (virtualbox)



====================================

On every node

    $ vagrant ssh broker{1..3}

<br/>

    # vi /etc/systemd/system/zookeeper.service


```
[Unit]
Description=Zookeeper Daemon
Documentation=http://zookeeper.apache.org
Requires=network.target
After=network.target

[Service]    
Type=forking
WorkingDirectory=/opt/zookeeper
User=zookeeper
Group=zookeeper
ExecStart=/opt/zookeeper/bin/zkServer.sh start /opt/zookeeper/conf/zoo.cfg
ExecStop=/opt/zookeeper/bin/zkServer.sh stop /opt/zookeeper/conf/zoo.cfg
ExecReload=/opt/zookeeper/bin/zkServer.sh restart /opt/zookeeper/conf/zoo.cfg
TimeoutSec=30
Restart=on-failure

[Install]
WantedBy=default.target
```


<br/>

    # vi /etc/systemd/system/kafka.service


```
[Unit]
Description=Apache Kafka server (broker)
Documentation=http://kafka.apache.org/documentation.html
Requires=network.target remote-fs.target
After=network.target remote-fs.target zookeeper.service

[Service]
Type=simple
User=kafka
Group=kafka
ExecStart=/opt/kafka/bin/kafka-server-start.sh /opt/kafka/config/server.properties
ExecStop=/opt/kafka/bin/kafka-server-stop.sh

[Install]
WantedBy=multi-user.target
```

<br/>

**server.properties**

    # mv /opt/kafka/config/server.properties /opt/kafka/config/server.properties.original

**broker.id and advertised.listeners different on hosts**

    # vi /opt/kafka/config/server.properties

```
broker.id=1
advertised.listeners=PLAINTEXT://kafka1:9092
delete.topic.enable=true
log.dirs=/kafka
num.partitions=8
default.replication.factor=3
min.insync.replicas=2
log.retention.hours=168
log.segment.bytes=1073741824
log.retention.check.interval.ms=300000
zookeeper.connect=zookeeper1:2181,zookeeper2:2181,zookeeper3:2181/kafka
zookeeper.connection.timeout.ms=6000
auto.create.topics.enable=true

```


<br/>

    // server 1
    echo "1" > /zookeeper/myid

    // server 2
    echo "2" > /zookeeper/myid

    // server 3
    echo "3" > /zookeeper/myid

<br/>

### Zookeeper

**server.properties**

    # vi /opt/zookeeper/conf/zoo.cfg

```
dataDir=/zookeeper
clientPort=2181
maxClientCnxns=0
tickTime=2000
initLimit=10
syncLimit=5
server.1=zookeeper1:2888:3888
server.2=zookeeper2:2888:3888
server.3=zookeeper3:2888:3888

```

<br/>

    # {
        systemctl enable zookeeper.service
        systemctl start  zookeeper.service
        systemctl status zookeeper.service
    }

<br/>

    # {
        systemctl enable kafka.service
        systemctl start  kafka.service
        systemctl status kafka.service
    }

<br/>

    # reboot

<br/>

### Client

I am working in ubuntu linux

<br/>

    $ sudo vi /etc/hosts

```
#---------------------------------------------------------------------
# Kafka cluster
#---------------------------------------------------------------------

192.168.0.11 zookeeper1
192.168.0.12 zookeeper2
192.168.0.13 zookeeper3

192.168.0.11 kafka1
192.168.0.12 kafka2
192.168.0.13 kafka3
```

<br/>

    $ cd ~/tmp/
    $ wget http://mirror.cogentco.com/pub/apache/kafka/2.2.0/kafka_2.12-2.2.0.tgz


    $ ls kafka*
    kafka_2.12-2.2.0.tgz

    $ tar -xvzpf kafka_2.12-2.2.0.tgz
    $ sudo mv kafka_2.12-2.2.0 /opt/

    $ sudo ln -s /opt/kafka_2.12-2.2.0/ /opt/kafka


<br/>

    $ rm kafka_2.12-2.2.0.tgz 

<br/>

    $ sudo vi /etc/profile.d/kafka.sh


<br/>

```
#### KAFKA #######################

export KAFKA_HOME=/opt/kafka
export PATH=${KAFKA_HOME}/bin:$PATH

#### KAFKA #######################
```

<br/>

     $ source /etc/profile.d/kafka.sh

<br/>

### Test

 <br/>

    $ kafka-topics.sh --zookeeper zookeeper1:2181/kafka --create --topic test --replication-factor 1 --partitions 3

 <br/>
    
    $ kafka-topics.sh --zookeeper zookeeper1:2181/kafka --topic test --describe
    Topic:test	PartitionCount:3	ReplicationFactor:1	Configs:
	Topic: test	Partition: 0	Leader: 1	Replicas: 1	Isr: 1
	Topic: test	Partition: 1	Leader: 2	Replicas: 2	Isr: 2
	Topic: test	Partition: 2	Leader: 1	Replicas: 1	Isr: 1

