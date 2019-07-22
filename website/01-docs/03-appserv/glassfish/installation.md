---
layout: page
title: Glassfish 4 Installation on Centos 6.6
permalink: /docs/appserv/centos/6.6/glassfish/4/installation/
---

<strong>Distrib:</strong><br/>
http://glassfish.org


	$ su - root

	# cd /tmp
	# wget http://download.java.net/glassfish/4.0/release/glassfish-4.0.zip

	# mkdir -p /opt/glassfish/4.0

	# unzip glassfish-4.0.zip


	# mv glassfish4/* /opt/glassfish/4.0


	# su - user1

	$ vi ~/.bash_profile


<br/><br/>

	#### GLASSFISH 4.0 ##############################

		export GLASSFISH_HOME=/opt/glassfish/4.0/glassfish
		export PATH=$PATH:$GLASSFISH_HOME/bin

	#### GLASSFISH 4.0 ##############################

<br/><br/>

	$ source ~/.bash_profile
	$ asadmin  version


Default password is: adminadmin
