---
layout: page
title: JDK8 installation in linux (Ubuntu, Centos)
description: JDK8 installation in linux (Ubuntu, Centos)
keywords: JDK8, installation, linux, ubuntu, centos
permalink: /devtools/jdk/setup/linux/
---

# JDK installation in linux (Ubuntu, Centos)

To download jdk for now, you need:

1. go to java.sun.com (browser will redirect you to right path).
2. create account if you do not have
3. download latest JDK8 version

https://www.oracle.com/java/technologies/javase/javase-jdk8-downloads.html

4. copy jdk archive into ${HOME} directory.

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

https://www.oracle.com/java/technologies/javase/javase-jdk8-downloads.html

<br/>

Latest for now is: 8u301

<br/>

    $ ls jdk*
    jdk-8u281-linux-x64.tar.gz

    $ tar -xvzpf jdk-8u281-linux-x64.tar.gz
    $ sudo mv jdk1.8.0_281/ /opt/
    $ sudo ln -s /opt/jdk1.8.0_281/ /opt/jdk

<br/>

    $ rm jdk-8u281-linux-x64.tar.gz

<br/>

    $ sudo vi /etc/profile.d/java8.sh

<br/>

```
#### JDK8 #######################

export JAVA_HOME=/opt/jdk
export PATH=${JAVA_HOME}/bin:$PATH

#### JDK8 #######################
```

<br/>

```
$ sudo chmod 755 /etc/profile.d/java8.sh
$ source /etc/profile.d/java8.sh
```

<br/>

Let try to check result:

<br/>

    $ java -version
    java version "1.8.0_281"

<br/>

### OpenJDK installation in linux (I recommend do not use OpenJdk without reasons)

<br/>

    $ sudo apt-get update
    $ sudo apt-get install -yq openjdk-8-jdk

    // get possible jdk locations
    $ sudo update-alternatives --config java

    // specify jdk location
    $ sudo update-alternatives --set java /usr/lib/jvm/java-8-openjdk-amd64/jre/bin/java

    $ java -version

<br/>

**also you can install maven from packages**

    $ sudo apt-get install -yq maven
