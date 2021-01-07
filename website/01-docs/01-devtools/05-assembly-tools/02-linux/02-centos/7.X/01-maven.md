---
layout: page
title: Maven installation in Centos 7.X
description: Maven installation in Centos 7.X
keywords: java, assembly, maven
permalink: /devtools/assembly-tools/maven/linux/centos/7/
---

# Maven installation in Centos 7.X

<strong>Distrib:</strong><br/>
http://maven.apache.org

### Maven 3 Installation:

    $ su - root

    # cd /tmp
    # wget http://apache-mirror.rbc.ru/pub/apache/maven/maven-3/3.6.2/binaries/apache-maven-3.6.2-bin.tar.gz

    # tar -xvzpf apache-maven-3.6.2-bin.tar.gz
    # mkdir -p /opt/maven/3.6.2
    # mv apache-maven-3.6.2/* /opt/maven/3.6.2/
    # ln -s /opt/maven/3.6.2/ /opt/maven/current

<br/><br/>

    $ su - <username>

    $ vi ~/.bash_profile

<br/>

{% highlight bash %}

#### MAVEN 3.5.3

    export MAVEN_HOME=/opt/maven/current
    export PATH=$PATH:$MAVEN_HOME/bin

#### MAVEN 3.5.3

{% endhighlight %}

<br/>

    $ source ~/.bash_profile
    $ mvn --version
    Apache Maven 3.5.3 (3383c37e1f9e9b3bc3df5050c29c8aff9f295297; 2018-02-24T22:49:05+03:00)

<br/><br/>

### Maven 2 Installation:

    $ su - root

    # cd /tmp
    # wget https://archive.apache.org/dist/maven/maven-2/2.2.1/binaries/apache-maven-2.2.1-bin.tar.gz

    # tar -xvzpf apache-maven-2.2.1-bin.tar.gz
    # mkdir -p /opt/maven/2.2.1
    # mv apache-maven-2.2.1/* /opt/maven/2.2.1/
    # ln -s /opt/maven/2.2.1/ /opt/maven/current

<br/><br/>

    $ su - <username>

    $ vi ~/.bash_profile

<br/>

```
#### MAVEN 2.2.1 #########################

	export MAVEN_HOME=/opt/maven/current
	export PATH=$PATH:$MAVEN_HOME/bin

#### MAVEN 2.2.1 #########################
```

<br/>

    $ source ~/.bash_profile
    $ mvn -version
