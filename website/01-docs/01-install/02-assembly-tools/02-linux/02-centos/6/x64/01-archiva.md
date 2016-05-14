---
layout: page
title: Archiva Maven Repository Manager Installation on Centos 6.X x86_x64
permalink: /install/assembly-tools/linux/centos/6/x64/archiva/
---

### Archiva Maven Repository Manager

    # cd /tmp/
    # wget http://mirror.symnds.com/software/Apache/archiva/2.2.0/binaries/apache-archiva-2.2.0-bin.tar.gz

<br/>

    # tar -xvzpf apache-archiva-2.2.0-bin.tar.gz
    # mkdir -p /opt/archiva/2.2.0
    # mv apache-archiva-2.2.0/* /opt/archiva/2.2.0/
    # ln -s /opt/archiva/2.2.0/ /opt/archiva/current

<br/>

    # chown -R <username> /opt/archiva/

<br/>

    $ su - <username>

<br/>

    $ vi ~/.bash_profile

<br/>

    #### ARCHIVA 2.2.0 #########################

    	export ARCHIVA_HOME=/opt/archiva/current
    	export PATH=$PATH:$ARCHIVA_HOME/bin

    #### ARCHIVA 2.2.0 #########################

<br/>

    $ source ~/.bash_profile

<br/>

    $ archiva start

<br/>

    $ archiva status
    Apache Archiva is running (1060).

<br/>

    $ curl -I http://localhost:8080/  
    HTTP/1.1 200 OK
    Date: Sat, 14 May 2016 13:43:35 GMT
    Content-Type: text/html
    Last-Modified: Tue, 24 Feb 2015 10:56:14 GMT
    Content-Length: 2832
    Accept-Ranges: bytes
    Server: Jetty(8.1.14.v20131031)

<br/>

http://localhost:8080/#welcome
