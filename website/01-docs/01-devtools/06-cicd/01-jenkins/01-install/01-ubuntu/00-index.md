---
layout: page
title: Jenkins Installation on Ubuntu 18.04
description: Jenkins Installation on Ubuntu 18.04
keywords: ubuntu, jenkins, installation
permalink: /devtools/cicd/jenkins/install/ubuntu/18.04/
---

# Jenkins Installation on Ubuntu 18.04

<br/>

<strong><a href="/devtools/jdk/install/linux/">JDK8 or OpenJDK8 should be installed.</a></strong>


<br/>

    $ wget -q -O - http://pkg.jenkins-ci.org/debian/jenkins-ci.org.key | sudo apt-key add -
    $ sudo sh -c 'echo deb http://pkg.jenkins-ci.org/debian binary/ > /etc/apt/sources.list.d/jenkins.list'
    $ sudo apt-get update && sudo apt-get install -y jenkins
    $ service jenkins status

<br/>

http://<HOST_IP>:8080/

<br/>

**Get the default password:**

    $ sudo cat /var/lib/jenkins/secrets/initialAdminPassword
