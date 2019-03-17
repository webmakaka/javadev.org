---
layout: page
title: Jenkins Installation on Ubuntu 18.04
permalink: /devtools/ci/jenkins/install/ubuntu/18.04/
---

# Jenkins Installation on Ubuntu 18.04

    $ wget -q -O - http://pkg.jenkins-ci.org/debian/jenkins-ci.org.key | sudo apt-key add -
    $ sudo sh -c 'echo deb http://pkg.jenkins-ci.org/debian binary/ > /etc/apt/sources.list.d/jenkins.list'
    $ sudo apt-get update && sudo apt-get install -y jenkins
    $ service jenkins status

<br/>

http://<host>:8080/

<br/>

**Get the default password:**

    $ sudo cat /var/lib/jenkins/secrets/initialAdminPassword
