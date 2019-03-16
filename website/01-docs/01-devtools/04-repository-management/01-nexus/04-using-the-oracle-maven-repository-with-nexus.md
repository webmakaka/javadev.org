---
layout: page
title: Using the Oracle Maven Repository with Nexus 2
permalink: /devtools/repository-management/nexus/2/using-the-oracle-maven-repository-with-nexus/
---

### Using the Oracle Maven Repository with Nexus 2:  


**Nexus 3 versions do not yet have support for proxying maven.oracle.com**

https://issues.sonatype.org/browse/NEXUS-10164



Video:  
https://www.youtube.com/watch?v=ose6oXq7g7E


Article:  
https://support.sonatype.com/hc/en-us/articles/213465728-How-to-configure-a-proxy-repository-to-maven-oracle-com

License should be approved:  
https://www.oracle.com/webapps/maven/register/license.html

<br/>

For Oracle ADF projects:  

**As it turns out the 12.2.1.0.0 version is available but Nexus doesn't display it but when you request a 12.2.1.0.0 POM file it will be served as expected.**

https://community.oracle.com/thread/3925202?start=0&tstart=0


<br/>

    $ cd /opt/nexus/current/conf
    $ cp nexus.properties nexus.properties.orig

<br/>

    $ vi nexus.properties

add in the bottom:

    # Comma separated list of hostnames that needs to accept circular redirections
    nexus.remoteStorage.enableCircularRedirectsForHosts=maven.oracle.com
    # Comma separated list of hostnames that benefit from using cookies
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

### Setup Default Maven Properties to use Nexus Repos


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
