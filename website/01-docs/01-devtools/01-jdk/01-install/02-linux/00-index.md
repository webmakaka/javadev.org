---
layout: page
title: JDK installation in linux (Ubuntu, Centos)
permalink: /devtools/jdk/install/linux/
---


# JDK installation in linux (Ubuntu, Centos)


To download jdk for now, you need:

1) go to java.sun.com (browser will redirect you to right path). 
2) create account if you do not have
3) download latest JDK8 version
4) copy jdk archive into ${HOME} directory.


<br/>

## Install packages for installation

<!--

# sed -i "s/.*PasswordAuthentication.*/PasswordAuthentication yes/g" /etc/ssh/sshd_config
# service sshd reload

-->

    // Ubuntu
    $ sudo apt-get install -y \
    vim \
    unzip \
    tar \
    wget

<br/>

    // Centos
    $ sudo yum install -y \
    vim \
    unzip \
    tar \
    wget

<br/>

## Installation JDK8 in linux

    $ ls jdk*
    jdk-8u211-linux-x64.tar.gz

    $ tar -xvzpf jdk-8u211-linux-x64.tar.gz
    $ sudo mkdir -p /opt/jdk/1.8.0_211
    $ sudo mv jdk1.8.0_211/* /opt/jdk/1.8.0_211/
    $ sudo ln -s /opt/jdk/1.8.0_211/ /opt/jdk/current

<br/>

    $ rm -rf jdk1.8.0_211/
    $ rm -rf jdk-8u211-linux-x64.tar.gz

<br/>

    $ sudo vi /etc/profile.d/java.sh


<br/>

```
#### JAVA 1.8.0 #######################

export JAVA_HOME=/opt/jdk/current
export PATH=${JAVA_HOME}/bin:$PATH

#### JAVA 1.8.0 #######################
```

<br/>

     $ source /etc/profile.d/java.sh

<br/>

Let try to check result:

<br/>

    $ java -version
    java version "1.8.0_211"
    Java(TM) SE Runtime Environment (build 1.8.0_211-b12)
    Java HotSpot(TM) 64-Bit Server VM (build 25.211-b12, mixed mode)

