---
layout: page
title: Spring Boot Development Using Command Line Only
description: Spring Boot Development Using Command Line Only
keywords: java, devtools, neovim, Spring Boot Development Using Command Line Only
permalink: /devtools/ide/neovim/example/
---

<br/>

# Spring Boot Development Using Command Line Only

https://www.youtube.com/watch?v=zmnlpf4FtkE

https://www.developersoapbox.com/command-line-only-spring-boot-development-using-vim/

https://www.developersoapbox.com/creating-a-rest-api-effortlessly-with-spring-rest-repositories/

<br/>

```
$ sudo apt install vim tmux curl unzip
```

<br/>

```
$ mkdir -p ~/projects/dev/java/spring && cd ~/projects/dev/java/spring
$ curl https://start.spring.io/starter.zip -d dependencies=h2,data-jpa,data-rest,lombok -d javaVersion=11 -o demo.zip

$ unzip demo.zip
```

<br/>

```
$ ./mvnw spring-boot:run
```

<br/>

```
$ vi src/main/java/com/example/demo/Beer.java
```

<br/>

```java
package com.example.demo;

import javax.annotation.Generated;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.GenerationType;
import lombok.Data;

@Data
@Entity
public class Beer {
    @Id
    @GeneratedValue(strategy=GenerationType.IDENTITY)
    private Long id;
    private String name;
    private Double abv;
}
```

<br/>

```
$ vi src/main/java/com/example/demo/RestRepository.java
```

<br/>

```java
package com.example.demo;

import org.springframework.data.repository.CrudRepository;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;

@RepositoryRestResource
public interface RestRepository extends CrudRepository<Beer, Long>{}
```

<br/>

```
$ mkdir -p src/main/resources/
$ vi src/main/resources/application.properties
```

<br/>

```java
spring.jpa.defer-datasource-initialization=true
spring.datasource.url=jdbc:h2:mem:test
spring.jpa.hibernate.ddl-auto=create-drop
spring.datasource.driverClassName=org.h2.Driver
spring.jpa.database-platform=org.hibernate.dialect.H2Dialect
spring.jpa.show-sql=true
```

<br/>

```
$ vi src/main/resources/data.sql
```

<br/>

```java
INSERT INTO beer(name,abv) VALUES('Kozel', 9.0);
INSERT INTO beer(name,abv) VALUES('Carlsberg', 9.0);
INSERT INTO beer(name,abv) VALUES('Heineken', 7.5);
INSERT INTO beer(name,abv) VALUES('Tuborg', 5.0);
INSERT INTO beer(name,abv) VALUES('Bochka', 6.2);
COMMIT;
```

<br/>

```
$ ./mvnw spring-boot:run
```

<br/>

```
$ curl http://localhost:8080/beers

$ curl -X POST -H "Content-Type:application/json" -d '{"name": "Klinskoe", "abv": 7.5}' http://localhost:8080/beers

$ curl http://localhost:8080/beers/
```

<br/>

OK!
