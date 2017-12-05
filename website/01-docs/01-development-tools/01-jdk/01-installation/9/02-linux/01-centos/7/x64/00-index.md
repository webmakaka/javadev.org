---
layout: page
title: JDK9 installation on Centos 7.X
permalink: /development-tools/jdk/9/installation/centos/7/
---


# JDK9 installation on Centos 7.X


### In the beginning install next packages:

	# dnf install -y \
	vim \
	wget \
	unzip \
    tar

<br/>

	#  dnf list installed | grep openjdk
	java-1.8.0-openjdk.x86_64                1:1.8.0.102-4.b14.el7           @System
	java-1.8.0-openjdk-headless.x86_64       1:1.8.0.102-4.b14.el7           @System


<br/>

	# dnf remove -y java*


<br/>

### JDK8 Installation:

Before start, you can check on site: java.sun.com (redirect to http://www.oracle.com/technetwork/java/javase/downloads/index.html) latest jdk version.

	# cd /tmp

To download jdk from oracle website execute next command in the command line:

    # wget --no-check-certificate --no-cookies - --header "Cookie: oraclelicense=accept-securebackup-cookie" http://download.oracle.com/otn-pub/java/jdk/9.0.1+11/jdk-9.0.1_linux-x64_bin.tar.gz


<br/>

    # ls jdk*
	jdk-9.0.1_linux-x64_bin.tar.gz

    # tar -xvzpf jdk-9.0.1_linux-x64_bin.tar.gz
    # mkdir -p /opt/jdk/9.0.1
    # mv jdk-9.0.1/* /opt/jdk/9.0.1/
    # ln -s /opt/jdk/9.0.1 /opt/jdk/current

username - that user will work with java

    # useradd <username>
    # su - <username>

<br/>

    $ vi ~/.bash_profile

<br/>

after

    # User specific environment and startup programs

<br/>

{% highlight bash %}

#### JAVA 9.0.1 #######################

	export JAVA_HOME=/opt/jdk/current
	export PATH=${JAVA_HOME}/bin:$PATH

#######################################

{% endhighlight %}

<br/>


     $ source ~/.bash_profile


Let try to check result:

<br/>

	$ java --version
	java 9.0.1
	Java(TM) SE Runtime Environment (build 9.0.1+11)
	Java HotSpot(TM) 64-Bit Server VM (build 9.0.1+11, mixed mode)
