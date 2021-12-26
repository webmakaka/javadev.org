---
layout: page
title: Kafka Streams
description: Kafka Streams
keywords: kafka, Kafka Streams
permalink: /messaging/kafka/kafka-streams/
---

# Kafka Streams

```
$ cd ~/tmp
$ git clone https://github.com/webmak1/kafka-streams
$ cd kafka-streams/
$ git checkout end-state
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
$ vi ./build.gradle
```

<br/>

```
dependencies {
    implementation 'org.apache.kafka:kafka-streams:2.2.1'
    implementation 'org.apache.kafka:kafka-clients:2.2.1'
    testImplementation 'junit:junit:4.12'
}
```

<br/>

```
$ vi src/main/java/com/linuxacademy/ccdak/streams/StreamsMain.java
```

<br/>

```java
package com.linuxacademy.ccdak.streams;

import java.util.Properties;
import java.util.concurrent.CountDownLatch;
import org.apache.kafka.common.serialization.Serdes;
import org.apache.kafka.streams.KafkaStreams;
import org.apache.kafka.streams.StreamsBuilder;
import org.apache.kafka.streams.StreamsConfig;
import org.apache.kafka.streams.Topology;
import org.apache.kafka.streams.kstream.KStream;

public class StreamsMain {

    public static void main(String[] args) {
        // Set up the configuration.
        final Properties props = new Properties();
        props.put(StreamsConfig.APPLICATION_ID_CONFIG, "streams-example");
        props.put(StreamsConfig.BOOTSTRAP_SERVERS_CONFIG, "localhost:9092");
        props.put(StreamsConfig.CACHE_MAX_BYTES_BUFFERING_CONFIG, 0);
        // Since the input topic uses Strings for both key and value, set the default Serdes to String.
        props.put(StreamsConfig.DEFAULT_KEY_SERDE_CLASS_CONFIG, Serdes.String().getClass().getName());
        props.put(StreamsConfig.DEFAULT_VALUE_SERDE_CLASS_CONFIG, Serdes.String().getClass().getName());

        // Get the source stream.
        final StreamsBuilder builder = new StreamsBuilder();
        final KStream<String, String> source = builder.stream("streams-input-topic");

        source.to("streams-output-topic");

        final Topology topology = builder.build();
        final KafkaStreams streams = new KafkaStreams(topology, props);
        // Print the topology to the console.
        System.out.println(topology.describe());
        final CountDownLatch latch = new CountDownLatch(1);

        // Attach a shutdown handler to catch control-c and terminate the application gracefully.
        Runtime.getRuntime().addShutdownHook(new Thread("streams-wordcount-shutdown-hook") {
            @Override
            public void run() {
                streams.close();
                latch.countDown();
            }
        });

        try {
            streams.start();
            latch.await();
        } catch (final Throwable e) {
            System.out.println(e.getMessage());
            System.exit(1);
        }
        System.exit(0);
    }

}
```

<br/>

```
// Need to create a topic from the beginning
$ kafka-console-producer.sh \
    --broker-list localhost:9092 \
    --topic streams-input-topic

[Enter]
^C
```

<br/>

```
$ kafka-topics.sh --list --bootstrap-server localhost:9092
```

<br/>

```
$ ./gradlew runStreams
```

<br/>

**Wait 2 minutes**

<br/>

```
// Termanal 1
// Receive Messages
$ kafka-console-consumer.sh \
    --bootstrap-server localhost:9092 \
    --topic streams-output-topic \
    --property print.key=true
```

<br/>

```
// Termanal 2
// Send Messages
$ kafka-console-producer.sh \
    --broker-list localhost:9092 \
    --topic streams-input-topic \
    --property parse.key=true \
    --property key.separator=:

> hello:world
> test:one
> test:two

^C
```

<br/>

**returns in Termanal 1:**

```
hello	world
test	one
test	two
```

<br/>

### Kafka Streams Stateless Transformations

<br/>

```
$ vi src/main/java/com/linuxacademy/ccdak/streams/StatelessTransformationsMain.java
```

<br/>

