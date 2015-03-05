---
layout: page
title: Welcome
permalink: /
---


**Latest 8 added courses:**

* [Udemy] Apache Tomcat 8 [ENG, 2015]
* [CBTNuggets] Google App Engine Qualified Developer [ENG, 2015]
* [Udemy] Master Object Oriented Design in Java - Projects + Solutions [ENG, 2014]
* [InfiniteSkills] Hibernate and Java Persistence API (JPA) Fundamentals [ENG, 2015]
* [Lynda] Up and Running with Java [ENG, 2015]  
* [Pluralsight] Introduction to Integration With Apache Camel [ENG, 2015]  
* [Pluralsight] Scala for Java Developers: Syntax Comparison [ENG, 3h 18m, 26 Feb 2015]  
* [Udemy] Java Servlets - Java Servlets from Practicals and Projects [ENG, 2015]  



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