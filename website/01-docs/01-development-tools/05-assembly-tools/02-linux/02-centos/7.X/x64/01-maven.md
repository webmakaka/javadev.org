---
layout: page
title: Maven installation on Centos 7.X x86_x64
permalink: /development-tools/assembly-tools/maven/linux/centos/7/
---

### Maven

<strong>Distrib:</strong><br/>
http://maven.apache.org


### Maven 3 Installation:

	$ su - root

	# cd /tmp
	# wget http://apache.mirrors.pair.com/maven/maven-3/3.3.9/binaries/apache-maven-3.3.9-bin.tar.gz

	# tar -xvzpf apache-maven-3.3.9-bin.tar.gz
	# mkdir -p /opt/maven/3.3.9
	# mv apache-maven-3.3.9/* /opt/maven/3.3.9/
	# ln -s /opt/maven/3.3.9/ /opt/maven/current

<br/><br/>

	$ su - <username>

	$ vi ~/.bash_profile


<br/>

    #### MAVEN 3.3.9 #########################

    	export MAVEN_HOME=/opt/maven/current
    	export PATH=$PATH:$MAVEN_HOME/bin

    #### MAVEN 3.3.9 #########################


<br/>

    $ source ~/.bash_profile
    $ mvn -version


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

    #### MAVEN 2.2.1 #########################

    	export MAVEN_HOME=/opt/maven/current
    	export PATH=$PATH:$MAVEN_HOME/bin

    #### MAVEN 2.2.1 #########################


<br/>

    $ source ~/.bash_profile
    $ mvn -version
