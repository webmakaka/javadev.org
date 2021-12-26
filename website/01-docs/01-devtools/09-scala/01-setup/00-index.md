---
layout: page
title: Installation SCALA in linux
description: Installation SCALA in linux
keywords: linux, scala, installation
permalink: /devtools/scala/setup/linux/
---

# Installation SCALA in linux

<br/>

### Scala3

```
$ cd ~
$ curl -fLo cs https://git.io/coursier-cli-"$(uname | tr LD ld)"
$ chmod +x cs
$ ./cs
$ ./cs setup
```

<br/>

**Scala3**

```
$ ./cs install scala3-compiler
$ ./cs install scala3
```

<br/>

    $ sudo vi /etc/profile.d/scala3.sh

<br/>

add

```
#### SCALA 3 #######################

export PATH="$PATH:/home/marley/.local/share/coursier/bin"

#### SCALA 3 #######################
```

<br/>

```
$ sudo chmod 755 /etc/profile.d/scala3.sh
$ source /etc/profile.d/scala3.sh
```

<br/>

```
$ scala3 -version
Scala code runner version 3.1.2-RC1-bin-20211220-0b55c7d-NIGHTLY-git-0b55c7d -- Copyright 2002-2021, LAMP/EPFL
```

<br/>

### Scala2

https://www.scala-sbt.org/download.html

<br/>

### Scala from ubuntu repo

    // Possible can enough for debian like distributives
    $ sudo apt install -y scala

<br/>

### Scala from bintray repo

<br/>

```

echo "deb https://dl.bintray.com/sbt/debian /" | sudo tee -a /etc/apt/sources.list.d/sbt.list
curl -sL "https://keyserver.ubuntu.com/pks/lookup?op=get&search=0x2EE0EA64E40A89B84B2DF73499E82A75642AC823" | sudo apt-key add
sudo apt-get update
sudo apt-get install sbt

```

<br/>

    $ sbt console

<br/>

### Scala 2.X - Manually installation

https://www.scala-lang.org/download/

<br/>

    $ cd ${HOME}
    $ wget https://downloads.lightbend.com/scala/2.13.0/scala-2.13.0.tgz

    $ ls scala*
    scala-2.13.0.tgz

    $ tar xf scala-2.13.0.tgz -C ./

    $ sudo mkdir -p /opt/scala/2.13.0
    $ sudo mv scala-2.13.0/* /opt/scala/2.13.0/
    $ sudo ln -s /opt/scala/2.13.0/ /opt/scala/current

<br/>

    $ rm -rf scala-2.13.0/
    $ rm -rf scala-2.13.0.tgz

<br/>

    $ sudo vi /etc/profile.d/scala.sh

<br/>

add

```

#### SCALA 2.13.0

export SCALA_HOME=/opt/scala/current
export PATH=${SCALA_HOME}/bin:$PATH

#### SCALA 2.13.0

```

<br/>

```
$ sudo chmod 755 /etc/profile.d/scala.sh
$ source /etc/profile.d/scala.sh
```

<br/>

    $ scala -version
    Scala code runner version 2.13.0 -- Copyright 2002-2018, LAMP/EPFL and Lightbend, Inc.
