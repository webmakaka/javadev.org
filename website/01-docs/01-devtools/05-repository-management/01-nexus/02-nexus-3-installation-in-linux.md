---
layout: page
title: Nexus 3.X Installation in linux
description: Nexus 3.X Installation in linux
keywords: Nexus 3.X Installation in linux
permalink: /devtools/repository-management/nexus/3/installation-in-linux/
---

# Nexus 3.X Installation in linux

<br/>

    $ cd /tmp/
    $ wget http://download.sonatype.com/nexus/3/nexus-3.37.3-02-unix.tar.gz

<br/>

    $ tar -xvzpf nexus-3.37.3-02-unix.tar.gz
    $ sudo mkdir -p /opt/nexus/3.37
    $ sudo mv nexus-3.37.3-02/* /opt/nexus/3.37/
    $ sudo mv nexus-3.37.3-02/.install4j/ /opt/nexus/3.37/
    $ sudo ln -s /opt/nexus/3.37/ /opt/nexus/current

<br/>

    $ sudo chown -R ${USER} /opt/nexus/

<br/>

    $ sudo vi ~/.bash_profile

<br/>

```
#### NEXUS 3.0.0 #########################

export NEXUS_HOME=/opt/nexus/current
export PATH=$PATH:$NEXUS_HOME/bin

#### NEXUS 3.0.0 #########################
```

<br/>

    $ source ~/.bash_profile

<br/>

    $ nexus start

<br/>

    $ nexus status
    nexus is running.

<br/>

wait 2-3 minutes

<br/>

```
$ curl -I http://localhost:8081/
HTTP/1.1 200 OK
Date: Mon, 28 Feb 2022 23:55:42 GMT
Server: Nexus/3.37.3-02 (OSS)
X-Content-Type-Options: nosniff
X-Frame-Options: DENY
X-XSS-Protection: 1; mode=block
Content-Type: text/html
Last-Modified: Mon, 28 Feb 2022 23:55:42 GMT
Pragma: no-cache
Cache-Control: no-cache, no-store, max-age=0, must-revalidate, post-check=0, pre-check=0
Expires: 0
Content-Length: 7925
```

<br/>

http://localhost:8081/

<br/>

**Check**

<br/>

    $ mkdir -p /home/developer/.m2/

<br/>

    // Backup original if it exists
    $ cp ~/.m2/settings.xml ~/.m2/settings.xml.orig

    $ vi ~/.m2/settings.xml

<br/>

**My config**

<br/>

```
<settings>
    <profiles>
        <profile>
          <id>main</id>
          <activation>
            <activeByDefault>true</activeByDefault>
          </activation>
          <repositories>
            <repository>
              <id>maven-central</id>
              <url>http://localhost:8081/repository/maven-central/</url>
              <layout>default</layout>
              <releases>
                <enabled>true</enabled>
              </releases>
            </repository>
          </repositories>
          <pluginRepositories>
            <pluginRepository>
              <id>maven-central</id>
              <url>http://localhost:8081/repository/maven-central/</url>
            </pluginRepository>
          </pluginRepositories>
        </profile>
      </profiles>
        <servers>
            <server>
                <id>maven-central</id>
                <username>admin</username>
                <password>admin123</password>
                <configuration>
                  <basicAuthScope>
                    <host>ANY</host>
                    <port>ANY</port>
                    <realm>OAM 11g</realm>
                  </basicAuthScope>
                  <httpConfiguration>
                    <all>
                      <params>
                        <property>
                          <name>http.protocol.allow-circular-redirects</name>
                          <value>%b,true</value>
                        </property>
                      </params>
                    </all>
                  </httpConfiguration>
                </configuration>
              </server>
        </servers>
</settings>
```

<br/>

    $ cd /tmp/
    $ git clone https://marley-spring@bitbucket.org/marley-spring/building-an-e-commerce-store-using-java-spring-framework.git

    $ cd building-an-e-commerce-store-using-java-spring-framework/

    $ mvn package

<br/>

![Nexus Repo](/img/docs/devtools/repository-management/nexus/pic-nexus3-maven.png 'Nexus Repo'){: .center-image }
