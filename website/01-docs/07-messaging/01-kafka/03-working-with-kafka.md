---
layout: page
title: Working with kafka
description: Working with kafka
keywords: kafka, Working with kafka
permalink: /messaging/kafka/working-with-kafka/
---

# Working with kafka

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
