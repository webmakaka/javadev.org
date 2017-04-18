---
layout: page
title: Running simple java ee application on weblogic server by docker container
permalink: /docker/weblogic/
---

# Running simple java ee application on weblogic server by docker container


I will run it on Ubuntu Linux. If you working on WIndows, you can use docker-machine to run this example.


    $ cd /projects/
    $ git clone https://github.com/oracle-adf/docker-images

<br/>

### BUILD oracle/jdk image


    $ cd /projects/docker-images/OracleJDK/java-8/

<br/>

    $ wget --no-check-certificate --no-cookies - --header "Cookie: oraclelicense=accept-securebackup-cookie" http://download.oracle.com/otn-pub/java/jdk/8u91-b14/server-jre-8u91-linux-x64.tar.gz

<br/>


    $ cp server-jre-8u91-linux-x64.tar.gz /projects/docker-images/OracleWebLogic/dockerfiles/12.2.1

<br/>

    $ sh build.sh

<br/>

    $ docker images
    REPOSITORY          TAG                 IMAGE ID            CREATED             VIRTUAL SIZE
    oracle/jdk          8                   2419e855eace        47 seconds ago      519.9 MB
    oraclelinux         latest              befb6606d561        9 weeks ago         205.9 MB


<br/>

### BUILD oracle/weblogic:12.2.1-developer image


    REQUIRED FILES TO BUILD THIS IMAGE
    # ----------------------------------
    # (1) fmw_12.2.1.0.0_wls_quick_Disk1_1of1.zip
    #     Download the Developer Quick installer from http://www.oracle.com/technetwork/middleware/weblogic/downloads/wls-for-dev-1703574.html
    #
    # (2) server-jre-8uXX-linux-x64.tar.gz
    #     Download from http://www.oracle.com/technetwork/java/javase/downloads/server-jre8-downloads-2133154.html



<br/>

I don't know how to copy archive with command line and did it by browser.

I copied fmw_12.2.1.0.0_wls_quick_Disk1_1of1.zip to /projects/docker-images/OracleWebLogic/dockerfiles/12.2.1


    $ cd /projects/docker-images/OracleWebLogic/dockerfiles/

<br/>

    $ ./buildDockerImage.sh -d -v 12.2.1

    -d - for developers

<br/>

    $ docker images
    REPOSITORY          TAG                 IMAGE ID            CREATED             VIRTUAL SIZE
    oracle/weblogic     12.2.1-developer    e76bcb931203        27 seconds ago      1.317 GB
    oracle/jdk          8                   2419e855eace        21 minutes ago      519.9 MB
    oraclelinux         latest              befb6606d561        9 weeks ago         205.9 MB


<br/>

### Build MedRec image


    # REQUIRED FILES TO BUILD THIS IMAGE
    # ----------------------------------
    # (1) fmw_12.2.1.0.0_wls_supplemental_quick_Disk1_1of1.zip
    #     Download the Developer Quick installer from http://www.oracle.com/technetwork/middleware/weblogic/downloads/wls-for-dev-1703574.html


I copied fmw_12.2.1.0.0_wls_supplemental_quick_Disk1_1of1.zip to /projects/docker-images/OracleWebLogic/samples/1221-medrec

<br/>

    $ cd /projects/docker-images/OracleWebLogic/samples/1221-medrec

<br/>

    $ docker build -t 1221-medrec .

<br/>

    $ docker images
    REPOSITORY          TAG                 IMAGE ID            CREATED             VIRTUAL SIZE
    1221-medrec         latest              67b8e1b37955        14 seconds ago      1.761 GB
    oracle/weblogic     12.2.1-developer    e76bcb931203        5 minutes ago       1.317 GB
    oracle/jdk          8                   2419e855eace        25 minutes ago      519.9 MB
    oraclelinux         latest              befb6606d561        9 weeks ago         205.9 MB


<br/>

### Run MedRec App on Docker Container


    $ docker run -ti -p 7001:7001 1221-medrec


wait until...

    gicServer> <BEA-000365> <Server state changed to RUNNING.>
         [java] Server started successfully.


<br/>

http://localhost:7001/medrec/


<img src="http://files.javadev.org/docker/weblogic/app/Docker_Java_App_Weblogic_Example_01.png" alt="Docker Java App Weblogic Example">

<br/>

<img src="http://files.javadev.org/docker/weblogic/app/Docker_Java_App_Weblogic_Example_02.png" alt="Docker Java App Weblogic Example">




Materials:  
https://github.com/oracle-adf/docker-images/tree/master/OracleWebLogic
