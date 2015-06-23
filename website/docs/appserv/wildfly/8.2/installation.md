---
layout: page
title: Wildfly 8.2 Installation on Centos 6.6 x86_64
permalink: /docs/appserv/wildfly/8.2/installation/
---

Distributives:  


* Centos - 6.6 (http://centos.org/modules/tinycontent/index.php?id=15)  
* WildFly - 8.2 (http://wildfly.org/downloads/)  
* jdk 8 (http://java.sun.com)  


### Before Install:

    # sed -i.bkp -e "s/SELINUX=enforcing/SELINUX=disabled/g" /etc/selinux/config

<br/>

    # sed -i.bkp -e "s/timeout=5/timeout=0/g" /boot/grub/grub.conf

<br/>

    # service iptables stop

<br/>

    # chkconfig iptables off

<br/>

    # reboot


### JDK8 Installation

http://javadev.org/java_basics/installation/jdk/8/linux/centos/6/x86_x64/


### Add User and Groups

    $ sudo groupadd -g 1001 wildfly_admins

<br/>

    $ sudo useradd \
    -g wildfly_admins \
    -d /home/wildfly \
    -m wildfly

If you need to add user to group wildfly_admins, you can do it with the next command:

    # usermod -a -G jboss_admins <user_name>

<br/>

    $ sudo passwd wildfly


### Creating folder structure and permissions for wildfly

    $ sudo mkdir -p /opt/wildfly
    $ sudo chown -R wildfly:wildfly_admins /opt/wildfly
    $ sudo chmod -R 775 /opt/wildfly


### Setup wildfly

    # sudo su - wildfly
    $ cd /opt/wildfly
    $ wget http://download.jboss.org/wildfly/8.2.0.Final/wildfly-8.2.0.Final.zip
    $ unzip wildfly-8.2.0.Final.zip
    $ mv wildfly-8.2.0.Final 8.2.0
    $ rm wildfly-8.2.0.Final.zip


### Setup user environment

    $ vi ~/.bash_profile

{% highlight bash %}

# User specific environment and startup programs

#### WildFly 8.2.0 ##################

export WILDFLY_HOME=/opt/wildfly/8.2.0
export PATH=$PATH:$HOME/bin:$WILDFLY_HOME/bin

#### WildFly 8.2.0 ##################

{% endhighlight %}



Apply new parameters to current environment:

    $ source ~/.bash_profile


### Create user for access to the wildfly web console

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



### To start WildFly

    $ standalone.sh -b=0.0.0.0 -bmanagement=0.0.0.0

http://192.168.1.11:8080/  
http://192.168.1.11:8080/console  

192.168.1.11 - ip address of the wildfly server


-b= - hosts what can connect to the server. 0.0.0.0 - all hosts can.  
-bmanagement - hosts what can connect to admin console. 0.0.0.0 - all hosts can.  

You can specify config file for wildfly server. By default app server starting with standalone.xml config:  
$ standalone.sh -c standalone-full.xml -b=0.0.0.0 -bmanagement=0.0.0.0
