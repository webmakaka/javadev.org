---
layout: page
title: Nexus 3.X Installation on Linux
permalink: /development-tools/repository-management/nexus/3/installation-on-linux/
---


<br/>

### Nexus 3.X Installation on Linux


    # cd /tmp/
    # wget http://download.sonatype.com/nexus/3/nexus-3.0.0-03-unix.tar.gz


<br/>

    # tar -xvzpf nexus-3.0.0-03-unix.tar.gz
    # mkdir -p /opt/nexus/3.0.0
    # mv nexus-3.0.0-03/* /opt/nexus/3.0.0/
    # mv nexus-3.0.0-03/.install4j/ /opt/nexus/3.0.0/
    # ln -s /opt/nexus/3.0.0/ /opt/nexus/current


<br/>

    # chown -R <username> /opt/nexus/

<br/>

    $ su - <username>

<br/>

    $ vi ~/.bash_profile

<br/>

    #### NEXUS 3.0.0 #########################

        export NEXUS_HOME=/opt/nexus/current
        export PATH=$PATH:$NEXUS_HOME/bin

    #### NEXUS 3.0.0 #########################

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

    $ curl -I http://localhost:8081/
    HTTP/1.1 200 OK
    Date: Sun, 22 May 2016 00:19:40 GMT
    Server: Nexus/3.0.0-03 (OSS)
    X-Frame-Options: SAMEORIGIN
    X-Content-Type-Options: nosniff
    Content-Type: text/html
    Last-Modified: Sun, 22 May 2016 00:19:40 GMT
    Pragma: no-cache
    Cache-Control: post-check=0, pre-check=0
    Expires: 0
    Content-Length: 4747


<br/>

http://localhost:8081/


<br/>

**Check**

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

<br/>
<br/>

    $ cd /tmp/
    $ git clone https://github.com/marley-spring/Building-an-e-commerce-store-using-java-spring-framework
    $ cd Building-an-e-commerce-store-using-java-spring-framework/
    $ mvn package
