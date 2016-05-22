---
layout: page
title: Sonatype Nexus Installation on Centos 6.X x86_x64
permalink: /install/assembly-tools/linux/centos/6/x64/nexus/
---

### Sonatype Nexus Repository Manager




### Run Nexus in Docker container:

$ docker run -d -p 8081:8081 --name nexus sonatype/nexus3

It can take some time (2-3 minutes) for the service to launch in a new container


http://localhost:8081/

    login: admi
    password: admin123


https://hub.docker.com/r/sonatype/nexus3/



<br/>


### Traditional Installation


    # cd /tmp/
    # wget http://download.sonatype.com/nexus/3/nexus-3.0.0-03-unix.tar.gz


<br/>

    # tar -xvzpf nexus-3.0.0-03-unix.tar.gz
    # mkdir -p /opt/nexus/3.0.0
    # mv nexus-3.0.0-03/* /opt/nexus/3.0.0/
    # mv nexus-3.0.0-03/.install4j/ /opt/nexus/3.0.0/
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

<br/>

    $ curl -I http://localhost:8081/
    HTTP/1.1 200 OK
    Date: Sun, 22 May 2016 00:19:40 GMT
    Server: Nexus/3.0.0-03 (OSS)
    X-Frame-Options: SAMEORIGIN
    X-Content-Type-Options: nosniff
    Content-Type: text/html
    Last-Modified: Sun, 22 May 2016 00:19:40 GMT
    Pragma: no-cache
    Cache-Control: post-check=0, pre-check=0
    Expires: 0
    Content-Length: 4747


<br/>

http://localhost:8081/
