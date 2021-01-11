---
layout: page
title: Gradle installation in Ubuntu 20.04
description: Gradle installation in Ubuntu 20.04
keywords: java, assembly, maven, gradle, ubuntu
permalink: /devtools/assembly-tools/gradle/linux/ubuntu/
---

# Gradle installation in Ubuntu 20.04

<br/>

<a href="/devtools/jdk/setup/linux/">JDK8 Should be installed</a>

<br/>

<strong>Distrib:</strong><br/>

http://www.gradle.org/downloads

<br/>

    $ cd /tmp
    $ wget https://services.gradle.org/distributions/gradle-6.7.1-all.zip

<br/>

    $ unzip gradle-6.7.1-all.zip
    $ sudo mv gradle-6.7.1 /opt/
    $ sudo ln -s /opt/gradle-6.7.1/ /opt/gradle

<br/>

    $ sudo vi /etc/profile.d/gradle-6.7.1.sh

<br/>

```
#### GRADLE 6.7.1 ###########################

export GRADLE_HOME=/opt/gradle
export PATH=${GRADLE_HOME}/bin:$PATH

#### GRADLE 6.7.1 ###########################
```

<br/>

     $ sudo chmod 755 /etc/profile.d/gradle-6.7.1.sh
     $ source /etc/profile.d/gradle-6.7.1.sh

<br/>

Let try to check result:

<br/>

    $ gradle --version
