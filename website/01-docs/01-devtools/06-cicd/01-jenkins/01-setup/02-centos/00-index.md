---
layout: page
title: Jenkins Installation on Centos 6.6
permalink: /devtools/cicd/jenkins/setup/centos/6/
---

# Jenkins Installation on Centos 6.6

<br/>

    # mkdir /opt/jenkins
    # chown -R <user_name> /opt/jenkins/

<br/>

    $ su - <user_name>
    $ cd /opt/jenkins/
    $ wget http://mirrors.jenkins-ci.org/war/latest/jenkins.war
    $ java -jar jenkins.war

or

    $ java -jar jenkins.war --httpPort=8080

<!-- or

    $ java -jar jenkins.war --httpPort=-1 --httpPort=8080 -->

<br/>

http://<host>:8080/

<br/>

### Add Plugins

Manage Jenkins --> Manage Plugins --> Available

BitBucket Plugin  
Bitbucket Approve Plugin

And then i added current maven home on jenkins console  
/opt/maven/current
