---
layout: page
title: JDK8 installation on Ubuntu 14.04
permalink: /java_basics/installation/jdk/8/linux/ubuntu/14.04/x86_x64/
---


**VARIANT 1:**

    $ sudo add-apt-repository ppa:webupd8team/java
    $ sudo apt-get update
    $ sudo apt-get install oracle-java8-installer
    $ sudo apt-get install oracle-java8-set-default


http://tecadmin.net/install-oracle-java-8-jdk-8-ubuntu-via-ppa/



**VARIANT 2:**

<br/>
Remove OpenJDK (If OpenJDK installed)<br/>

    $ sudo apt-get purge -y openjdk*


<br/><br/>

**Then add on .bashrc link on file .bash_profile.
(as redhat distributives):**


    $ vi ~/.bashrc

<br/>

    ############################################################
    # To use bash_profile as file with Locat Variables
    . ~/.bash_profile
    ############################################################


Then do same as:<br/>
<a href="/java_basics/installation/jdk/8/linux/centos/6/x86_x64/">http://javadev.org/java_basics/installation/jdk/8/linux/centos/6/x86_x64/</a>
