# [javadev.org](http://javadev.org) source codes

[![Build Status](https://travis-ci.org/javadev-org/javadev.org.svg?branch=gh-pages)](https://travis-ci.org/javadev-org/javadev.org)


To run javadev.org on your local server, you can do next:

**Install Docker**

Then

    $ docker pull marley/centos6-for-jekyll:latest
    $ docker run -i -t -p 80:8080 --name oracle_adf_ru marley/centos6-for-jekyll:latest /bin/bash

In container:

    $ source ~/.bash_profile
    $ cd /projects
    $ git clone --depth=1 https://bitbucket.org/javadev-org/javadev.org.git .
    $ bundle
    $ JEKYLL_ENV=production bundle exec jekyll serve --host 0.0.0.0 --port 8080

and connect to localhost.
