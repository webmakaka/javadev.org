---
layout: page
title: Hello
permalink: /
---


**Latest 5 added courses:**

* [InfiniteSkills] Hibernate and Java Persistence API (JPA) Fundamentals [ENG, 2015]
* [lynda.com] Up and Running with Java [ENG, 2015]  
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
