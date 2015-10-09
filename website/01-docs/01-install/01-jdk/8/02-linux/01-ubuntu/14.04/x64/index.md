---
layout: page
title: JDK8 installation on Ubuntu 14.04
permalink: /install/jdk/8/linux/ubuntu/14.04/x64/
---


**VARIANT 1:**

    $ sudo add-apt-repository ppa:webupd8team/java
    $ sudo apt-get update
    $ sudo apt-get install oracle-java8-installer
    $ sudo apt-get install oracle-java8-set-default

Read more:  
http://tecadmin.net/install-oracle-java-8-jdk-8-ubuntu-via-ppa/


<br/>

**VARIANT 2:**

<br/>
Remove OpenJDK (If OpenJDK installed)<br/>

    $ sudo apt-get purge -y openjdk*


**Then add on .bashrc link on file .bash_profile.
(as redhat distributives):**


    $ vi ~/.bashrc

<br/>

    ############################################################
    # To use bash_profile as file with Locat Variables
    . ~/.bash_profile
    ############################################################


Then do same as:<br/>
<a href="/install/jdk/8/linux/centos/6/x64/">HERE</a>
