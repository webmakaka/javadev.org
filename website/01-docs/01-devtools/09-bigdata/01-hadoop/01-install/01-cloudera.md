---
layout: page
title: Apache Hadoop installation with Cloudera
description: Apache Hadoop installation
keywords: Apache. Hadoop, installation, virtualbox, vagrant
permalink: /devtools/bigdata/hadoop/install/cloudera/
---


# Apache Hadoop installation with Cloudera

Working on doc:  
17.03.2020


<br/>

**You can download prapared 1 node cloudera cluster from cloudera website, and just run it in your virtual machine.**


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

### Install Cloudera Manager (master.clouder)

    # cd /tmp

    # wget https://archive.cloudera.com/cm5/installer/latest/cloudera-manager-installer.bin

    # chmod +x cloudera-manager-installer.bin

    # ./cloudera-manager-installer.bin

    Next --> Next --> Yest ... etc...

    // wait 2-3 minutes

<br/>

    $ service cloudera-scm-server status

<!--

$ netstat -nap |grep 71800

$ curl -i http://localhost:7180

-->

    $ curl -i -u 'admin:admin' http://localhost:7180/api/v1/tools/echo

response should be:

```
HTTP/1.1 200 OK
Expires: Thu, 01-Jan-1970 00:00:00 GMT
Set-Cookie: CLOUDERA_MANAGER_SESSIONID=b3ywt3my169unctxtycduab7;Path=/;HttpOnly
Content-Type: application/json
Date: Mon, 16 Mar 2020 23:49:21 GMT
Transfer-Encoding: chunked
Server: Jetty(6.1.26.cloudera.4)

{
  "message" : "Hello, World!"
}
```

<br/>

http://master.cloudera:7180/

admin/admin

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-01.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

Add nodes:

master.cloudera
node1.cloudera
node2.cloudera
node3.cloudera

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-02.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-03.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-04.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-05.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-06.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-07.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-08.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-09.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-10.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

I opened a new window to resume installation. 


<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-11.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-12.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-13.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-14.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-15.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-16.png "Hadoop Cloudera Installation"){: .center-image }

<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-17.png "Hadoop Cloudera Installation"){: .center-image }

<br/>
Looks shitty
<br/>

![Hadoop Cloudera Installation](/img/devtools/bigdata/hadoop/install/cloudera/hadoop_cloudera_install-18.png "Hadoop Cloudera Installation"){: .center-image }


