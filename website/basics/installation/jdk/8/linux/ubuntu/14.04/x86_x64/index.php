<!DOCTYPE html>
<html>


<?php $title="JDK8 installation on Ubuntu 14.04"; ?>

<?php
ob_start();
include("../../../../../../../../_header.php");
$buffer=ob_get_contents();
ob_end_clean();
$buffer=str_replace("%TITLE%",$title,$buffer);
echo $buffer;
?>



<body>

<br/><br/>


<?php include_once "../../../../../../../../_navBar.php"?>


<hr>
<br/><br/>

<div class="link">



<h2>JDK8 installation on Ubuntu 14.04</h2>

<!--

VERSION

<pre>

Simplest way to install jdk on Ubuntu: 
(I recommend use this method for development only)


$ sudo add-apt-repository ppa:webupd8team/java
$ sudo apt-get update
$ sudo apt-get install oracle-java8-installer
$ sudo apt-get install oracle-java8-set-default


http://tecadmin.net/install-oracle-java-8-jdk-8-ubuntu-via-ppa/

</pre>


<br/><br/>

-->
<br/><br/>
Remove OpenJDK (If OpenJDK installed)<br/>
$ sudo apt-get purge -y openjdk*


<br/><br/>

<strong>Then add on .bashrc link on file .bash_profile. On this file we would store some environment variables (as redhat distributives):</strong>

<pre>

$ vi ~/.bashrc

############################################################
# To use bash_profile as file with Locat Variables
. ~/.bash_profile 
############################################################


</pre>

<br/><br/>
Then do same as:<br/>
http://javadev.org/java_basics/installation/jdk/8/linux/centos/6/x86_x64/


</div>

<?php include_once "../../../../../../../../_footer.php"?>

</body>

</html>
