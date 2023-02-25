---
layout: page
title: Run kafka in docker container
description: Run kafka in docker container
keywords: kafka, docker
permalink: /messaging/kafka/docker/
---

# Run kafka in docker container

<br/>

[docker and docker-compose installation if needed](//gitops.ru/containers/docker/setup/ubuntu/)

<br/>

```
$ cd ~/tmp

// Docker script from video course Linux Academy Apache Kafka Deep Dive
$ git clone https://github.com/wildmakaka/kafka-docker
$ cd kafka-docker/
```

<br/>

```
$ docker-compose up

// or
$ docker-compose up -d --build
```

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

```
$ telnet localhost 9092
Trying 127.0.0.1...
Connected to localhost.
Escape character is '^]'.
```
