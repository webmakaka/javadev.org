---
layout: page
title: Sonatype Nexus Installation on Centos 6.X x86_x64
permalink: /install/assembly-tools/linux/centos/6/x64/nexus/
---

### Sonatype Nexus Repository Manager


$ docker run -d -p 8081:8081 --name nexus sonatype/nexus3

It can take some time (2-3 minutes) for the service to launch in a new container


http://localhost:8081/

    login: admi
    password: admin123


https://hub.docker.com/r/sonatype/nexus3/





<br/>



    # cd /tmp/
    # wget http://download.sonatype.com/nexus/3/nexus-3.0.0-03-unix.tar.gz


<br/>

    # tar -xvzpf nexus-3.0.0-03-unix.tar.gz
    # mkdir -p /opt/nexus/3.0.0
    # mv nexus-3.0.0-03/* /opt/nexus/3.0.0/
    # ln -s /opt/nexus/3.0.0/ /opt/nexus/current


<br/>

    # chown -R <username> /opt/nexus/

<br/>

    $ su - <username>

<br/>

    $ vi ~/.bash_profile

<br/>

    #### NEXUS 3.0.0 #########################

        export NEXUS_HOME=/opt/nexus/current
        export PATH=$PATH:$NEXUS_HOME/bin

    #### NEXUS 3.0.0 #########################

<br/>

    $ source ~/.bash_profile

<br/>

    $ nexus start

<br/>

wait 2-3 minutes

<br/>

    $ nexus status

<!--

<br/>

$ curl -I http://localhost:8080/  

<br/>

http://localhost:8080/#welcome

-->
