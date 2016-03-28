# [javadev.org](http://javadev.org) source codes

To run javadev.org on your local server, you can do next:

**Install Docker**

Then

    docker pull marley/centos6-for-dev
    docker run -i -t –rm -p 80:8080 –-name javadev-org marley/centos6-for-dev /bin/bash
    

    source ~/.bash_profile
    cd /projects
    git clone --depth=1 https://github.com/javadev-org/javadev.org
    cd javadev.org
    gem install jekyll 
    jekyll serve --watch --host 0.0.0.0 --port 8080

and connect to localhost.
