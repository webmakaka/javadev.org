---
layout: page
title: JDK installation on Ubuntu
permalink: /devtools/jdk/install/ubuntu/
---

# JDK installation on Ubuntu

<br/>

### VARIANT 1:

<br/>

**JDK8**

    $ sudo add-apt-repository ppa:webupd8team/java
    $ sudo apt-get update
    $ sudo apt-get install -y oracle-java8-installer
    $ sudo apt-get install oracle-java8-set-default

<br/>

    $ java -version
    java version "1.8.0_201"

<br/>

If you will receive an error:

    oracle-license-v1-1 license could not be presented

try to do next:

    $ echo debconf shared/accepted-oracle-license-v1-1 select true | sudo debconf-set-selections

    $ echo debconf shared/accepted-oracle-license-v1-1 seen true | sudo debconf-set-selections

After installation, jars you can find on the next directory:

    /usr/lib/jvm/java-8-oracle/

<br/>

**JDK11. I do not recommend use > JDK8 without special demands**

    $ sudo add-apt-repository ppa:linuxuprising/java
    $ sudo apt-get update

    $ sudo apt-get install -y oracle-java11-installer
    $ sudo apt-get install oracle-java11-set-default

    $ java -version
    java version "11.0.2" 2019-01-15 LTS

    // Uninstall
    $ sudo apt-get remove oracle-java11-installer

<br/>

### VARIANT 2:

<br/>
Remove OpenJDK (If OpenJDK installed)<br/>

    $ sudo apt-get purge -y openjdk*

**Then add on .bashrc link on file .bash_profile.
(as redhat distributives):**

<br/>

    $ vi ~/.bashrc

<br/>

```shell
############################################################
# To use bash_profile as file with Local Variables
. ~/.bash_profile
############################################################
```

<br/>

**Then do the same:**<br/>
<a href="/devtools/jdk/install/centos/7/">HERE</a>
