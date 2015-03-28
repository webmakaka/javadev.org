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
<li style="color:green"><strong>Understanding the Java Virtual Machine: Class Loading and Reflection</strong> [ENG, 1h 58m,28 Mar 2015] (<a href="http://www.pluralsight.com/courses/understanding-java-vm-class-loading-reflection">Link</a>)</li>
<li style="color:green"><strong>Treehouse - Java Data Structures</strong></li>
<li style="color:green"><strong>[Pluralsight] Context and Dependency Injection (CDI 1.1) [ENG, 2015]</strong></li>
<li style="color:green"><strong>[Udemy] Java - Java Programming for Beginners! [ENG, ????] <a href="https://www.udemy.com/java-programming-java-java/">link</a></strong></li>
<li style="color:green"><strong>[Udemy] Apache Tomcat 8 [ENG, 2015]</strong></li>
<li style="color:green"><strong>[CBTNuggets] Google App Engine Qualified Developer [ENG, 2015]</strong></li>
<li style="color:green"><strong>[Udemy] Master Object Oriented Design in Java - Projects + Solutions [ENG, 2014]</strong></li>
<li style="color:green"><strong>[InfiniteSkills] Hibernate and Java Persistence API (JPA) Fundamentals [ENG, 2015]</strong></li>
<li style="color:green"><strong>[Lynda] Up and Running with Java [ENG, 2015]</strong></li>
<li style="color:green"><strong>[Pluralsight] Introduction to Integration With Apache Camel [ENG, 2015]</strong></li>
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
