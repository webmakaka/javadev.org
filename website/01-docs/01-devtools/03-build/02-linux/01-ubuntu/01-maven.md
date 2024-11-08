---
layout: page
title: Maven installation in Ubuntu 20
description: Maven installation in Ubuntu 20
keywords: java, assembly, maven, linux, ubuntu
permalink: /devtools/build/maven/linux/ubuntu/
---

# Maven installation in Ubuntu 20

<strong>Distrib:</strong><br/>
http://maven.apache.org

<br/>

### Maven 3 Installation:

<br/>

```
$ mkdir -p ~/tmp && cd ~/tmp

$ wget https://archive.apache.org/dist/maven/maven-3/3.6.3/binaries/apache-maven-3.6.3-bin.tar.gz
```

<br/>

```
$ tar -xvzpf apache-maven-3.6.3-bin.tar.gz
$ sudo mv apache-maven-3.6.3/ /opt/
$ sudo ln -s /opt/apache-maven-3.6.3/ /opt/maven
```

<br/>

```
$ sudo vi /etc/profile.d/maven.sh
```

<br/>

```
#### MAVEN 3.6.3 #######################

export MAVEN_HOME=/opt/maven
export PATH=$PATH:$MAVEN_HOME/bin

#### MAVEN 3.6.3 #######################
```

<br/>

```
$ sudo chmod 755 /etc/profile.d/maven.sh
$ source /etc/profile.d/maven.sh
```

<br/>

Let try to check result:

<br/>

```
$ mvn -version
Apache Maven 3.6.3
```

<br/>

### Some maven commands

    $ mvn help:effective-settings

    $ mvn help:effective-pom

<!--

    $ mvn clean install

-->
