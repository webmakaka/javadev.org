---
layout: page
title: Apache Spark2 installation in Linux
description: Apache2 Spark installation in Linux
keywords: linux, spark2, pyspark, jupyter-notebook, installation
permalink: /devtools/bigdata/spark/install/linux/
---

# Apache Spark2 installation in Linux

    $ cd ${HOME}
    $ wget https://archive.apache.org/dist/spark/spark-2.4.3/spark-2.4.3-bin-hadoop2.7.tgz

    $ ls
    spark-2.4.3-bin-hadoop2.7.tgz

    $ tar xf spark-2.4.3-bin-hadoop2.7.tgz -C ./

    $ sudo mkdir -p /opt/spark-2.4.3
    $ sudo mv spark-2.4.3-bin-hadoop2.7/* /opt/spark-2.4.3
    $ sudo ln -s /opt/spark-2.4.3/ /opt/spark2

<br/>

    $ rm -rf spark-2.4.3-bin-hadoop2.7/
    $ rm -rf spark-2.4.3-bin-hadoop2.7.tgz

<br/>

    $ sudo vi /etc/profile.d/spark.sh

<br/>

```
#### SPARK 2.4.3 #######################

export SPARK_HOME=/opt/spark
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



<br/>

### PySpark and jupyter-notebook installation

    // if jdk not installed
    $ sudo apt install -y openjdk-8-jdk
    $ sudo update-alternatives --config java
    $ java -version


<br/>

    // if scala not installed
    $ sudo apt install -y scala

<br/>

    $ sudo apt install -y python3-pip

<br/>

    $ pip3 install py4j
    $ pip3 install jupyter


<br/>

    $ sudo vi /etc/profile.d/pyspark.sh


<br/>

```
#### SPARK #######################

export PATH=$PATH:~/.local/bin/
export PYTHONPATH=$SPARK_HOME/python:$PYTHONPATH

export PYSPARK_DRIVER_PYTHON=jupyter
export PYSPARK_DRIVER_PYTHON_OPTS='notebook'
export PYSPARK_PYTHON='python3'

#### SPARK #######################
```

<br/>

     $ source /etc/profile.d/pyspark.sh

<br/>

    $ sudo chmod -R 777 /opt/spark/

    $ pip3 install findspark


    $ cd /opt/spark/current/python/
    $ jupyter-notebook --ip 192.168.0.11 --port 8080

<br/>

new python3 notebook

<br/>

```
import findspark
findspark.init('/opt/spark/current')
import pyspark
```


