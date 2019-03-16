---
layout: page
title: Sonatype Nexus Run Nexus in Docker container
permalink: /devtools/repository-management/nexus/docker/
---

### Run Nexus in Docker container:


    $ docker run -d -p 8081:8081 --name nexus sonatype/nexus3


It can take some time (2-3 minutes) for the service to launch in a new container


http://localhost:8081/

https://hub.docker.com/r/sonatype/nexus3/
