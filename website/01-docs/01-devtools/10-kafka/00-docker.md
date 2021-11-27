---
layout: page
title: Run kafka in docker container
description: Run kafka in docker container
keywords: kafka, docker
permalink: /devtools/kafka/docker/
---

# Run kafka in docker container

[JDK8 should be installed](/devtools/jdk/setup/linux/)

[Scala should be installed](/devtools/bigdata/scala/install/linux/)

<br/>

[docker and docker-compose installation if needed](//gitops.ru/containers/docker/setup/ubuntu/)

<br/>

```
$ cd ~/tmp

// Docker script from video course Linux.Academy.Apache.Kafka.Deep.Dive-ViGOROUS
$ git clone https://github.com/matematika-org/docker-kafka
$ cd docker-kafka/
```

<br/>

    $ docker-compose up

    // or
    $ docker-compose up -d --build

<br/>

```
$ telnet localhost 2181
Trying 127.0.0.1...
Connected to localhost.
Escape character is '^]'.
srvr
Zookeeper version: 3.4.9-1757313, built on 08/23/2016 06:50 GMT
Latency min/avg/max: 0/10/28
Received: 34
Sent: 33
Connections: 1
Outstanding: 0
Zxid: 0x200000039
Mode: follower
Node count: 37
Connection closed by foreign host.
```

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

```
$ source /etc/profile.d/kafka.sh
```

<br/>

```
$ kafka-topics.sh \
    --zookeeper localhost:2181 \
    --create \
    --partitions 3 \
    --replication-factor 1 \
    --topic test
```

<br/>
    
```
$ kafka-topics.sh \
    --zookeeper localhost:2181 \ 
    --describe \
    --topic test 
Topic:test	PartitionCount:3	ReplicationFactor:1	Configs:
    Topic: test	Partition: 0	Leader: 2	Replicas: 2	Isr: 2
    Topic: test	Partition: 1	Leader: 3	Replicas: 3	Isr: 3
    Topic: test	Partition: 2	Leader: 1	Replicas: 1	Isr: 1
```

<br/>

```
$ kafka-topics.sh \
    --zookeeper localhost:2181 \
    --list
```

**returns:**

```
test
```

<br/>

```
// Create a Message
$ kafka-console-producer.sh \
    --broker-list localhost:9092 \
    --topic test

Test Message 1
Test Message 2

^D
```

<br/>

```
// Receive a Message
$ kafka-console-consumer.sh \
    --bootstrap-server localhost:9092 \
    --topic test \
    --from-beginning

^D
```

<br/>

```
$ vi message.json
```

<br/>

```
{
   "distributionID":"TB-AARTool-30",
   "senderID":"TB-AARTool",
   "dateTimeSent":1635405698193,
   "dateTimeExpires":1635405698193,
   "distributionStatus":"System",
   "distributionKind":"Request"
}
```

<br/>

```
$ kafka-console-producer.sh --broker-list localhost:9092 --topic test < ./message.json
```

<br/>

```
// https://stackoverflow.com/questions/69753326/how-can-i-send-key-value-to-kafka-with-kafkaconsoleproducer-without-it-beind-e
$ kafka-console-producer.sh --broker-list localhost:9092 --topic test --property "parse.key=true" --property "key.separator=;" < ./message.json
```
