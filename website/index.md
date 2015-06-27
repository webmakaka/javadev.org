---
layout: page
title: Welcome
permalink: /
---

**Please share interesting code samples on java with us:**

If you find interesting project on github, bitbucket, book, video course etc. on java, please send a link to us.


For example, next repositories is very interesting i think:

<a href="https://github.com/javadev-org/java-design-patterns">Design Patterns</a>.

<a href="https://github.com/javadev-org/javaee7-samples">Java EE 7 samples</a>


<a href="http://www.opencms.org/en/development/core.html">Open CMS</a> (<a href="https://github.com/alkacon/opencms-core">Core src</a>)



<br/><br/>


<div align="center">
    <img src="/website/pictures/jars.jpg" border="0"
alt="I can't open the jar">
</div>


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


<div align="center">
    <img src="/website/pictures/java_wtf.jpg" border="0"
alt="WTF in Minutes">
</div>
