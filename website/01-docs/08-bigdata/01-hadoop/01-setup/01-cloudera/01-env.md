---
layout: page
title: Environment for installation Cloudera
description: Environment for installation Cloudera
keywords: Apache. Hadoop, installation, virtualbox, vagrant, cloudera
permalink: /bigdata/hadoop/setup/cloudera/env/
---

# Environment for installation Cloudera

<br/>

Working on doc:  
18.03.2020

<br/>

**You can download prapared 1 node cloudera cluster from cloudera website, and just run it in your virtual machine.**

<br/>

**Can be interesting:**

**Configuring Big Data Cluster using Cloudera Manager**  
https://www.youtube.com/watch?v=jKyJmPPmm1A

<br/>

### On Host Machine

    $ sudo vi /etc/hosts

```
#---------------------------------------------------------------------
# Cloudera cluster
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

    $ cd centos7

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

<br/>

**All nodes**

    # {
        echo never > /sys/kernel/mm/transparent_hugepage/defrag
        echo never > /sys/kernel/mm/transparent_hugepage/enabled
    }

and

    # vi /etc/hosts

```
remove

127.0.0.1       master.cloudera master
```

<br/>

### Install Cloudera Manager (master.clouder)

    # cd /tmp

    // cm6
    # wget https://archive.cloudera.com/cm6/6.3.1/cloudera-manager-installer.bin

also possible

    // cm5
    # wget https://archive.cloudera.com/cm5/installer/latest/cloudera-manager-installer.bin

or

    // cm7
    # wget https://archive.cloudera.com/cm7/7.0.3/cloudera-manager-installer.bin

<br/>

    # chmod +x cloudera-manager-installer.bin

    # ./cloudera-manager-installer.bin

    Next --> Next --> Yes ... etc ...

<br/>

    $ service cloudera-scm-server status

<br/>

<!--
    $ netstat -nap |grep 71800
    $ curl -i http://localhost:7180
-->

**// wait 2-3 minutes**

    $ curl -i -u 'admin:admin' http://localhost:7180/api/v1/tools/echo

<br/>

**even better:**

    $ while true; do curl -i -u 'admin:admin' http://localhost:7180/api/v1/tools/echo; sleep 10; done

<br/>

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
