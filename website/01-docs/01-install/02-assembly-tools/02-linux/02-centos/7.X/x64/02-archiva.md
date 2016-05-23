---
layout: page
title: Archiva Maven Repository Manager Installation on Centos 7.X
permalink: /install/assembly-tools/linux/centos/7.X/archiva/
---

### Archiva Maven Repository Manager

    # cd /tmp/
    # wget http://mirror.symnds.com/software/Apache/archiva/2.2.0/binaries/apache-archiva-2.2.0-bin.tar.gz

<br/>

    # tar -xvzpf apache-archiva-2.2.0-bin.tar.gz
    # mkdir -p /opt/archiva/2.2.0
    # mv apache-archiva-2.2.0/* /opt/archiva/2.2.0/
    # ln -s /opt/archiva/2.2.0/ /opt/archiva/current

<br/>


Changing default port to 8081

    $ vi /opt/archiva/2.2.0/conf/jetty.xml


<br/>

     <Set name="port"><SystemProperty name="jetty.port" default="8081"/></Set>


<br/>

    # chown -R <username> /opt/archiva/

<br/>

    $ su - <username>

<br/>

    $ vi ~/.bash_profile

<br/>

    #### ARCHIVA 2.2.0 #########################

    	export ARCHIVA_HOME=/opt/archiva/current
    	export PATH=$PATH:$ARCHIVA_HOME/bin

    #### ARCHIVA 2.2.0 #########################

<br/>

    $ source ~/.bash_profile

<br/>

    $ archiva start

<br/>

    $ archiva status
    Apache Archiva is running (1060).

<br/>

    $ curl -I http://localhost:8080/  
    HTTP/1.1 200 OK
    Date: Sat, 14 May 2016 13:43:35 GMT
    Content-Type: text/html
    Last-Modified: Tue, 24 Feb 2015 10:56:14 GMT
    Content-Length: 2832
    Accept-Ranges: bytes
    Server: Jetty(8.1.14.v20131031)

<br/>

http://localhost:8080/#welcome



<br/>

### Try to run


### Proxy Connectors: Remove all connections

<br/>

### Repositories:

    ADD

    Id: mirror
    Name: Mirror
    Directory: ./repositories/mirror

    Select:
        Releases
        Block Re-deployment
        Scaned

    SAVE

<br/>



### Proxy Connectors:

    ADD

    Managed Repository: mirror
    Remote Repository: central

    SAVE



<br/>


### USERS --> Manage --> Guest --> Edit --> Edit Roles --> Repository Observer --> + mirror

    UPDATE



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
              <id>mirror</id>
              <url>http://localhost:8081/repository/mirror/</url>
              <layout>default</layout>
              <releases>
                <enabled>true</enabled>
              </releases>
            </repository>
          </repositories>
          <pluginRepositories>
            <pluginRepository>
              <id>mirror</id>
              <url>http://localhost:8081/repository/mirror/</url>
              </pluginRepository>
            </pluginRepositories>
          </profile>
        </profiles>
          <servers>
              <server>
                 <id>mirror</id>
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

<br/>
<br/>

Output should like:

    ***

    Downloaded: http://localhost:8081/repository/mirror/commons-lang/commons-lang/2.1/commons-lang-2.1.jar (203 KB at 505.9 KB/sec)
    Downloaded: http://localhost:8081/repository/mirror/org/codehaus/plexus/plexus-utils/3.0/plexus-utils-3.0.jar (221 KB at 525.7 KB/sec)
    Downloaded: http://localhost:8081/repository/mirror/org/codehaus/plexus/plexus-interpolation/1.15/plexus-interpolation-1.15.jar (60 KB at 105.6 KB/sec)
    Downloaded: http://localhost:8081/repository/mirror/org/codehaus/plexus/plexus-archiver/2.1/plexus-archiver-2.1.jar (181 KB at 270.4 KB/sec)
    [INFO] Building jar: /tmp/Building-an-e-commerce-store-using-java-spring-framework/target/emusicstore-1.0-SNAPSHOT.jar
    [INFO] ------------------------------------------------------------------------
    [INFO] BUILD SUCCESS
    [INFO] ------------------------------------------------------------------------
    [INFO] Total time: 01:00 min
    [INFO] Finished at: 2016-05-23T21:50:45+00:00
    [INFO] Final Memory: 22M/214M
    [INFO] ------------------------------------------------------------------------


s):  
http://evertrue.github.io/blog/2014/07/21/setting-up-an-archiva-repository/
