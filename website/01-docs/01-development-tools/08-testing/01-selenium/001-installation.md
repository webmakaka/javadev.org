---
layout: page
title: Selenium installation on Centos 7.X
permalink: /development-tools/testing/selenium/installation/centos/7/
---


### Selenium installation on Centos 7.X:


    # mkdir -p /opt/selenium/2.53
    # chown -R <username> /opt/selenium/


    # su - <username>
    $ cd /opt/selenium/2.53

    $ wget http://selenium-release.storage.googleapis.com/2.53/selenium-server-standalone-2.53.0.jar
    $ ln -s /opt/selenium/2.53/selenium-server-standalone-2.53.0.jar /opt/selenium/selenium


<br/>
<br/>

    $ vi ~/.bash_profile

<br/>

after

    # User specific environment and startup programs

<br/>

	#### SELENIUM 2.53 #######################

		export SELENIUM_HOME=/opt/selenium
		export PATH=${SELENIUM_HOME}/:$PATH

	#### SELENIUM 2.53 #######################

<br/>


     $ source ~/.bash_profile
     $ java -jar /opt/selenium/selenium
