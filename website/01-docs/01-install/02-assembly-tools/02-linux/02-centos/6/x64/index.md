---
layout: page
title: Maven, Gradle installation on Centos 6.X x86_x64
permalink: /install/assembly-tools/linux/centos/6/x64/
---

### Maven Installation:


<strong>Distrib:</strong><br/>
http://maven.apache.org

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
