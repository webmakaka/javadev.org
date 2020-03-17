---
layout: page
title: Apache Hadoop, Pig, Hive, Derby installation in Centos Linux
permalink: /devtools/bigdata/hadoop/install/cloudera/more-difficult/
---


# Apache Hadoop installation with Cloudera (IN DEVELOPMENTS)

Watch video before:
https://www.youtube.com/watch?v=bB-qM_OTCsE

<br/>

### On Host Machine

    $ sudo vi /etc/hosts

```
#---------------------------------------------------------------------
# Hadoop cluster
#---------------------------------------------------------------------

192.168.0.10 master.cloudera master
192.168.0.11 node1.cloudera node1
192.168.0.12 node2.cloudera node2
192.168.0.13 node3.cloudera node3
```

<br/>

    $ vagrant plugin install vagrant-hostmanager

<br/>

    master - 8 GB RAM
    3 nodes - 2 GB RAM

<br/>

With 4 GB RAM for master node there were errors on installation.

<br/>

    $ mkdir ~/vagrant-hadoop-cloudera && cd ~/vagrant-hadoop-cloudera

    $ git clone https://github.com/matematika-org/vagrant-hadoop-cloudera .

    $ cd centos

    $ vagrant box update

    $ vagrant up

    $ vagrant status
    Current machine states:

    master.cloudera             running (virtualbox)
    node1.cloudera              running (virtualbox)
    node2.cloudera              running (virtualbox)
    node3.cloudera              running (virtualbox)


<br/>


    $ vagrant ssh master.cloudera

    $ sudo su -

**All nodes**

    # vi /etc/hosts

```
remove

127.0.0.1       master.cloudera master
```

<br/>


### Grant permission to access on localhost by SSH without password (hadoopmaster1, hadoopslave1, hadoopslave2, hadoopslave3)

    master.cloudera

	# ssh-keygen -t dsa -P '' -f ~/.ssh/id_dsa
	# cat ~/.ssh/id_dsa.pub >> ~/.ssh/authorized_keys
	# chmod 0700 ~/.ssh/authorized_keys

	# scp ~/.ssh/id_dsa.pub node1.cloudera:/tmp/id_dsa_master_hadoop.pub
    # scp ~/.ssh/id_dsa.pub node2.cloudera:/tmp/id_dsa_master_hadoop.pub
    # scp ~/.ssh/id_dsa.pub node3.cloudera:/tmp/id_dsa_master_hadoop.pub

	node1.cloudera

	# ssh-keygen -t dsa -P '' -f ~/.ssh/id_dsa
	# cat ~/.ssh/id_dsa.pub >> ~/.ssh/authorized_keys
	# chmod 0700 ~/.ssh/authorized_keys

	# scp ~/.ssh/id_dsa.pub master.cloudera:/tmp/id_dsa_node1_hadoop.pub
    # scp ~/.ssh/id_dsa.pub node2.cloudera:/tmp/id_dsa_node1_hadoop.pub
    # scp ~/.ssh/id_dsa.pub node3.cloudera:/tmp/id_dsa_node1_hadoop.pub

	node2.cloudera

	# ssh-keygen -t dsa -P '' -f ~/.ssh/id_dsa
	# cat ~/.ssh/id_dsa.pub >> ~/.ssh/authorized_keys
	# chmod 0700 ~/.ssh/authorized_keys

	# scp ~/.ssh/id_dsa.pub master.cloudera:/tmp/id_dsa_node2_hadoop.pub
    # scp ~/.ssh/id_dsa.pub node1.cloudera:/tmp/id_dsa_node2_hadoop.pub
    # scp ~/.ssh/id_dsa.pub node3.cloudera:/tmp/id_dsa_node2_hadoop.pub

	node3.cloudera

	# ssh-keygen -t dsa -P '' -f ~/.ssh/id_dsa
	# cat ~/.ssh/id_dsa.pub >> ~/.ssh/authorized_keys
	# chmod 0700 ~/.ssh/authorized_keys

	# scp ~/.ssh/id_dsa.pub master.cloudera:/tmp/id_dsa_node3_hadoop.pub
    # scp ~/.ssh/id_dsa.pub node1.cloudera:/tmp/id_dsa_node3_hadoop.pub
    # scp ~/.ssh/id_dsa.pub node2.cloudera:/tmp/id_dsa_node3_hadoop.pub

<br/>

    master.cloudera

	$ cat /tmp/id_dsa_node1_hadoop.pub >> ~/.ssh/authorized_keys
    $ cat /tmp/id_dsa_node2_hadoop.pub >> ~/.ssh/authorized_keys
    $ cat /tmp/id_dsa_node3_hadoop.pub >> ~/.ssh/authorized_keys

    node1.cloudera

	$ cat /tmp/id_dsa_master_hadoop.pub >> ~/.ssh/authorized_keys
    $ cat /tmp/id_dsa_node2_hadoop.pub >> ~/.ssh/authorized_keys
    $ cat /tmp/id_dsa_node3_hadoop.pub >> ~/.ssh/authorized_key

    node2.cloudera

	$ cat /tmp/id_dsa_master_hadoop.pub >> ~/.ssh/authorized_keys
    $ cat /tmp/id_dsa_node1_hadoop.pub >> ~/.ssh/authorized_keys
    $ cat /tmp/id_dsa_node3_hadoop.pub >> ~/.ssh/authorized_key
    
    node3.cloudera

	$ cat /tmp/id_dsa_master_hadoop.pub >> ~/.ssh/authorized_keys
    $ cat /tmp/id_dsa_node1_hadoop.pub >> ~/.ssh/authorized_keys
    $ cat /tmp/id_dsa_node2_hadoop.pub >> ~/.ssh/authorized_key

