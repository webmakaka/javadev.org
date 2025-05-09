---
layout: page
title: Client installation
description: Run kafka in docker container
keywords: kafka, client
permalink: /messaging/kafka/client/
---

# Client installation

[JDK should be installed](/devtools/jdk/setup/linux/)

<br/>

```
$ cd ~/tmp
$ wget https://archive.apache.org/dist/kafka/2.8.1/kafka_2.12-2.8.1.tgz
$ tar -xvf kafka_2.12-2.8.1.tgz
```

<br/>

```
$ sudo mv kafka_2.12-2.8.1 /opt/
$ sudo ln -s /opt/kafka_2.12-2.8.1/ /opt/kafka
```

<br/>

```
$ sudo vi /etc/profile.d/kafka.sh
```

<br/>

```
#### KAFKA 2.12-2.8.1 #######################

export KAFKA_HOME=/opt/kafka
export PATH=${KAFKA_HOME}/bin:$PATH

#### KAFKA 2.12-2.8.1 #######################
```

<br/>

```
$ source /etc/profile.d/kafka.sh
```

<!--

<br/>

### Who read

```
// OK!

{
    KAFKA_HOST=kafka.ru

    kafka-consumer-groups.sh    \
    --bootstrap-server ${KAFKA_HOST}:9092   \
    --describe \
    --group diabot
}

```


-->
