---
layout: page
title: Welcome
permalink: /
---

**Please share interesting code samples on java with us:**

If you find interesting project on github, bitbucket, book, video course etc. on java, please send a link to us.  
For example, this repository is very <a href="https://github.com/iluwatar/java-design-patterns">helpful</a> i think.

<br/><br/>


**Latest 10 added courses:**

<ul>
<li style="color:green"><strong>[Udemy] Learn Hibernate 4 : Java's Popular ORM Framework [ENG (Indian), 1 Hours, ????] <a href="https://www.udemy.com/hibernate-4-java-orm-framework/">Course Description</a></strong></li>
<li style="color:green"><strong>[O'Reilly]  Enterprise Messaging JMS 1.1 and JMS 2.0 Fundamentals </strong> [ENG, 5 hours 29 minutes, 2014] (<a href="http://shop.oreilly.com/product/0636920034698.do">Course Description</a>)</li>
<li style="color:green"><strong>[InfiniteSkills] Learning Apache Maven Training Video [ENG, 5 hours, 2015]</strong> (<a href="http://www.infiniteskills.com/training/learning-apache-maven.html">Course Description</a>)</li>
<li style="color:green"><strong>[Packtpub] Play Framework for Web Application Development</strong> [ENG, 2 hours 07 minutes, June 28, 2013] (<a href="https://www.packtpub.com/web-development/play-framework-web-application-development-video">Course Description</a>)</li>
<li style="color:green"><strong>[Skillfeed] Intermediate & Advanced Java Programming [ENG, 3 hr 37 min, 2014]</strong> <a href="https://www.skillfeed.com/courses/2105-intermediate-advanced-java-programming">Description</a></li>
<li style="color:green">[Udemy] Java Database Connection: JDBC and MySQL  (<a href="https://www.udemy.com/how-to-connect-java-jdbc-to-mysql/">Course Description</a>)</li>
<li style="color:green"><strong>[Udemy] Projects in Java [ENG, 8 Hours, ????] <a href="https://www.udemy.com/learn-java-by-building-projects/">Course Description</a></strong></li>
<li style="color:green"><strong>[Udemy] Step By Step Java Programming Complete Course [ENG, 3 Hours, ????] <a href="https://www.udemy.com/step-by-step-java-programming-complete-course/">Course Description</a></strong></li>
<li style="color:green"><strong>[Udemy] WebServices/REST API Testing with SoapUI [ENG, 15 Hours, 2015] <a href="https://www.udemy.com/webservices-testing-with-soap-ui/">Course Description</a></strong></li>
<li style="color:green"><strong>[Pluralsight] Understanding the Java Virtual Machine: Class Loading and Reflection</strong> [ENG, 1h 58m,28 Mar 2015] (<a href="http://www.pluralsight.com/courses/understanding-java-vm-class-loading-reflection">Course Description</a>)</li>
</ul>


<br/><br/>

<div class="home">

  <ul class="post-list">
    {% for post in site.posts %}
      <li>
        <span class="post-meta">{{ post.date | date: "%b %-d, %Y" }}</span>

        <h2>
          <a class="post-link" href="{{ post.url | prepend: site.baseurl }}">{{ post.title }}</a>
        </h2>
      </li>
    {% endfor %}
  </ul>


</div>
