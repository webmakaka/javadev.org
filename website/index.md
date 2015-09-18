---
layout: page
title: Java Development
permalink: /
---


<div class="row-fluid">
    <div class="span12">

        <div class="row-fluid">
          <div class="span8">


              <h3>Please share interesting code samples on java with us:</h3>

              If you find interesting project on github, bitbucket, book, video course etc. on java, please send a link to us.

              <br/><br/>

              <strong>For example, next repositories is very interesting i think:</strong>

               <br/><br/>

              <a href="https://github.com/javadev-org/java-design-patterns">Design Patterns</a><br/>
              <a href="https://github.com/javadev-org/javaee7-samples">Java EE 7 samples</a><br/>
              <a href="http://www.opencms.org/en/development/core.html">Open CMS</a> (<a href="https://github.com/alkacon/opencms-core">Core src</a>)<br/>

              <br/><br/>

              <strong>Spring</strong>

              <br/><br/>

              <a href="https://github.com/spring-projects/spring-petclinic">spring-petclinic</a>

          </div>

          <div class="span4">

              <a class="twitter-timeline" href="https://twitter.com/hashtag/javadev" data-widget-id="644845215887585280">#javadev Tweets</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

          </div>

        </div>
    </div>

</div>



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


<br/><br/>

<div align="center">
    <img src="/website/pictures/java_wtf.jpg" border="0"
alt="WTF in Minutes">
</div>
