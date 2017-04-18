---
layout: page
title: JDK8 installation on Ubuntu 14.04
permalink: /development-tools/jdk/installation/ubuntu/14.04/
---


# JDK8 installation on Ubuntu 14.04

**VARIANT 1:**

    $ sudo add-apt-repository ppa:webupd8team/java
    $ sudo apt-get update
    $ sudo apt-get install oracle-java8-installer
    $ sudo apt-get install oracle-java8-set-default

Read more:  
http://tecadmin.net/install-oracle-java-8-jdk-8-ubuntu-via-ppa/



If you will receive an error:

    oracle-license-v1-1 license could not be presented


try to do next:

    $ echo debconf shared/accepted-oracle-license-v1-1 select true | sudo debconf-set-selections

    $ echo debconf shared/accepted-oracle-license-v1-1 seen true | sudo debconf-set-selections


After installation, jars you can find on the next directory:

    /usr/lib/jvm/java-8-oracle/


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
<a href="/development-tools/jdk/installation/centos/7/">HERE</a>
