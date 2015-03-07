<html>

<?php include_once "_header.php"?>


<body>

<?php $page=$_GET['page']; ?>




<br/><br/>


<?php include_once "_navBar.php"?>


<hr>
<br/><br/>

<div class="link">
	<div align="left">


<!--
<h1>Подготовка окружения для разработки/изучения в Centos:</h1>

<br/><br/>

<ul>
	<li>Jdk</li>
	<li>Maven</li>
	<li>Gradle</li>
	<li>Glassfish</li>
	<li>MySQL</li>
	<li>Git</li>
</ul>


<br/><br/>
<br/><br/>

-->


<h1>Let install some packages</h1>


<pre>

# yum install -y \
vim \
wget \
unzip

</pre>

<br/><br/>
<br/><br/>



<h1>JDK Installation on Centos 6.X x86_x64:</h1>




<br/><br/>
<pre>

# cd /tmp

-- downloading jdk from oracle website
# wget --no-check-certificate --no-cookies - --header "Cookie: oraclelicense=accept-securebackup-cookie" http://download.oracle.com/otn-pub/java/jdk/8-b132/jdk-8-linux-x64.tar.gz


# ls
jdk-8-linux-x64.tar.gz


# tar -xvzpf jdk-8-linux-x64.tar.gz

# mkdir -p /opt/jdk/1.8.0

# mv jdk1.8.0/* /opt/jdk/1.8.0


# useradd user1
# su - user1

$ vi ~/.bash_profile


#### JAVA 1.8.0 #######################

	export JAVA_HOME=/opt/jdk/1.8.0
	export PATH=$PATH:$JAVA_HOME/bin

#### JAVA 1.8.0 #######################


$ source ~/.bash_profile


Let check result:

$ java -version
java version "1.8.0"
Java(TM) SE Runtime Environment (build 1.8.0-b132)
Java HotSpot(TM) 64-Bit Server VM (build 25.0-b70, mixed mode)

</pre>

<br/><br/>
<br/><br/>


<!--
<h1>Инсталляция Maven:</h1>


<strong>Дистрибутивы:</strong><br/>
http://maven.apache.org


<pre>



$ cd /tmp
$ wget http://www.sai.msu.su/apache/maven/binaries/apache-maven-3.0.5-bin.tar.gz

$ tar -xvzpf apache-maven-3.0.5-bin.tar.gz

$ sudo mkdir -p /opt/maven/3.0.5

$ sudo mv apache-maven-3.0.5/* /opt/maven/3.0.5/


$ vi ~/.bash_profile


#### MAVEN 3.0.5 #########################

	export MAVEN_HOME=/opt/maven/3.0.5
	export PATH=$PATH:$MAVEN_HOME/bin

#### MAVEN ##############################



$ source ~/.bash_profile


$ mvn -version


</pre>


<br/><br/>

<h1>Инсталляция Gradle:</h1>


<strong>Дистрибутивы:</strong><br/>
http://www.gradle.org/downloads


<pre>



# cd /tmp
# wget http://services.gradle.org/distributions/gradle-1.7-bin.zip

# unzip gradle-1.7-bin.zip

# mkdir -p /opt/gradle/1.7

# mv gradle-1.7/* /opt/gradle/1.7

# su - marley

$ vi ~/.bash_profile


#### GRADLE 1.7 ###########################

	export GRADLE_HOME=/opt/gradle/1.7
	export PATH=$PATH:$GRADLE_HOME/bin

#### GRADLE ##############################



$ source ~/.bash_profile

$ gradle -version

</pre>


<br/><br/>

<h1>Инсталляция Glassfish:</h1>


<strong>Дистрибутивы:</strong><br/>
http://glassfish.org


<pre>

# cd /tmp
# wget http://download.java.net/glassfish/3.1.2.2/release/glassfish-3.1.2.2.zip


# unzip glassfish-3.1.2.2.zip

# mv glassfish3/ /opt/


# su - marley

$ vi ~/.bash_profile


#### GLASSFISH ##############################

	export GLASSFISH_HOME=/opt/glassfish3/glassfish
	export PATH=$PATH:$GLASSFISH_HOME/bin

#### GLASSFISH ##############################



$ source ~/.bash_profile


$ asadmin  version
Version string could not be obtained from Server [localhost:4848] for some reason.
(Turn debugging on e.g. by setting AS_DEBUG=true in your environment, to see the details).
Using locally retrieved version string from version class.
Version = GlassFish Server Open Source Edition 3.1.2.2 (build 5)
Command version executed successfully.


Пароль по умолчанию на создаваемый сервер: adminadmin

<br/><br/>

<h1>Инсталляция MySQL:</h1>


http://sysadm.ru/linux/centos/6/databases/mysql/5/installation/



<br/><br/>

<h1>Инсталляция GIT:</h1>


http://sysadm.ru/linux/git/git-install-from-sources.php




</pre>

-->


	</div>
</div>

<?php include_once "_footer.php"?>

</body>

</html>
