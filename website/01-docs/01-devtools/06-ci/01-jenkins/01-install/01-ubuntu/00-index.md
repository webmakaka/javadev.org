---
layout: page
title: Jenkins Installation on Ubuntu 18.04
permalink: /devtools/ci/jenkins/install/ubuntu/18.04/
---

# Jenkins Installation on Ubuntu 18.04

        $ wget -q -O - http://pkg.jenkins-ci.org/debian/jenkins-ci.org.key | sudo apt-key add -
        $ sudo sh -c 'echo deb http://pkg.jenkins-ci.org/debian binary/ > /etc/apt/sources.list.d/jenkins.list'
        $ sudo apt update && apt install -y jenkins
        $ service jenkins status

<br/>

Get the default password:

        $ cat /var/lib/jenkins/secrets/initialAdminPassword
