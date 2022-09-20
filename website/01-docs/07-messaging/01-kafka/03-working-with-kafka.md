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
// CREATE TOPIC
$ kafka-topics.sh \
    --zookeeper localhost:2181 \
    --create \
    --partitions 3 \
    --replication-factor 2 \
    --topic test
```

<br/>
    
```
// DESCRIBE TOPIC
$ kafka-topics.sh \
    --zookeeper localhost:2181 \
    --topic test \
    --describe
```

<br/>

```
// LIST TOPICS
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
```

<br/>

```
Test Message 1
Test Message 2

^C
```

<br/>

```
// Receive a Message
$ kafka-console-consumer.sh \
    --bootstrap-server localhost:9092 \
    --topic test \
    --from-beginning

^C
```

<br/>

### Send a message in a json format

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

<br/>

<!--

```
{
KAFKA_HOST=http://host
KAFKA_TOPIC=topic-name

kafkacat \
  -C \
  -b ${KAFKA_HOST}:9092 \
  -t ${KAFKA_TOPIC} \
  -o -3 \
  -e \
 | sed "s/'/\"/g" \
 | jq
}
```

-->
