---
layout: page
title: Installation SCALA in linux
permalink: /devtools/scala/install/linux/
---


# Installation SCALA in linux

    $ cd ${HOME}
    $ wget https://downloads.lightbend.com/scala/2.12.8/scala-2.12.8.tgz

    $ ls scala*
    scala-2.12.8.tgz

    $ tar xf scala-2.12.8.tgz -C ./

    $ sudo mkdir -p /opt/scala/2.12.8
    $ sudo mv scala-2.12.8/* /opt/scala/2.12.8/
    $ sudo ln -s /opt/scala/2.12.8/ /opt/scala/current

<br/>

    $ rm -rf scala-2.12.8/
    $ rm -rf scala-2.12.8.tgz

<br/>

    $ sudo vi /etc/profile.d/scala.sh

<br/>

add

```
#### SCALA 2.12.8 #######################

export SCALA_HOME=/opt/scala/current
export PATH=${SCALA_HOME}/bin:$PATH

#### SCALA 1.8.0 #######################
```

<br/>

     $ source /etc/profile.d/scala.sh


<br/>

    $ scala -version
    Scala code runner version 2.12.8 -- Copyright 2002-2018, LAMP/EPFL and Lightbend, Inc.
