---
layout: page
title: Jenkins Installation on Centos 6.6 x86_64
permalink: /development-tools/continuous-integration/jenkins/
---


    # mkdir /opt/jenkins
    # chown -R <user_name> /opt/jenkins/

<br/>

    $ su - <user_name>
    $ cd /opt/jenkins/
    $ wget http://mirrors.jenkins-ci.org/war/latest/jenkins.war
    $ java -jar jenkins.war

or

    $ java -jar jenkins.war --httpPort=8080

or


    $ java -jar jenkins.war --httpPort=-1 --httpPort=8080





http://<host>:8080/

Manage Jenkins --> Manage Plugins --> Available

BitBucket Plugin  
Bitbucket Approve Plugin

And then i added current maven home on jenkins console  
/opt/maven/current



<br/><br/>

For Hudson Link:

    # wget http://mirror.cc.columbia.edu/pub/software/eclipse/hudson/war/hudson-3.3.3.war
