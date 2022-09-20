---
layout: page
title: Apache Kafka / Confluent
description: Apache Kafka / Confluent
keywords: Apache Kafka, Confluent
permalink: /messaging/kafka/
---

# Apache Kafka / Confluent

[Run kafka in docker container](/messaging/kafka/docker/)

[Installation kafka in linux](/messaging/kafka/setup/linux/)

[Installation kafka client](/messaging/kafka/client/)

[Working with kafka](/messaging/kafka/working-with-kafka/)

[The Kafka Java APIs](/messaging/kafka/kafka-java-apis/)

[Kafka Streams](/messaging/kafka/kafka-streams/)

[Kafka Spring Boot Example](https://github.com/webmak1/Kafka-Tutorial)

[[YouTube] Production Grade Kafka on K8s by Anand Iyer](https://www.youtube.com/watch?v=TDpOM7SNF1k)

<br/>

### Send message in topic from python script

<br/>

```python
import json
import uuid

from kafka import KafkaProducer

BOOTSTRAP_SERVERS = ['kafkahost:9092']
TOPIC = "topic-name"


def main():
    msg = {
        "key1": "valu1",
        "key2": "valu2",
        "key3": "valu3"
    }

    headers = [
        ("dqMessageGuid", bytes(str(uuid.uuid4()), "utf-8")),
        ("dqCommandName", bytes("create", "utf-8"))
    ]

    producer = KafkaProducer(bootstrap_servers=BOOTSTRAP_SERVERS)
    producer.send(
        TOPIC,
        bytes(json.dumps(msg), "utf-8"),
        headers=headers
    )


if __name__ == "__main__":
    main()
```
