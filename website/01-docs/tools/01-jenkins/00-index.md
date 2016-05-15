---
layout: page
title: Jenkins Installation on Centos 6.6 x86_64
permalink: /tools/jenkins/installation/
---


    # mkdir /opt/jenkins
    # cd /opt/jenkins/

    # wget http://mirrors.jenkins-ci.org/war/latest/jenkins.war

<br/>

    $ su - user
    $ cd /opt/jenkins/
    $ java -jar jenkins.war

or

    $ java -jar jenkins.war --httpPort=8081

or

$ java -jar jenkins.war --httpPort=-1 --httpsPort=8080


http://<host>:8080/

Manage Jenkins --> Manage Plugins --> Available

BitBucket Plugin  
Bitbucket Approve Plugin

And then i added current maven home on jenkins console  
/opt/maven/current



<br/><br/>

For Hudson Link:

    # wget http://mirror.cc.columbia.edu/pub/software/eclipse/hudson/war/hudson-3.3.3.war
