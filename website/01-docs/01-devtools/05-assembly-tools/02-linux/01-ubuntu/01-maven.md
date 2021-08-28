---
layout: page
title: Maven installation in Ubuntu 20
description: Maven installation in Ubuntu 20
keywords: java, assembly, maven, linux, ubuntu
permalink: /devtools/assembly-tools/maven/linux/ubuntu/
---

# Maven installation in Ubuntu 20

<strong>Distrib:</strong><br/>
http://maven.apache.org

<br/>

### Maven 3 Installation:

<br/>

    $ mkdir -p ~/tmp && cd ~/tmp
    $ wget https://apache-mirror.rbc.ru/pub/apache/maven/maven-3/3.8.2/binaries/apache-maven-3.8.2-bin.tar.gz

<br/>

    $ tar -xvzpf apache-maven-3.8.2-bin.tar.gz
    $ sudo mv apache-maven-3.8.2/ /opt/
    $ sudo ln -s /opt/apache-maven-3.8.2/ /opt/maven

<!--

    # tar -xvzpf apache-maven-3.8.2-bin.tar.gz
    # mkdir -p /opt/maven/3.8.2
    # mv apache-maven-3.8.2/* /opt/maven/3.8.2/
    # ln -s /opt/maven/3.8.2/ /opt/maven/current

<br/><br/>

    $ su <username>

    $ vi ~/.bash_profile

<br/>

    $ source ~/.bash_profile
    $ mvn --version
    Apache Maven 3.5.3 (3383c37e1f9e9b3bc3df5050c29c8aff9f295297; 2018-02-24T22:49:05+03:00)

-->

<br/>

    $ sudo vi /etc/profile.d/maven.sh

<br/>

```
#### MAVEN 3.8.2

export MAVEN_HOME=/opt/maven
export PATH=$PATH:$MAVEN_HOME/bin

#### MAVEN 3.8.2
```

<br/>

```
$ sudo chmod 755 /etc/profile.d/maven.sh
$ source /etc/profile.d/maven.sh
```

<br/>

Let try to check result:

<br/>

    $ mvn -version
    java version "1.8.0_281"
