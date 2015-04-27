---
layout: page
title: Welcome
permalink: /
---

**Please share interesting code samples on java with us:**

If you find interesting project on github, bitbucket, book, video course etc. on java, please send a link to us.  
For example, this repository is very <a href="https://github.com/iluwatar/java-design-patterns">helpful</a> i think.

<br/><br/>


**I decided to move list of books and video courses about java development to <a href="http://javalabs.org/">javalabs.org</a>**




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
