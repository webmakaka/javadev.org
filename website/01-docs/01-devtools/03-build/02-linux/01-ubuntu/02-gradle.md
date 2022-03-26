---
layout: page
title: Gradle installation in Ubuntu 20.04
description: Gradle installation in Ubuntu 20.04
keywords: java, assembly, maven, gradle, ubuntu
permalink: /devtools/build/gradle/linux/ubuntu/
---

# Gradle installation in Ubuntu 20.04

<br/>

<a href="/devtools/jdk/setup/linux/">JDK Should be installed</a>

<br/>

<strong>Distrib:</strong><br/>

http://www.gradle.org/downloads

<br/>

### Gradle 7.4.1 Installation

    $ cd /tmp
    $ wget https://services.gradle.org/distributions/gradle-7.4.1-all.zip

<br/>

    $ unzip gradle-7.4.1-all.zip
    $ sudo mv gradle-7.4.1 /opt/
    $ sudo ln -s /opt/gradle-7.4.1/ /opt/gradle

<br/>

    $ sudo vi /etc/profile.d/gradle-7.4.1.sh

<br/>

```
#### GRADLE 7.4.1 ###########################

export GRADLE_HOME=/opt/gradle
export PATH=${GRADLE_HOME}/bin:$PATH

#### GRADLE 7.4.1 ###########################
```

<br/>

    $ sudo chmod 755 /etc/profile.d/gradle-7.4.1.sh
    $ source /etc/profile.d/gradle-7.4.1.sh

<br/>

    $ gradle --version

<br/>

### Gradle 6.7.1 Installation

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

<br/>

### Gradle compatibility with JDK

https://docs.gradle.org/current/userguide/compatibility.html
