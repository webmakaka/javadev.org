---
layout: page
title: Jenkins Installation in Ubuntu 20.04
description: Jenkins Installation in Ubuntu 20.04
keywords: ubuntu, jenkins, installation
permalink: /devtools/cicd/jenkins/install/ubuntu/20.04/
---

# Jenkins Installation in Ubuntu 20.04

<br/>

<strong><a href="/devtools/jdk/install/linux/">JDK8 or OpenJDK8 should be installed.</a></strong>

<br/>

    $ wget -q -O - https://pkg.jenkins.io/debian/jenkins.io.key | sudo apt-key add -

    $ sudo sh -c 'echo deb http://pkg.jenkins-ci.org/debian binary/ > /etc/apt/sources.list.d/jenkins.list'

    $ sudo apt-get update && sudo apt-get install -y jenkins

<br/>

    $ sudo vi /etc/init.d/jenkins

<br/>

add to PATH

```
:/opt/jdk/bin
```

    $ sudo service jenkins restart

    $ sudo service jenkins status

<br/>

http://<HOST_IP>:8080/

<br/>

**Get the default password:**

    $ sudo cat /var/lib/jenkins/secrets/initialAdminPassword
