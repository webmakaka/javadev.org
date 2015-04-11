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
<li style="color:green"><strong>[Skillfeed] Intermediate & Advanced Java Programming [ENG, 3 hr 37 min, 2014]</strong> <a href="https://www.skillfeed.com/courses/2105-intermediate-advanced-java-programming">Description</a></li>
<li style="color:green">[Udemy] Java Database Connection: JDBC and MySQL  (<a href="https://www.udemy.com/how-to-connect-java-jdbc-to-mysql/">Course Description</a>)</li>
<li style="color:green"><strong>[Udemy] Projects in Java [ENG, 8 Hours, ????] <a href="https://www.udemy.com/learn-java-by-building-projects/">Course Description</a></strong></li>
<li style="color:green"><strong>[Udemy] Step By Step Java Programming Complete Course [ENG, 3 Hours, ????] <a href="https://www.udemy.com/step-by-step-java-programming-complete-course/">Course Description</a></strong></li>
<li style="color:green"><strong>[Udemy] WebServices/REST API Testing with SoapUI [ENG, 15 Hours, 2015] <a href="https://www.udemy.com/webservices-testing-with-soap-ui/">Course Description</a></strong></li>
<li style="color:green"><strong>[Pluralsight] Understanding the Java Virtual Machine: Class Loading and Reflection</strong> [ENG, 1h 58m,28 Mar 2015] (<a href="http://www.pluralsight.com/courses/understanding-java-vm-class-loading-reflection">Course Description</a>)</li>
<li style="color:green"><strong>[Treehouse] - Java Data Structures</strong></li>
<li style="color:green"><strong>[Pluralsight] Context and Dependency Injection (CDI 1.1) [ENG, 2015]</strong></li>
<li style="color:green"><strong>[Udemy] Java - Java Programming for Beginners! [ENG, ????] <a href="https://www.udemy.com/java-programming-java-java/">link</a></strong></li>
<li style="color:green"><strong>[Udemy] Apache Tomcat 8 [ENG, 2015]</strong></li>
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
