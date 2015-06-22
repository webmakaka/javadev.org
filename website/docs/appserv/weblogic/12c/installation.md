---
layout: page
title: Weblogic 12c Installation on Centos 6.6 x86_64
permalink: /docs/appserv/weblogic/12c/installation/
---

В документе описывается один из способов инсталляции сервера приложений Oracle Weblogic (WLS) в операционной системе Oracle Linux.  

Предполагается, что виртуальная машина сконфигурирована приблизительно следующим образом.  

https://docs.google.com/document/d/1ZU6Hk5DYitFYwlRFqN2qmJr6maPpvgsVc6ZTiZ1kYVA/edit?hl=ru

В случае обнаружения ошибок, неточностей, опечаток или Вам известны лучшие способы, пишите мне адрес эл. почты.

Самые последние версии (на момент написания):

* Oracle Linux - 5.8 (из ветки 5.X)
* Oracle Weblogic  12c (12.1.1)

Инсталляция происходит на удаленный сервер без GUI.  

Управление процессом установки и настройки происходит с рабочей станции под управлением Windows, на которой устанавлены putty и xming.

При помощью консоли putty на сервере выполняются команды. Xming нужен для получения графических изображений.


### Предварительные настройки:

Некоторые комментарии к следующей команде.  

Создаем резервную копию файла /etc/selinux/config, и меняем значение парамета SELINUX с enforcing на disabled  

    # sed -i.bkp -e "s/SELINUX=enforcing/SELINUX=disabled/g" /etc/selinux/config

А здесь, мы делаем резервную копию и меняем значение timeout с 5 на 0

    # sed -i.bkp -e "s/timeout=5/timeout=0/g" /boot/grub/grub.conf

Выключаю firewall (пока идет установка сервера)

    # service iptables stop

Запрещаю firewall запускаться при старте операционной системы (пока идет установка сервера)

    # chkconfig iptables off




### Инсталляция пакетов:

    # vi /etc/yum.repos.d/oracleLinuxRepoINTERNET.repo

{% highlight bash %}
[OEL_INTERNET]
name=Oracle Enterprise Linux $releasever - $basearch

baseurl=http://public-yum.oracle.com/repo/OracleLinux/OL5/latest/x86_64/
gpgkey=http://public-yum.oracle.com/RPM-GPG-KEY-oracle-el5
gpgcheck=1
enabled=1
{% endhighlight %}


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

    # yum install -y \
    net-snmp \
    ntsysv

    # yum install -y \
    libXext.x86_64

    # yum install -y \
    compat-db-4* \
    compat-libstdc++-296* \
    rng-utils-2* \
    setarch-2*

Создание учетной записи администратора сервера Weblogic

    # groupadd -g 1001 wlsadm
    # useradd -g wlsadm -d /home/weblogic12 -m weblogic12
    # passwd weblogic12

Создание структуры каталогов и назначение необходимых прав

    # mkdir -p /u01/app/oracle/weblogic/12.1
    # chown -R weblogic12:wlsadm /u01/app/oracle/weblogic/12.1
    # chmod -R 775 /u01/app/oracle/weblogic/12.1
    # mkdir -p /u02/weblogic_domains
    # chown -R weblogic12:wlsadm  /u02/weblogic_domains/


### Инсталляция JDK

    https://docs.google.com/document/d/14BjhW1MNu2YiCxl07chdlx9KFfDNOyC_8xT729ZOooQ/edit

### Копирование дистрибутивов Weblogic на сервер (в каталог /tmp):

Необходимо скопировать архивы на сервер:

С другого сервер копирую дистрибутив weblogic

    $ scp oepe-indigo-installer-12.1.1.0.0.201112072225-12.1.1-linux32.bin weblogic12@192.168.1.101:/tmp
    # su - weblogic12
    $ cd /tmp/
    $ chmod +x wls1035_oepe111172_linux32.bin
    $ vi $HOME/.bash_profile

Добавляем перед # User specific environment and startup programs:


{% highlight bash %}
########################
# Weblogic Parameters

### MW_HOME  - Middelware Home

### WL_HOME - Weblogic Server Home

    export MW_HOME=/u01/app/oracle/weblogic/12.1
    export WL_HOME=${MW_HOME}/wlserver_12.1

########################
{% endhighlight %}


    $ source $HOME/.bash_profile


### Инсталляция Weblogic Server

Определите системную переменную DISPLAY следующим образом.

    $ export DISPLAY=192.168.1.200:0.0


В данном случае 192.168.1.200 - ip адрес компьютера, с которого происходит процесс управления установкой. На компьютере установлен и запущен Xming

    $ cd /tmp
    $ ./oepe-indigo-installer-12.1.1.0.0.201112072225-12.1.1-linux32.bin


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image01.png" alt="Weblogic Installation on Centos">


Каталог для инсталляции:  
/u01/app/oracle/weblogic/12.1


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image02.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image03.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image04.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image05.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image06.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image07.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image08.png" alt="Weblogic Installation on Centos">


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image09.png" alt="Weblogic Installation on Centos">


### Создание домена weblogic

Создание домена weblogic с помощью графических средств:

    $ cd /u01/app/oracle/wls/12.1/wlserver_12.1/common/bin/
    $ ./config.sh

Если необходимо стартовать запуск создания домена в текстовом режиме

    $ ./config.sh -mode=console


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image10.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image11.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image12.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image13.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image14.png" alt="Weblogic Installation on Centos">

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image15.png" alt="Weblogic Installation on Centos">

В данном случае, более 1 сервера использовать не планируется, поэтому снимаю все галочки


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image16.png" alt="Weblogic Installation on Centos">


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image17.png" alt="Weblogic Installation on Centos">



Создание домена Weblogic завершено.

### Стартуем домен Weblogic

    $ cd /u02/weblogic_domains/myApp/
    $ ./startWebLogic.sh &

    <Server started in RUNNING mode>

т.к. JEE приложений на сервер пока не разворачивали, при обращении к серверу по проту 7001 видим следующее сообщение.  


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image18.png" alt="Weblogic Installation on Centos" />

<br/><br/>

Можно подкючиться к консоли <host>:7001/console/


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image19.png" alt="Weblogic Installation on Centos">


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image20.png" alt="Weblogic Installation on Centos">  


<br/><br/>

### Развертывание JEE приложения  

Собственно вот это приложение, будем разворачивать на сервере.


https://github.com/javadev-ru/javadev-ru.github.io/blob/master/website/basics/appservers/weblogic/12c/installation/apps/wlnav.war

    $ cd /tmp/
    $ wget https://github.com/javadev-ru/javadev-ru.github.io/raw/master/website/basics/appservers/weblogic/12c/installation/apps/wlnav.war
    $ cp wlnav.war /u01/app/oracle/wls/11.1/user_projects/domains/MyApp/autodeploy


http://192.168.1.201:7001/wlnav


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image21.png" alt="Weblogic Installation on Centos">



<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/weblogic/12c/installation/images/image22.png" alt="Weblogic Installation on Centos">
