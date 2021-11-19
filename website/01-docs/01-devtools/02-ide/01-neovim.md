---
layout: page
title: NeoVim
description: NeoVim
keywords: java, devtools, neovim
permalink: /devtools/ide/neovim/
---

# NeoVim

<br/>

### Spring Boot Development Using Command Line Only

https://www.youtube.com/watch?v=zmnlpf4FtkE

https://www.developersoapbox.com/command-line-only-spring-boot-development-using-vim/

https://www.developersoapbox.com/creating-a-rest-api-effortlessly-with-spring-rest-repositories/

<br/>

```
$ sudo apt install vim tmux curl unzip openjdk-11-jdk
```

<br/>

```
$ mkdir -p ~/projects/dev/java && cd ~/projects/dev/java
$ curl https://start.spring.io/starter.zip -d dependencies=h2,data-jpa,data-rest -d javaVersion=11 -o demo.zip

$ unzip demo.zip
```

<br/>

```
$ vim ~/.vimrc
```

<br/>

```
set ts=4 sw=4
set path+=**
set wildmenu
```

```
$ ./mvnw spring-boot:run
```

<br/>

```
$ curl http://localhost:8080/beers

$ curl -X POST -H "Content-Type:application/json" -d '{"name": "Jai Alai", "abv": 7.5}' http://localhost:8080/beers

$ curl http://localhost:8080/beers/1
```

<br/>

### Setting up Neovim for Java Development

<br/>

https://www.youtube.com/watch?v=8q_VPqA-KLs&t=158s

https://www.chrisatmachine.com/Neovim/24-neovim-and-java/
