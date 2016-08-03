---
layout: page
title: Using the Oracle Maven Repository with Nexus 2
permalink: /development-tools/repository-management/nexus/2/using-the-oracle-maven-repository-with-nexus/
---

### Using the Oracle Maven Repository with Nexus 2:  

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
