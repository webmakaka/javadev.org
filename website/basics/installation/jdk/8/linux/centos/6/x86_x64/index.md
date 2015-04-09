---
layout: page
title: JDK8, Maven, Gradle, Glassfish installation on Centos 6.X x86_x64
permalink: /java_basics/installation/jdk/8/linux/centos/6/x86_x64/
---


<h3>Let install some packages before</h3>

	# yum install -y \
	vim \
	wget \
	unzip


<br/><br/>
<h3>JDK8 Installation:</h3>


<br/>


	# cd /tmp

-- download jdk from oracle website

    # wget --no-check-certificate --no-cookies - --header "Cookie: oraclelicense=accept-securebackup-cookie" http://download.oracle.com/otn-pub/java/jdk/8u40-b26/jdk-8u40-linux-x64.tar.gz

<br/>

    # ls jdk*
	jdk-8u40-linux-x64.tar.gz

    # tar -xvzpf jdk-8u40-linux-x64.tar.gz

    # mkdir -p /opt/jdk/1.8.0.40

    # mv jdk1.8.0_40/* /opt/jdk/1.8.0.40/

    # ln -s /opt/jdk/1.8.0.40 /opt/jdk/current



    # useradd user1
    # su - user1

<br/>

    $ vi ~/.bash_profile

<br/>


	#### JAVA 1.8.0 #######################

		export JAVA_HOME=/opt/jdk/current
		export PATH=$PATH:$JAVA_HOME/bin

	#### JAVA 1.8.0 #######################

<br/>

     $ source ~/.bash_profile


Let check result:

<br/>

    $ java -version
	java version "1.8.0_40"
	Java(TM) SE Runtime Environment (build 1.8.0_40-b26)
	Java HotSpot(TM) 64-Bit Server VM (build 25.40-b25, mixed mode)



<br/><br/>
<h3>Maven Installation:</h3>


<strong>Distrib:</strong><br/>
http://maven.apache.org


	$ su - root

	# cd /tmp
	# wget http://apache-mirror.rbc.ru/pub/apache/maven/maven-3/3.3.1/binaries/apache-maven-3.3.1-bin.tar.gz

	# tar -xvzpf apache-maven-3.3.1-bin.tar.gz

	# mkdir -p /opt/maven/3.3.1

	# mv apache-maven-3.3.1/* /opt/maven/3.3.1/


	$ su - user1

	$ vi ~/.bash_profile


<br/>

	#### MAVEN 3.3.1 #########################

		export MAVEN_HOME=/opt/maven/3.3.1
		export PATH=$PATH:$MAVEN_HOME/bin

	#### MAVEN 3.3.1 #########################


<br/>


    $ source ~/.bash_profile

    $ mvn -version


<br/><br/>

<h3>Gradle Installation:</h3>


<strong>Distrib:</strong><br/>
http://www.gradle.org/downloads


<pre>

$ su - root

# cd /tmp
# wget http://services.gradle.org/distributions/gradle-1.12-bin.zip

# unzip gradle-1.12-bin.zip

# mkdir -p /opt/gradle/1.12

# mv gradle-1.12/* /opt/gradle/1.12

# su - user1

$ vi ~/.bash_profile


#### GRADLE 1.12 ###########################

	export GRADLE_HOME=/opt/gradle/1.12
	export PATH=$PATH:$GRADLE_HOME/bin

#### GRADLE 1.12 ###########################



$ source ~/.bash_profile

$ gradle -version

</pre>


<br/><br/>
<h3>Glassfish Installation:</h3>


<strong>Distrib:</strong><br/>
http://glassfish.org


<pre>

$ su - root

# cd /tmp
# wget http://download.java.net/glassfish/4.0/release/glassfish-4.0.zip

# mkdir -p /opt/glassfish/4.0

# unzip glassfish-4.0.zip


# mv glassfish4/* /opt/glassfish/4.0


# su - user1

$ vi ~/.bash_profile


#### GLASSFISH 4.0 ##############################

	export GLASSFISH_HOME=/opt/glassfish/4.0/glassfish
	export PATH=$PATH:$GLASSFISH_HOME/bin

#### GLASSFISH 4.0 ##############################



$ source ~/.bash_profile


$ asadmin  version
Version string could not be obtained from Server [localhost:4848].
(Turn debugging on e.g. by setting AS_DEBUG=true in your environment, to see the details.)
Using locally retrieved version string from version class.
Version = GlassFish Server Open Source Edition  4.0  (build 89)
Command version executed successfully.



Default password is: adminadmin


</pre>
