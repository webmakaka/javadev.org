---
layout: page
title: JDK8 installation on Centos 7.X
permalink: /jdk/installation/centos/7/
---


### Next packages we will use for JDK installation:

	# yum install -y \
	vim \
	wget \
	unzip \
    tar


<br/>

### JDK8 Installation:

Before start, you can check on site: java.sun.com latest jdk version.

	# cd /tmp

To download jdk from oracle website execute next command in the command line:

    # wget --no-check-certificate --no-cookies - --header "Cookie: oraclelicense=accept-securebackup-cookie" http://download.oracle.com/otn-pub/java/jdk/8u91-b14/jdk-8u91-linux-x64.tar.gz


<br/>

    # ls jdk*
	jdk-8u91-linux-x64.tar.gz

    # tar -xvzpf jdk-8u91-linux-x64.tar.gz
    # mkdir -p /opt/jdk/1.8.0_91
    # mv jdk1.8.0_91/* /opt/jdk/1.8.0_91/
    # ln -s /opt/jdk/1.8.0_91 /opt/jdk/current

username - that user will work with java

    # useradd <username>
    # su - <username>

<br/>

    $ vi ~/.bash_profile

<br/>

after

    # User specific environment and startup programs

<br/>

	#### JAVA 1.8.0 #######################

		export JAVA_HOME=/opt/jdk/current
		export PATH=${JAVA_HOME}/bin:$PATH

	#### JAVA 1.8.0 #######################

<br/>


     $ source ~/.bash_profile


Let try to check result:

<br/>

    $ java -version
    java version "1.8.0_91"
    Java(TM) SE Runtime Environment (build 1.8.0_91-b14)
    Java HotSpot(TM) 64-Bit Server VM (build 25.91-b14, mixed mode)