<br/>


Install JDK8

# scp ~/jdk-8u241-linux-x64.tar.gz node1.cloudera:/tmp
# scp ~/jdk-8u241-linux-x64.tar.gz node2.cloudera:/tmp
# scp ~/jdk-8u241-linux-x64.tar.gz node3.cloudera:/tmp




=======================





$ vagrant ssh master.cloudera

$ sudo su -


https://docs.cloudera.com/documentation/enterprise/5-14-x/topics/cdh_ig_cdh5_install.html


# yum install -y httpd
# cp /etc/httpd/conf/httpd.conf /etc/httpd/conf/httpd.conf.orig
# vi /etc/httpd/conf/httpd.conf

Listen master.cloudera:80
ServerName master.cloudera:80

NameVirtualHost master.cloudera:80

```
<VirtualHost master.cloudera:80>
    ServerAdmin webmaster@master.cloudera
    DocumentRoot /var/www/docs/master.cloudera
    ServerName master.cloudera
    ErrorLog logs/master.cloudera-error_log
    CustomLog logs/master.cloudera-access_log common
</VirtualHost>
```

# mkdir -p /var/www/docs/master.cloudera
# chkconfig httpd on
# service httpd restart

<br/>

# cd /etc/yum.repos.d/
# wget https://archive.cloudera.com/cdh5/redhat/6/x86_64/cdh/cloudera-cdh5.repo
# wget https://archive.cloudera.com/cm5/redhat/6/x86_64/cm/cloudera-manager.repo

# yum clean all

# yum install -y yum-utils createrepo

# cd /var/www/docs/master.cloudera

# reposync -r cloudera-cdh5
# reposync -r cloudera-manager


# cd /var/www/docs/master.cloudera

# mkdir -p cdh5/redhat/6/x86_64/cdh/5
# mkdir -p cm5/redhat/6/x86_64/cm/5


# mv -f cloudera-cdh5/RPMS cdh5/redhat/6/x86_64/cdh/5/
# mv -f cloudera-manager/RPMS cm5/redhat/6/x86_64/cm/5/


# cd cdh5/redhat/6/x86_64/cdh/5
# createrepo .


# cd /cm5/redhat/6/x86_64/cm/5
# createrepo .


# vi /etc/yum.repos.d/cloudera-cdh5.repo 

```
[cloudera-cdh5]
name=Cloudera's Distribution for Hadoop, Version 5
baseurl=http://master.cloudera/cdh5/redhat/6/x86_64/cdh/5/
gpgkey =http://master.cloudera/cdh5/redhat/6/x86_64/cdh/RPM-GPG-KEY-cloudera
gpgcheck = 1
```



# vi /etc/yum.repos.d/cloudera-manager.repo


```
[cloudera-manager]         
name=Cloudera Manager
baseurl=http://master.cloudera/cm5/redhat/6/x86_64/cm/5/
gpgkey =http://master.cloudera/cm5/redhat/6/x86_64/cm/RPM-GPG-KEY-cloudera    
gpgcheck = 0
enabled = 1
```

cd /var/www/docs/master.cloudera/cm5/redhat/6/x86_64/cm

wget https://archive.cloudera.com/cm5/redhat/6/x86_64/cm/RPM-GPG-KEY-cloudera

<!-- scp cloudera-manager.repo root@node1:/etc/yum.repos.d/
scp cloudera-manager.repo root@node2:/etc/yum.repos.d/
scp cloudera-manager.repo root@node3:/etc/yum.repos.d/ -->


# yum repolist


https://github.com/livenson/parallel-ssh


# cd /tmp
# git clone https://github.com/livenson/parallel-ssh
# mv parallel-ssh/ /opt


<br/>

    # vi /etc/profile.d/parallel-ssh.sh


<br/>

```
#### PARALLEL_SSH_HOME #######################

export PARALLEL_SSH_HOME=/opt/parallel-ssh
export PATH=${PARALLEL_SSH_HOME}/bin:$PATH

#### PARALLEL_SSH_HOME #######################
```

<br/>

     $ source /etc/profile.d/parallel-ssh.sh


<br/>

# git clone https://github.com/dgadiraju/code

# cd code/hadoop/administration/cloudera/scripts/04setup_cluster/


# vi cluster-hosts-vm.txt

```
node1.cloudera
node2.cloudera
node3.cloudera
master.cloudera
```

# chmod +x setup_vm_centos.sh 
# ./setup_vm_centos.sh

ssh root@node1

cat prepareNode.log

============

<br/>

### Install Cloudera Manager

# cd /tmp

# wget https://archive.cloudera.com/cm5/installer/latest/cloudera-manager-installer.bin

# chmod +x cloudera-manager-installer.bin

# ./cloudera-manager-installer.bin

// For local package installation
# ./cloudera-manager-installer.bin --skip_repo_package=1

// wait 2-3 minutes

$ service cloudera-scm-server status

$ netstat -nap |grep 71800

$ curl -i http://localhost:7180

$ curl -i -u 'admin:admin' http://localhost:7180/api/v1/tools/echo

<br/>

http://master.cloudera:7180/

admin/admin

# telnet master.cloudera 7180



<br/>

### Add hosts to cluster

Enterprise Trial --> 

master.cloudera
node1.cloudera
node2.cloudera
node3.cloudera

