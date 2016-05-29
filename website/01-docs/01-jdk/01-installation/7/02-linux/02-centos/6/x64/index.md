---
layout: page
title: JDK7 installation on Centos 6.X x86_x64
permalink: /install/jdk/7/linux/centos/6/x64/
---

After April 2015, Oracle will not post further updates of Java SE 7 to its public download sites. Customers who need continued access to critical bug fixes and security fixes as well as general maintenance for Java SE 7 or older versions can get long term support through Oracle Java SE Support.

If Oracle will remove JDK7 from his public website, i will update this insruction with right link on distributives.


### Next packages we will use for JDK installation:

	# yum install -y \
	vim \
	wget \
	unzip


<br/>

### JDK7 Installation:

Before start, you can check on site: java.sun.com latest jdk version.

	# cd /tmp

To download jdk from oracle website execute next command in the command line:

    # wget --no-check-certificate --no-cookies - --header "Cookie: oraclelicense=accept-securebackup-cookie" http://download.oracle.com/otn-pub/java/jdk/7u75-b13/jdk-7u75-linux-x64.tar.gz


<br/>

    # ls jdk*
	jdk-7u75-linux-x64.tar.gz

    # tar -xvzpf jdk-7u75-linux-x64.tar.gz
    # mkdir -p /opt/jdk/1.7.0_75
    # mv jdk1.7.0_75/* /opt/jdk/1.7.0_75/
    # ln -s /opt/jdk/1.7.0_75 /opt/jdk/current

username - that user will work with java

    # useradd <username>
    # su - <username>

<br/>

    $ vi ~/.bash_profile

<br/>


	#### JAVA 1.7.0 #######################

		export JAVA_HOME=/opt/jdk/current
		export PATH=$JAVA_HOME/bin:$PATH

	#### JAVA 1.7.0 #######################

<br/>


     $ source ~/.bash_profile


Let try to check result:

<br/>

	$ java -version
	java version "1.7.0_75"
