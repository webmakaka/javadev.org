---
layout: page
title: Nexus 2.X Installation in linux
description: Nexus 2.X Installation in linux
keywords: Nexus 2.X Installation in linux
permalink: /devtools/repository-management/nexus/2/installation-on-linux/
---

# Nexus 2.X Installation in linux

    # cd /tmp/
    # wget http://www.sonatype.org/downloads/nexus-latest-bundle.tar.gz

<br/>

    # tar -xvzpf nexus-latest-bundle.tar.gz
    # mkdir -p /opt/nexus/2.13.0
    # mv nexus-2.13.0-01/* /opt/nexus/2.13.0/
    # ln -s /opt/nexus/2.13.0/ /opt/nexus/current

<br/>

    # chown -R <username> /opt/nexus/

<br/>

    $ su - <username>

<br/>

    $ vi ~/.bash_profile

<br/>

    #### NEXUS 2.13.0 #########################

        export NEXUS_HOME=/opt/nexus/current
        export PATH=$PATH:$NEXUS_HOME/bin

    #### NEXUS 2.13.0 #########################

<br/>

    $ source ~/.bash_profile

<br/>

    $ nexus start

<br/>

    $ nexus status
    Nexus OSS is running (150).

<br/>

wait 2-3 minutes

<br/>

    $ curl -I http://localhost:8081/nexus/
    HTTP/1.1 200 OK
    Date: Sat, 28 May 2016 12:31:49 GMT
    Server: Nexus/2.13.0-01
    X-Frame-Options: SAMEORIGIN
    X-Content-Type-Options: nosniff
    Content-Type: text/html
    Last-Modified: Sat, 28 May 2016 12:31:49 GMT
    Content-Length: 8026
    Pragma: no-cache
    Cache-Control: post-check=0, pre-check=0
    Expires: 0

<br/>

http://localhost:8081/nexus/

<br/><br/>

### Using the Oracle Maven Repository with Nexus:

https://www.youtube.com/watch?v=ose6oXq7g7E

License should be approved:  
https://www.oracle.com/webapps/maven/register/license.html

    $ cd /opt/nexus/current/conf
    $ cp nexus.properties nexus.properties.orig

<br/>

    $ vi nexus.properties

add in the bottom:

    nexus.remoteStorage.enableCircularRedirectsForHosts=maven.oracle.com
    nexus.remoteStorage.useCookiesForHosts=maven.oracle.com

<br/>

    $ nexus restart

<br/>

http://localhost:8081/nexus/

Repositories -> Add --> Proxy Repository

Repository ID: maven-oracle  
Repository Name: Maven Oracle

Remote Storage Location: http://maven.oracle.com

Authentication.

Your Username:  
Your Password:

SAVE

<br/>

Public Repositories (group) --> configuration

Move Maven Oracle to left

<br/>

    $ mkdir -p /home/developer/.m2/

<br/>

    $ vi /home/developer/.m2/settings.xml

<br/>

My config. I will update it later (i hope).

<br/>

    <settings>
        <profiles>
            <profile>
              <id>main</id>
              <activation>
                <activeByDefault>true</activeByDefault>
              </activation>
              <repositories>
                <repository>
                  <id>Public Repositories</id>
                  <url>http://localhost:8081/nexus/content/groups/public/</url>
                  <layout>default</layout>
                  <releases>
                    <enabled>true</enabled>
                  </releases>
                </repository>
              </repositories>
              <pluginRepositories>
                <pluginRepository>
                  <id>Public Repositories</id>
                  <url>http://localhost:8081/nexus/content/groups/public/</url>
                </pluginRepository>
              </pluginRepositories>
            </profile>
          </profiles>
    </settings>
