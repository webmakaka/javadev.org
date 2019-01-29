---
layout: page
title: SonarQube
permalink: /development-tools/code-quality/sonarqube/installation/
---

### Official website:

http://www.sonarqube.org/downloads/

<br/>

### SonarQube Installation

I'm working with centos 7.X

DISABLE FIREWALL

    # systemctl disable firewalld
    # systemctl stop firewalld

### 1) JDK8 Installation

-   http://javadev.org/development-tools/jdk/installation/centos/7/

### 2) Maven Installation

-   http://javadev.org/development-tools/assembly-tools/maven/linux/centos/7/

### 3) MySQL Installation (>=5.6)

-   http://sysadm.ru/linux/databases/mysql/installation/centos7/

<br/>

    mysql -u root -p

<br/>

    CREATE DATABASE sonar CHARACTER SET utf8 COLLATE utf8_general_ci;
    CREATE USER 'sonar' IDENTIFIED BY 'sonar';
    GRANT ALL ON sonar.* TO 'sonar'@'%' IDENTIFIED BY 'sonar';
    GRANT ALL ON sonar.* TO 'sonar'@'localhost' IDENTIFIED BY 'sonar';
    FLUSH PRIVILEGES;

### 4) Web Server

<br/>

    # cd /tmp/
    # wget https://sonarsource.bintray.com/Distribution/sonarqube/sonarqube-5.6.zip

    # unzip sonarqube-5.6.zip
    # mkdir -p /opt/sonarqube/5.6
    # mv sonarqube-5.6/* /opt/sonarqube/5.6/

    # ln -s /opt/sonarqube/5.6 /opt/sonarqube/current

<br/>

    $ su - <username>

<br/>

    $ vi ~/.bash_profile

<br/>

after

    # User specific environment and startup programs

<br/>

    #### SonarQube 5.6 #######################

    	export SONAR_QUBE_HOME=/opt/sonarqube/current
    	export PATH=${SONAR_QUBE_HOME}/bin:$PATH

    #### SonarQube 5.6 #######################

<br/>

    $ source ~/.bash_profile

<br/>

    # chown -R <username> /opt/sonarqube/

<br/>

    $ cp /opt/sonarqube/current/conf/sonar.properties /opt/sonarqube/current/conf/sonar.properties.orig

<br/>

    $ vi /opt/sonarqube/current/conf/sonar.properties

<br/>

    sonar.jdbc.username=sonar
    sonar.jdbc.password=sonar
    sonar.jdbc.url=jdbc:mysql://localhost:3306/sonar?useUnicode=true&characterEncoding=utf8&rewriteBatchedStatements=true&useConfigs=maxPerformance

<br/>

    sonar.web.host=192.168.1.11
    sonar.web.context=/
    sonar.web.port=8080

<br/>

    $ cd /opt/sonarqube/current/bin/linux-x86-64/

<br/>

    $ ./sonar.sh start

<br/>

    $ ./sonar.sh status
    SonarQube is running (11973).

To restart:

    $ ./sonar.sh restart

<br/>

### logs

    $ less /opt/sonarqube/current/logs/sonar.log

to clear log file:

    $ cat /dev/null > /opt/sonarqube/current/logs/sonar.log

<br/>

### Checks

    $ ps auxww | grep sonar

<br/>

    $ curl -I http://192.168.1.11:8080
    HTTP/1.1 200 OK
    Server: Apache-Coyote/1.1
    X-Runtime: 555
    ETag: "44bc02970c5e6e02da2f75426ad88a35"
    Cache-Control: no-cache, no-store, must-revalidate
    X-Frame-Options: SAMEORIGIN
    X-XSS-Protection: 1; mode=block
    X-Content-Type-Options: nosniff
    X-Frame-Options: SAMEORIGIN
    X-XSS-Protection: 1; mode=block
    X-Content-Type-Options: nosniff
    Content-Type: text/html;charset=utf-8
    Content-Length: 10194
    Vary: Accept-Encoding
    Date: Sun, 05 Jun 2016 20:27:20 GMT

<br/>   
browser:  
http://192.168.1.11:8080/

<br/>

    login: admin
    password: admin

<br/>

Administration --> SYSTEM --> Update Center --> Available

GitHub

<br/>

### Example how it works

https://www.youtube.com/watch?v=JWI_3ibHNTo

<br/>

to start this example, sonar should works on 9000 port and should be accessible by

    $ curl -I http://localhost:9000

It didn't work for me, until i write in hosts information what 192.168.1.11 is localhost.

<br/>

    # yum install -y git
    # cd /tmp
    $ git clone https://github.com/mvel/mvel
    $ cd mvel/
    $ mvn clean install -DskipTests
    $ mvn sonar:sonar

<br/>

Or you can use spring project from my repo:

<br/>

    $ cd /tmp
    $ git clone git clone https://marley-spring@bitbucket.org/marley-spring/building-an-e-commerce-store-using-java-spring-framework.git
    $ cd Building-an-e-commerce-store-using-java-spring-framework
    $ mvn sonar:sonar

<!-- <br/>

<div align="center">
	<img src="http://storage6.static.itmages.ru/i/16/0618/h_1466254300_6954986_e9423bb326.png" border="0" alt="sonarqube">

<br/><br/>

    <img src="http://storage1.static.itmages.ru/i/16/0618/h_1466256552_1300392_88415246dc.png" border="0" alt="sonarqube">

</div> -->

<br/>

See also:  
https://www.youtube.com/watch?v=xLO8Q_F3jIg  
http://dev.mamikon.net/installing-sonarqube-on-ubuntu/

Gradle:  
http://stackoverflow.com/questions/31892344/sonarqube-is-not-collecting-issues-from-android-gradle-project
