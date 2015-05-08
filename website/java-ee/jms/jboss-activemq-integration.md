---
layout: page
title: Jboss ActiveMQ Integration
permalink: /java-ee/jms/jboss-activemq-integration/
---

<div align="center">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/n8Nb6biyeH4" frameborder="0" allowfullscreen></iframe>
</div>

<br/><br/>

Screencast shows how to:  

1\. Deploy ActiveMQ  
2\. Run consumer/supplier samples  
3\. Integrate JBoss AS 6 and ActiveMQ  
4\. Enqueue TextMessage from EJB using ActiveMQ

<br/><br/>
http://activemq.apache.org/activemq-5111-release.html
<br/><br/>

apache-activemq-5.11.1-bin.tar.gz

<br/><br/>

extract apache-activemq-5.11.1-bin.tar.gz to root jboss folder

edit conf/activemq.xml

/jboss-as-7.1.1.Final/apache-activemq-5.11.1/bin/activemq start


http://localhost:8161/admin/

login: admin  
pass: admin  



run ProducerTool.java as Java Application

Queue --> 10 Queues added


run ConsumerTool.java as Java Application


/home/andrey/Desktop/_old_files/jboss-as-7.1.1.Final/



http://repo1.maven.org/maven2/org/apache/activemq/activemq-rar/5.11.1/activemq-rar-5.11.1.rar


$ unzip activemq-rar-5.11.1.rar