```java
package com.linuxacademy.ccdak.streams;

import java.util.LinkedList;
import java.util.List;
import java.util.Properties;
import java.util.concurrent.CountDownLatch;
import org.apache.kafka.common.serialization.Serdes;
import org.apache.kafka.streams.KafkaStreams;
import org.apache.kafka.streams.KeyValue;
import org.apache.kafka.streams.StreamsBuilder;
import org.apache.kafka.streams.StreamsConfig;
import org.apache.kafka.streams.Topology;
import org.apache.kafka.streams.kstream.KStream;

public class StatelessTransformationsMain {

    public static void main(String[] args) {
        // Set up the configuration.
        final Properties props = new Properties();
        props.put(StreamsConfig.APPLICATION_ID_CONFIG, "stateless-transformations-example");
        props.put(StreamsConfig.BOOTSTRAP_SERVERS_CONFIG, "localhost:9092");
        props.put(StreamsConfig.CACHE_MAX_BYTES_BUFFERING_CONFIG, 0);
        // Since the input topic uses Strings for both key and value, set the default Serdes to String.
        props.put(StreamsConfig.DEFAULT_KEY_SERDE_CLASS_CONFIG, Serdes.String().getClass().getName());
        props.put(StreamsConfig.DEFAULT_VALUE_SERDE_CLASS_CONFIG, Serdes.String().getClass().getName());

        // Get the source stream.
        final StreamsBuilder builder = new StreamsBuilder();
        final KStream<String, String> source = builder.stream("stateless-transformations-input-topic");

        // Split the stream into two streams, one containing all records where the key begins with "a", and the other containing all other records.
        KStream<String, String>[] branches = source
            .branch((key, value) -> key.startsWith("a"), (key, value) -> true);
        KStream<String, String> aKeysStream = branches[0];
        KStream<String, String> othersStream = branches[1];

        // Remove any records from the "a" stream where the value does not also start with "a".
        aKeysStream = aKeysStream.filter((key, value) -> value.startsWith("a"));

        // For the "a" stream, convert each record into two records, one with an uppercased value and one with a lowercased value.
        aKeysStream = aKeysStream.flatMap((key, value) -> {
            List<KeyValue<String, String>> result = new LinkedList<>();
            result.add(KeyValue.pair(key, value.toUpperCase()));
            result.add(KeyValue.pair(key, value.toLowerCase()));
            return result;
        });

        // For the "a" stream, modify all records by uppercasing the key.
        aKeysStream = aKeysStream.map((key, value) -> KeyValue.pair(key.toUpperCase(), value));

        //Merge the two streams back together.
        KStream<String, String> mergedStream = aKeysStream.merge(othersStream);

        //Print each record to the console.
        mergedStream = mergedStream.peek((key, value) -> System.out.println("key=" + key + ", value=" + value));

        //Output the transformed data to a topic.
        mergedStream.to("stateless-transformations-output-topic");

        final Topology topology = builder.build();
        final KafkaStreams streams = new KafkaStreams(topology, props);
        // Print the topology to the console.
        System.out.println(topology.describe());
        final CountDownLatch latch = new CountDownLatch(1);

        // Attach a shutdown handler to catch control-c and terminate the application gracefully.
        Runtime.getRuntime().addShutdownHook(new Thread("streams-shutdown-hook") {
            @Override
            public void run() {
                streams.close();
                latch.countDown();
            }
        });

        try {
            streams.start();
            latch.await();
        } catch (final Throwable e) {
            System.out.println(e.getMessage());
            System.exit(1);
        }
        System.exit(0);
    }

}
```

<br/>

```
// Need to create a topic from the beginning
$ kafka-console-producer.sh \
    --broker-list localhost:9092 \
    --topic stateless-transformations-input-topic

[Enter]
^C
```

<br/>

```
// Need to create a topic from the beginning
$ kafka-console-producer.sh \
    --broker-list localhost:9092 \
    --topic stateless-transformations-output-topic

[Enter]
^C
```

<br/>

```
$ kafka-topics.sh --list --bootstrap-server localhost:9092
```

<br/>

```
// Termanal 2
// Send Messages
$ kafka-console-producer.sh \
    --broker-list localhost:9092 \
    --topic stateless-transformations-input-topic1 \
    --property parse.key=true \
    --property key.separator=:

>akey:avalue
>akey:avalue
>akey:bvalue
>bkey:bvalue

^C
```

<br/>

```
$ ./gradlew runStatelessTransformations
```

```
***
key=AKEY, value=AVALUE
key=AKEY, value=avalue
key=AKEY, value=AVALUE
key=AKEY, value=avalue
key=AKEY, value=AVALUE
key=AKEY, value=avalue
key=bkey, value=bvalue
```

<br/>

```
// Termanal 1
// Receive Messages
$ kafka-console-consumer.sh \
    --bootstrap-server localhost:9092 \
    --topic stateless-transformations-output-topic1 \
    --property print.key=true
```

<br/>

```
// Terminal 2
>akey:avalue
>akey:avalue
>akey:bvalue
>bkey:bvalue
```

<br/>

```
// Termanal 1
AKEY	AVALUE
AKEY	avalue
AKEY	AVALUE
AKEY	avalue
bkey	bvalue
```

<br/>

### Kafka Streams Aggregations
