---
layout: page
title: Sonatype Nexus Run Nexus in Docker container
description: Sonatype Nexus Run Nexus in Docker container
keywords: Sonatype Nexus Run Nexus in Docker container
permalink: /devtools/repository-management/nexus/docker/
---

# Run Nexus in Docker container

<br/>

**Hadn't Worked for me for python packages, but ok with standard installation outside docker**

<br/>

https://hub.docker.com/r/sonatype/nexus3/

```
$ docker run -d -p 8081:8081 --name nexus sonatype/nexus3
```

<br/>

It can take some time (2-3 minutes) for the service to launch in a new container

<br/>

http://localhost:8081/

<br/>

```
$ docker exec -it 677963ed5f84 sh
$ cat nexus-data/admin.password
```

<br/>

```
login: admin
```
