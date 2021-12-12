---
layout: page
title: Run kafka in docker container
description: Run kafka in docker container
keywords: kafka, docker
permalink: /messaging/kafka/docker/
---

# Run kafka in docker container

[JDK8 should be installed](/devtools/jdk/setup/linux/)

<!-- [Scala should be installed (I am not sure that this is needed)](/devtools/scala/setup/linux/) -->

<br/>

[docker and docker-compose installation if needed](//gitops.ru/containers/docker/setup/ubuntu/)

<br/>

```
$ cd ~/tmp

// Docker script from video course Linux Academy Apache Kafka Deep Dive
$ git clone https://github.com/webmak1/kafka-docker
$ cd kafka-docker/
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

<br/>

    $ cd ~/tmp
    $ wget https://archive.apache.org/dist/kafka/2.8.1/kafka_2.12-2.8.1.tgz
    $ tar -xvf kafka_2.12-2.8.1.tgz

<br/>

    $ sudo mkdir -p /opt/kafka/2.12-2.8.1
    $ sudo mv kafka_2.12-2.8.1/* /opt/kafka/2.12-2.8.1/
    $ sudo ln -s /opt/kafka/2.12-2.8.1/ /opt/kafka/current

<br/>

    $ rm -rf kafka_2.12-2.8.1*

<br/>

    $ sudo vi /etc/profile.d/kafka.sh

<br/>

```
#### KAFKA 2.12-2.8.1 #######################

export KAFKA_HOME=/opt/kafka/current
export PATH=${KAFKA_HOME}/bin:$PATH

#### KAFKA 2.12-2.8.1 #######################
```

<br/>

```
$ source /etc/profile.d/kafka.sh
```
