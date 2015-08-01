---
layout: page
title: JDK8, Maven, Gradle installation on Centos 6.X x86_x64
permalink: /java_basics/installation/jdk/8/linux/centos/6/x86_x64/
---


### Let install some packages before

	# yum install -y \
	vim \
	wget \
	unzip


<br/>

### JDK8 Installation:

Before start, you can check on site: java.sun.com latest jdk version.

	# cd /tmp

To download jdk from oracle website execute next command in the command line:

    # wget --no-check-certificate --no-cookies - --header "Cookie: oraclelicense=accept-securebackup-cookie" http://download.oracle.com/otn-pub/java/jdk/8u45-b14/jdk-8u45-linux-x64.tar.gz


<br/>

    # ls jdk*
	jdk-8u45-linux-x64.tar.gz

    # tar -xvzpf jdk-8u45-linux-x64.tar.gz
    # mkdir -p /opt/jdk/1.8.0_45
    # mv jdk1.8.0_45/* /opt/jdk/1.8.0_45/
    # ln -s /opt/jdk/1.8.0_45 /opt/jdk/current

username - that user will work with java

    # useradd <username>
    # su - <username>

<br/>

    $ vi ~/.bash_profile

<br/>


	#### JAVA 1.8.0 #######################

		export JAVA_HOME=/opt/jdk/current
		export PATH=$PATH:$JAVA_HOME/bin

	#### JAVA 1.8.0 #######################

<br/>


     $ source ~/.bash_profile


Let try to check result:

<br/>

	$ java -version

<br/><br/>

### IF JDK7 Needed:

    # cd /tmp
    # wget --no-check-certificate --no-cookies - --header "Cookie: oraclelicense=accept-securebackup-cookie" http://download.oracle.com/otn-pub/java/jdk/7u75-b13/jdk-7u75-linux-x64.tar.gz
    # tar -xvzpf jdk-7u75-linux-x64.tar.gz
    # mkdir -p /opt/jdk/1.7.0_75/
    # mv jdk1.7.0_75/* /opt/jdk/1.7.0_75/
    # ln -s /opt/jdk/1.7.0_75/ /opt/jdk/current


<br/><br/>


### Maven Installation:


<strong>Distrib:</strong><br/>
http://maven.apache.org

	$ su - root

	# cd /tmp
	# wget http://apache-mirror.rbc.ru/pub/apache/maven/maven-3/3.3.3/binaries/apache-maven-3.3.3-bin.tar.gz

	# tar -xvzpf apache-maven-3.3.3-bin.tar.gz
	# mkdir -p /opt/maven/3.3.3
	# mv apache-maven-3.3.3/* /opt/maven/3.3.3/
	# ln -s /opt/maven/3.3.3/ /opt/maven/current

<br/><br/>

	$ su - <username>

	$ vi ~/.bash_profile


<br/>

	#### MAVEN 3.3.3 #########################

		export MAVEN_HOME=/opt/maven/current
		export PATH=$PATH:$MAVEN_HOME/bin

	#### MAVEN 3.3.3 #########################


<br/>

    $ source ~/.bash_profile
    $ mvn -version


<br/><br/>


### Gradle Installation:


<strong>Distrib:</strong><br/>
http://www.gradle.org/downloads


	$ su - root

	# cd /tmp
	# wget https://services.gradle.org/distributions/gradle-2.4-all.zip

<br/>

	# unzip gradle-2.4-all.zip
	# mkdir -p /opt/gradle/2.4
	# mv gradle-2.4/* /opt/gradle/2.4/
	# ln -s /opt/gradle/2.4/ /opt/gradle/current


<br/>

	# su - <username>

	$ vi ~/.bash_profile


<br/>


	#### GRADLE 2.4 ###########################

		export GRADLE_HOME=/opt/gradle/current
		export PATH=$PATH:$GRADLE_HOME/bin

	#### GRADLE 2.4 ###########################


<br/>


	$ source ~/.bash_profile

	$ gradle -version
