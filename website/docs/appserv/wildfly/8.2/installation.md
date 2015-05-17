---
layout: page
title: Wildfly 8.2 installation on Centos 7.1 x86 64 bit
permalink: /appservers/wildfly/8.2/installation/
---

В случае обнаружения ошибок, неточностей, опечаток или Вам известны лучшие способы, пишите мне адрес эл. почты.  


Самые последние версии (на момент написания):  


* Centos - 6.6 (http://centos.org/modules/tinycontent/index.php?id=15)
* JBoss - 7.1 (http://www.jboss.org/jbossas/downloads)
* jdk версии 7  (http://java.sun.com) **С 8 версией java у меня были проблемы со стартом jboss**


### Подготовка операционной системы к инсталляции базы данных:

Некоторые комментарии к следующей команде. Создаем резервную копию файла /etc/selinux/config, и меняем значение парамета SELINUX с enforcing на disabled

    # sed -i.bkp -e "s/SELINUX=enforcing/SELINUX=disabled/g" /etc/selinux/config

А здесь, мы делаем резервную копию и меняем значение timeout с 5 на 0

    # sed -i.bkp -e "s/timeout=5/timeout=0/g" /boot/grub/grub.conf

Выключаю firewall

    # service iptables stop

Запрещаю firewall запускаться при старте операционной системы

    # chkconfig iptables off


<br/>

    # reboot

<!--

### Инсталляция дополнительных пакетов:

    # yum install -y \
    mc \
    nano \
    vim \
    emacs \
    make \
    openssh-clients \
    wget \
    xinetd \
    screen \
    vsftpd \
    gamin \
    unzip \
    ntp \
    net-snmp

-->

### Инсталляция JDK7

http://javadev.org/java_basics/installation/jdk/8/linux/centos/6/x86_x64/

<!--

### Дополнительные настройки:

Настраиваем планировщик заданий  

Сервера ru.pool.ntp.org выбраны в качестве примера  

    # crontab -e



{% highlight bash %}
# Set the date and time via NTP
*/15 * * * * /usr/sbin/ntpdate 0.ru.pool.ntp.org 1.ru.pool.ntp.org 2.ru.pool.ntp.org 3.ru.pool.ntp.org   > /var/log/time.log
{% endhighlight %}


### Автозапуск только выбранных программ

Следующая команда отключает автозапуск сразу всех пакетов.

    # for i in $(chkconfig --list | grep '3:on\|4:on\|5:on' | awk {'print $1'}); do chkconfig --level 345 $i off; done

После этого, включаем в автозапуск следующие программы:

    # {
    chkconfig  --level 345 sshd on
    chkconfig  --level 345 network on
    chkconfig  --level 345 xinetd on
    chkconfig  --level 345 rsyslog on
    chkconfig  --level 345 auditd on
    }

<br/>


-->




### Создание пользователей и групп

    # groupadd -g 1001 jboss_admins

    # useradd \
    -g jboss_admins \
    -d /home/jboss \
    -m jboss



Если нужно добавить пользователя в группу jboss_admins можно это сделать следующей командой:

    # usermod -a -G jboss_admins <user_name>

Устанавливаем пароль для пользователе jboss

    # passwd jboss


### Создание структуры каталогов и назначение необходимых прав

    # mkdir -p /opt/jboss
    # chown -R jboss:jboss_admins /opt/jboss
    # chmod -R 775 /opt/jboss


<!--

    # mkdir -p /u02/jboss_domains/
    # chown -R  jboss:jboss_admins  /u02/jboss_domains/
    # chmod -R 775 /u02/jboss_domains/

-->


### Развертывание jboss

    # su - jboss
    $ cd /opt/jboss
    $ wget http://download.jboss.org/jbossas/7.1/jboss-as-7.1.1.Final/jboss-as-7.1.1.Final.zip
    $ unzip jboss-as-7.1.1.Final.zip
    $ mv jboss-as-7.1.1.Final 7.1.1
    $ rm jboss-as-7.1.1.Final.zip


### Настройка окружения пользователя Jboss

    $ vi ~/.bash_profile

{% highlight bash %}
# User specific environment and startup programs

#### JBoss 7.1.1 ##################

export JBOSS_HOME=/opt/jboss/7.1.1
export PATH=$PATH:$HOME/bin:$JBOSS_HOME/bin

#### JBoss 7.1.1 ##################


{% endhighlight %}



Применить новые параметры окружения к bash:

    $ source ~/.bash_profile


### Создание пользователя с правами доступа к консоли управления JBOSS

    $ add-user.sh

{% highlight bash %}
What type of user do you wish to add?

 a) Management User (mgmt-users.properties)

 b) Application User (application-users.properties)

(a): [ENTER]

Enter the details of the new user to add.

Realm (ManagementRealm) :  [ENTER]

Username : admin

Password :

Re-enter Password :

About to add user 'admin' for realm 'ManagementRealm'

Is this correct yes/no? yes

Added user 'admin' to file '/opt/jboss/7.1.1/standalone/configuration/mgmt-users.properties'

Added user 'admin' to file '/opt/jboss/7.1.1/domain/configuration/mgmt-users.properties'
{% endhighlight %}



### Запуск JBoss

    $ standalone.sh -b=0.0.0.0 -bmanagement=0.0.0.0

http://192.168.1.40:8080/  

192.168.1.40 - ip адрес сервера jboss

<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/jboss/7.1/installation/images/image00.png" alt="jBoss">


<img src="https://raw.githubusercontent.com/javadev-ru/javadev-ru.github.io/master/website/basics/appservers/jboss/7.1/installation/images/image01.png" alt="jBoss">


Если нужно подключиться по ssh под учетной записью jboss.  
Чтобы сервер не перестал работать после закрытии сессии.

    $ screen
    $ standalone.sh -b=0.0.0.0 -bmanagement=0.0.0.0 &



____


Можно запустить с другим конфиг файлом:  
$ standalone.sh -c standalone-full.xml -b=0.0.0.0 -bmanagement=0.0.0.0
