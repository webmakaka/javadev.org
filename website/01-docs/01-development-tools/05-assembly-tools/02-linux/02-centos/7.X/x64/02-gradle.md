---
layout: page
title: Gradle installation on Centos 7.X x86_x64
permalink: /development-tools/assembly-tools/gradle/linux/centos/7/
---


### Gradle 2 Installation:

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
