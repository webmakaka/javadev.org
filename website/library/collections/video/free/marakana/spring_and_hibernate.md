---
layout: page
title: Marakana Java Videos
permalink: /library/marakana/java/spring-and-hibernate/
---

<strong>[Marakana TV] - Java Web Development with Spring and Hibernate</strong><br/><br/>

<strong>Course Summary</strong><br/>
http://marakana.com/training/java/java_web_development_bootcamp.html


<strong>Videos and source codes:</strong><br/>
https://github.com/marley-java/marakana.com-spring-and-hibernate

<br/>

Release-date: September 2012<br/>
Run-time:  5 day course, every day has 4 videos that are about 1 hour long.<br/>
Video format: .mov (QuickTime Movie)<br/>
Resolution: 800x600 and 1024x768<br/>


<pre>

This is Maranaka's on-site course about Spring & Hibernate. It starts by explaining the troubles of using JDBC and JNDI, and then writing the web application with spring and hibernate

Course Outline

Day 1
- class design: Contact, Address ContactRepository (init, findAll, find, create, update,    delete), AddressRepository (...) Setup (servlet context listener)
- servlets / jsps: view all contact names, add a contact contact: edit name, address, delete contact
- JDBC / JNDI / DataSource initialize tables in repositories, use raw sql

Day 2
- finish servlets
- intro hibernate/jpa META-INF/persistence.xml, persistence-unit-ref in web.xml javax.persistence.{ Persistence, EntityManager } @Entity, @Column, @OneToOne - - Rewrite ContactRepository and AddressRepository (findAll, find, create, update, delete) and refactor

Day 3
- intro spring container-managed objects, dependency injection Spring MVC: controllers, @RequestMapping Spring JPA: JpaRepository, bytecode generation
- refactor controller methods model, view, injecting request parameters, redirects
new class design: Contact, Person, Company, Office, Address how to represent polymorphism in jpa? @OneToMany, @ManyToOne, @ManyToMany
- controllers: person: edit name, address, delete person company: edit name, view all offices, add an office, delete company

Day 4
- office front-end introduce UrlEntity helper
- horrible bugs! why doesn't delete work? ... orphan removal lazy loaded associations, open session in view filter
- discussion: Spring high level
- discussion: Transactions and AOP
- discussion: Entity versioning, optimistic locking
- data constraints nullable, length Validation (ex: @NotBlank, all employees of a manager must work for the same company)

Day 5
- REST services more Spring MVC annotations Jackson

</pre>


<br/>

<strong>To start working with code as teacher, do next (on linux):</strong>


	$ git clone https://github.com/code-examples/marakana.com-spring-and-hibernate-code-examples.git
	$ cd marakana.com-spring-and-hibernate-code-examples/
	$ git checkout b46bdc5163f604d12864a622e4129b2df255640b
	$ git branch b46bdc5163f604d12864a622e4129b2df255640b

<br/>

Then you should Import Existing Maven Projects and create folders:<br/>

src/main/java<br/>
src/main/resources<br/>

<br/>
<br/>


<a href="magnet:?xt=urn:btih:3cd18a7da32811869f123b05d87084a2bf24e88f&dn=marakana.com%20-%20Java%20Web%20Development%20with%20Spring%20and%20Hibernate%20%C2%AE%20vampiri6ka&tr=http%3A%2F%2Fbt2.rutracker.org%2Fann%3Fuk%3DGb8OjPC4Gc&tr=http%3A%2F%2Fretracker.local%2Fannounce"> Java Web Development with Spring and Hibernate (magnetlink)</a>



