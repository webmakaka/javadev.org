---
layout: page
title: Инсталляция сервера приложений JBoss 7.1 в операционной системе Centos 6.6 x86 64 bit
permalink: /appservers/jboss/7.1/installation/
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



### JDK7 Installation (JDK8 can not properly working with app server)

http://javadev.org/java_basics/installation/jdk/8/linux/centos/6/x86_x64/


    # reboot


### Создание пользователей и групп

    # groupadd -g 1001 wildfly_admins

    # useradd \
    -g wildfly_admins \
    -d /home/wildfly \
    -m wildfly



Если нужно добавить пользователя в группу jboss_admins можно это сделать следующей командой:

    # usermod -a -G jboss_admins <user_name>

Устанавливаем пароль для пользователе jboss

    # passwd wildfly


### Создание структуры каталогов и назначение необходимых прав

    # mkdir -p /opt/wildfly
    # chown -R wildfly:wildfly_admins /opt/wildfly
    # chmod -R 775 /opt/wildfly


### Развертывание jboss

    # su - wildfly
    $ cd /opt/wildfly
    $ wget http://download.jboss.org/wildfly/8.2.0.Final/wildfly-8.2.0.Final.zip
    $ unzip wildfly-8.2.0.Final.zip
    $ mv wildfly-8.2.0.Final 8.2.0
    $ rm wildfly-8.2.0.Final.zip


### Настройка окружения пользователя Jboss

    $ vi ~/.bash_profile

{% highlight bash %}
# User specific environment and startup programs

#### WildFly 8.2.0 ##################

export WILDFLY_HOME=/opt/wildfly/8.2.0
export PATH=$PATH:$HOME/bin:$WILDFLY_HOME/bin

#### WildFly 8.2.0 ##################


{% endhighlight %}



Применить новые параметры окружения к bash:

    $ source ~/.bash_profile


### Создание пользователя с правами доступа к консоли управления JBOSS

    $ add-user.sh

{% highlight bash %}

What type of user do you wish to add?
 a) Management User (mgmt-users.properties)
 b) Application User (application-users.properties)
(a): [Enter]


Enter the details of the new user to add.
Using realm 'ManagementRealm' as discovered from the existing property files.
Username : admin

The username 'admin' is easy to guess
Are you sure you want to add user 'admin' yes/no? yes
Password recommendations are listed below. To modify these restrictions edit the add-user.properties configuration file.
 - The password should not be one of the following restricted values {root, admin, administrator}
 - The password should contain at least 8 characters, 1 alphabetic character(s), 1 digit(s), 1 non-alphanumeric symbol(s)
 - The password should be different from the username
Password :

JBAS152565: Password must not be equal to 'admin', this value is restricted.
Are you sure you want to use the password entered yes/no?


What groups do you want this user to belong to? (Please enter a comma separated list, or leave blank for none)[  ]:


About to add user 'admin' for realm 'ManagementRealm'
Is this correct yes/no?

Added user 'admin' to file '/opt/wildfly/8.2.0/standalone/configuration/mgmt-users.properties'
Added user 'admin' to file '/opt/wildfly/8.2.0/domain/configuration/mgmt-users.properties'
Added user 'admin' with groups  to file '/opt/wildfly/8.2.0/standalone/configuration/mgmt-groups.properties'
Added user 'admin' with groups  to file '/opt/wildfly/8.2.0/domain/configuration/mgmt-groups.properties'
Is this new user going to be used for one AS process to connect to another AS process?
e.g. for a slave host controller connecting to the master or for a Remoting connection for server to server EJB calls.
yes/no?


{% endhighlight %}



### WildFly Start

    $ standalone.sh -b=0.0.0.0 -bmanagement=0.0.0.0

http://192.168.1.11:8080/  

192.168.1.11 - ip адрес сервера jboss


Если нужно подключиться по ssh под учетной записью jboss.  
Чтобы сервер не перестал работать после закрытии сессии.

    $ screen
    $ standalone.sh -b=0.0.0.0 -bmanagement=0.0.0.0 &



____


Можно запустить с другим конфиг файлом:  
$ standalone.sh -c standalone-full.xml -b=0.0.0.0 -bmanagement=0.0.0.0
