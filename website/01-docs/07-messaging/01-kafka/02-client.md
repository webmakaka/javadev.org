---
layout: page
title: Run kafka in docker container
description: Run kafka in docker container
keywords: kafka, client
permalink: /messaging/kafka/client/
---

# Client installation

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
