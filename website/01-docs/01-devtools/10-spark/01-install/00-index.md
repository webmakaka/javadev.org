---
layout: page
title: Apache Spark installation in Linux
permalink: /devtools/spark/install/linux/
---

# Apache Spark installation in Linux

    $ cd ${HOME}
    $ wget https://archive.apache.org/dist/spark/spark-2.4.3/spark-2.4.3-bin-hadoop2.7.tgz


    $ ls
    spark-2.4.3-bin-hadoop2.7.tgz

    $ tar xf spark-2.4.3-bin-hadoop2.7.tgz -C ./

    $ sudo mkdir -p /opt/spark/2.4.3
    $ sudo mv spark-2.4.3-bin-hadoop2.7/* /opt/spark/2.4.3
    $ sudo ln -s /opt/spark/2.4.3/ /opt/spark/current

<br/>

    $ rm -rf spark-2.4.3-bin-hadoop2.7/
    $ rm -rf spark-2.4.3-bin-hadoop2.7.tgz

<br/>

    $ sudo vi /etc/profile.d/spark.sh

<br/>

```
#### SPARK 2.4.3 #######################

export SPARK_HOME=/opt/spark/current
export PATH=${SPARK_HOME}/bin:$PATH

#### SPARK 2.4.3 #######################
```

<br/>

    $ source /etc/profile.d/spark.sh

<br/>

### Test installation

    $ spark-shell

```
      ____              __
     / __/__  ___ _____/ /__
    _\ \/ _ \/ _ `/ __/  '_/
   /___/ .__/\_,_/_/ /_/\_\   version 2.4.3
      /_/
         
```

<br/>

    $ cd ${SPARK_HOME}/bin
    $ ./run-example SparkPi 10


<br/>

    $ pyspark --master local[2]
