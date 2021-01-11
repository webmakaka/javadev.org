---
layout: page
title: Run kafka in docker container
description: Run kafka in docker container
keywords: kafka, docker
permalink: /devtools/bigdata/kafka/docker/
---

# Run kafka in docker container

[JDK8 should be installed](/devtools/jdk/setup/linux/)

[Scala should be installed](/devtools/bigdata/scala/install/linux/)

<br/>

[docker and docker-compose installation if needed](//sysadm.ru/devops/containers/docker/setup/ubuntu/)

<br/>

    $ cd ~/tmp
    $ git clone https://github.com/matematika-org/docker-kafka
    $ cd docker-kafka/

<br/>

    $ docker-compose up -d --build

(Docker script from video course Linux.Academy.Apache.Kafka.Deep.Dive-ViGOROUS)

<br/>

### Client installation if needed

    $ cd ~/tmp
    $ wget http://mirror.cogentco.com/pub/apache/kafka/2.2.0/kafka_2.12-2.2.0.tgz
    $ tar -xvf kafka_2.12-2.2.0.tgz

<br/>

    $ sudo mkdir -p /opt/kafka/2.12-2.2.0
    $ sudo mv kafka_2.12-2.2.0/* /opt/kafka/2.12-2.2.0/
    $ sudo ln -s /opt/kafka/2.12-2.2.0/ /opt/kafka/current

<br/>

    $ rm -rf kafka_2.12-2.2.0*

<br/>

    $ sudo vi /etc/profile.d/kafka.sh

<br/>

```
#### KAFKA 2.12-2.2.0 #######################

export KAFKA_HOME=/opt/kafka/current
export PATH=${KAFKA_HOME}/bin:$PATH

#### KAFKA 2.12-2.2.0 #######################
```

<br/>

     $ source /etc/profile.d/kafka.sh

 <br/>

    $ kafka-topics.sh --zookeeper localhost:2181 --create --topic test --partitions 3 --replication-factor 1

 <br/>
    
    $ kafka-topics.sh --zookeeper localhost:2181 --topic test --describe
    Topic:test	PartitionCount:3	ReplicationFactor:1	Configs:
      Topic: test	Partition: 0	Leader: 2	Replicas: 2	Isr: 2
      Topic: test	Partition: 1	Leader: 3	Replicas: 3	Isr: 3
      Topic: test	Partition: 2	Leader: 1	Replicas: 1	Isr: 1

<br/>

    $ kafka-topics.sh --zookeeper localhost:2181 --list
    test
