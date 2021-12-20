---
layout: page
title: The Kafka Java APIs
description: The Kafka Java APIs
keywords: kafka, The Kafka Java APIs
permalink: /messaging/kafka/kafka-java-apis/
---

# The Kafka Java APIs

```
$ cd ~/tmp
$ git clone https://github.com/webmak1/kafka-java-connect
$ cd kafka-java-connect/
```

<br/>

```
$ vi gradle/wrapper/gradle-wrapper.properties
```

<br/>

```
distributionUrl=https\://services.gradle.org/distributions/gradle-7.3.1-bin.zip
```

<br/>

```
$ ./gradlew --version
```

<br/>

```
------------------------------------------------------------
Gradle 7.3.1
------------------------------------------------------------

Build time:   2021-12-01 15:42:20 UTC
Revision:     2c62cec93e0b15a7d2cd68746f3348796d6d42bd

Kotlin:       1.5.31
Groovy:       3.0.9
Ant:          Apache Ant(TM) version 1.10.11 compiled on July 10 2021
JVM:          17.0.1 (Oracle Corporation 17.0.1+12-LTS-39)
OS:           Linux 5.11.0-27-generic amd64
```

<br/>

```
$ ./gradlew run
```

<br/>

```
$ vi ./build.gradle
```

<br/>

```
dependencies {
  testImplementation 'junit:junit:4.12'
}
```

**replace on:**

```
dependencies {
  implementation 'org.apache.kafka:kafka-clients:2.2.1'
  testImplementation 'junit:junit:4.12'
}
```

<br/>

```
$ vi src/main/java/com/linuxacademy/ccdak/kafkaJavaConnect/Main.java
```

<br/>

```java
package com.linuxacademy.ccdak.kafkaJavaConnect;

import org.apache.kafka.clients.producer.*
import java.util.Properties;

public class Main {

    public static void main(String[] args) {
       Properties props = new Properties();
        props.put("bootstrap.servers", "localhost:9092");
        props.put("key.serializer", "org.apache.kafka.common.serialization.StringSerializer");
        props.put("value.serializer", "org.apache.kafka.common.serialization.StringSerializer");

        Producer<String, String> producer = new KafkaProducer<>(props);

        for (int i = 0; i < 100; i++) {
            producer.send(new ProducerRecord<String, String>("count-topic", "count", Integer.toString(i)));
        }
        producer.close();
    }
}
```

<br/>

```
$ ./gradlew run

or

$ ./gradlew clean build
```

<br/>

```
// Receive Messages
$ kafka-console-consumer.sh \
    --bootstrap-server localhost:9092 \
    --topic count-topic \
    --from-beginning
```

<br/>

**returns:**

```
0
1
2
3
4
5
6
7
8
9
***
```
