---
layout: page
title: Weblogic 12c Installation on Centos 6.6 x86_64
permalink: /docs/appserv/weblogic/12c/installation/
---

I think i should correct this packages list what needs to be install.

### Package Installation:


    # yum install -y \
    mc \
    nano \
    gcc \
    make \
    openssh-clients \
    wget \
    xinetd \
    screen \
    vsftpd \
    gamin \
    unzip \
    ntp

<br/>

    # yum install -y \
    net-snmp \
    ntsysv

<br/>

    # yum install -y \
    libXext.x86_64

<br/>

    # yum install -y \
    compat-db-4* \
    compat-libstdc++-296* \
    rng-utils-2* \
    setarch-2*


### Create Weblogic admin


    # groupadd -g 1001 wlsadm
    # useradd -g wlsadm -d /home/weblogic12 -m weblogic12
    # passwd weblogic12

<br/>

    # mkdir -p /u01/app/oracle/weblogic/12.1
    # chown -R weblogic12:wlsadm /u01/app/oracle/weblogic/12.1
    # chmod -R 775 /u01/app/oracle/weblogic/12.1
    # mkdir -p /u02/weblogic_domains
    # chown -R weblogic12:wlsadm  /u02/weblogic_domains/


### Copy Weblogic distrib on Server (in catalog /tmp):


    $ scp oepe-indigo-installer-12.1.1.0.0.201112072225-12.1.1-linux32.bin weblogic12@192.168.1.101:/tmp

    # su - weblogic12
    $ cd /tmp/
    $ chmod +x wls1035_oepe111172_linux32.bin

<br/>  

    $ vi $HOME/.bash_profile

Before # User specific environment and startup programs:


{% highlight bash %}
########################
# Weblogic Parameters

### MW_HOME - Middelware Home
### WL_HOME - Weblogic Server Home

export MW_HOME=/u01/app/oracle/weblogic/12.1
export WL_HOME=${MW_HOME}/wlserver_12.1

########################
{% endhighlight %}


    $ source $HOME/.bash_profile


### Weblogic Server Installation

    $ export DISPLAY=192.168.1.200:0.0


 192.168.1.200 - ip address of the computer which i use to manage installation process. If that computer working on Windows, Xming server shoudl be installed and run.

    $ cd /tmp
    $ ./oepe-indigo-installer-12.1.1.0.0.201112072225-12.1.1-linux32.bin


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image01.png" alt="Weblogic Installation on Centos">


Folder for installation:  
/u01/app/oracle/weblogic/12.1


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image02.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image03.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image04.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image05.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image06.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image07.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image08.png" alt="Weblogic Installation on Centos">


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image09.png" alt="Weblogic Installation on Centos">


### Weblogic domain creation

Weblogic domain creation with GUI:

    $ cd /u01/app/oracle/wls/12.1/wlserver_12.1/common/bin/
    $ ./config.sh

To start creation in text mode use:

    $ ./config.sh -mode=console


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image10.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image11.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image12.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image13.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image14.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image15.png" alt="Weblogic Installation on Centos">

We are not planning to use more then 1 application server

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image16.png" alt="Weblogic Installation on Centos">


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image17.png" alt="Weblogic Installation on Centos">



### Weblogic domain start

    $ cd /u02/weblogic_domains/myApp/
    $ ./startWebLogic.sh &

    <Server started in RUNNING mode>

We do not deploy JEE app on server yet.
If we will try to connect to server by port 7001, we will recieve next message.  


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image18.png" alt="Weblogic Installation on Centos" />

<br/><br/>

We can connect to the server console <host>:7001/console/


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image19.png" alt="Weblogic Installation on Centos">


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image20.png" alt="Weblogic Installation on Centos">  


<br/><br/>

### JEE App deployment on Weblgic Server


Next application we would deploy to server:


https://github.com/javadev-ru/javadev-ru.github.io/blob/master/website/basics/appservers/weblogic/12c/installation/apps/wlnav.war

    $ cd /tmp/
    $ wget https://github.com/javadev-ru/javadev-ru.github.io/raw/master/website/basics/appservers/weblogic/12c/installation/apps/wlnav.war
    $ cp wlnav.war /u01/app/oracle/wls/11.1/user_projects/domains/MyApp/autodeploy


http://192.168.1.201:7001/wlnav


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image21.png" alt="Weblogic Installation on Centos">



<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image22.png" alt="Weblogic Installation on Centos">
