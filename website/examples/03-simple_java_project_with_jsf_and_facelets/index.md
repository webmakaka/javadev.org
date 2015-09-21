---
layout: page
title: Simple java project with jsf and facelets
permalink: /examples/simple_java_project_with_jsf_and_facelets/
---


<strong>Simple java project with jsf and facelets:</strong>


<br/><br/>

<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_01.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_02.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_03.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_04.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_05.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_06.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_07.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_08.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_09.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>

<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_10.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_11.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_12.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_13.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_14.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_15.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_16.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_17.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>



<br/>
<br/>

<hr>

<br/>
<br/>

index.xhtml

<br/>
<br/>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

    <html xmlns="http://www.w3.org/1999/xhtml"
    	xmlns:ui="http://java.sun.com/jsf/facelets"
    	xmlns:h="http://java.sun.com/jsf/html"
    	xmlns:f="http://java.sun.com/jsf/core">

    <ui:composition template="/templates/defaultTemplate.xhtml">
         <ui:param name="title" value="PL/SQL"/>
         <ui:param name="keywords" value="SQL, PL/SQL, Oracle,  DataBase, Programming, Development, Coding"/>
         <ui:param name="description" value="Основы программирования на языке PL/SQL"/>

         <ui:define name="theme">ВВЕДЕНИЕ:</ui:define>
         <ui:define name="body">
      <p>
         SQL (Structured Query Language) – язык запросов, с помощью которых можно создавать, считывать, изменять и удалять данные в базах данных.
    		<br/><br/>PL/SQL (Procedure Language) – расширяет стандартный SQL и добавляет возможность работать с переменными, константами, процедурами, функциями, модулями, условными операторами, циклами, обрабатывать исключени и т.д. Язык PL/SQL разработан корпорацией Oracle для своих баз данных. Приложения, написанные на этом языке хранятся и выполняются внутри базы данных.

       </p>  
    <br/>
     <p>
         Начиная с версии Oracle 8i, для реализации логики в базе данных, можно использовать язык Java.
    </p>
    <br/>

    <p>
    <strong>Почему разработчики для баз данных Oracle пользуются языком PL/SQL:</strong>
    </p>

    <ul>
    	<li>Языку PL/SQL легко научиться и им легко пользоваться.  Люди со скромным уровнем знаний по программированию могут без особых усилий довольно быстро освоить синтаксис PL/SQL и приступить к разработке программ средней сложности.</li>
    	<li>Код PL/SQL хранится в базе данных. Перед использованием код компилируется и хранится в виде понятных для компьютеров инструкций, от чего скорость их выполнения сильно возрастает.</li>
    </ul>

     <p>
    <strong>Фрагмен видеозаписи лекции Мирончика Игоря, прочитанный в обучающем центре "Микротест" в 2010 году. На видео рассказывается о командах языка запросов SQL, применительно к технологиям работы с базами данных Oracle.</strong>
    </p>

    <br/><br/>
    <div align="center">
    <iframe title="YouTube video player" width="480" height="390" src="http://www.youtube.com/embed/ozIldJZQgqE" frameborder="0"></iframe>
    </div>

    <br/><br/>
    <p>
    Перед изучением языка, следует посмотреть данный фрагмен (а если понравится, то бесплатно скачать весь курс), а после уже браться за книги с целью получения каких-то конкретных данных.
    </p>
    <br/><br/>
    <br/><br/>

    <p>
    <strong>Мирончик Игорь: Обзор технологий разработки Oracle 11g PL/SQL</strong>
    </p>

    <br/><br/>

    <div align="center">
    <iframe title="YouTube video player" width="480" height="390" src="http://www.youtube.com/embed/n64MHMVJWc0" frameborder="0" ></iframe>
    </div>

    <br/>
    <br/>

    <br/><br/>
    <br/><br/>
    <p>
         <strong>Темы:</strong>
    </p>
    	<ul>
    		<li><a href="beginning.xhtml">Что необходимо для изучения языка программирования PL/SQL?</a></li>
    		<li><a href="IDE_for_plsql_development.xhtml">Среды программирова��ия для языка PL/SQL</a></li>
    		<li><a href="scott_tiger.xhtml">Демонстрационные Схемы: SCOTT/TIGER и HR/HR</a></li>
    		<li><a href="Installation_Oracle_DataBase_on_Windows.xhtml">Устанавливаем сервер баз данных Oracle 11G R2 в Windows</a></li>
    		<li><a href="plsql_basics.xhtml">Основы языка PL/SQL</a></li>
    		<li><a href="hello_world.xhtml">Простейшая программа на PL/SQL: "Hello World"</a></li>
    		<li><a href="IF_Statemet.xhtml">if, if-then-else, if-then-elsif-then-else</a></li>
    	</ul>

    <br/><br/>

     <p><strong>Ссылки:</strong></p>

    <br/><br/>

    	<ul>
    		<li><a href="http://download.oracle.com/docs/cd/E11882_01/server.112/e17118/title.htm">Oracle® Database SQL Language Reference 11g Release 2 (11.2)</a></li>
    		<li><a href="http://download.oracle.com/docs/cd/E11882_01/appdev.112/e17126/toc.htm">Oracle® Database PL/SQL Language Reference 11g Release 2 (11.2)</a></li>

    	</ul>

    <br/><br/>

         </ui:define>


    </ui:composition>

    </html>


<br/><br/>

default.css

<br/><br/>

    @CHARSET "UTF-8";
    body {
    	width : 1024px;
    	margin : 20px auto;
    	padding : 20px;
    	border : 1px solid black;
    }
    a:link {
    	color : #336699;
    }
    a:visited {
    	color : #336699;
    }
    a:hover {
    	color : #336699;
    }
    a:active {
    	color : #336699;
    }


<br/><br/>

defaultTemplate.xhtml

<br/><br/>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
              "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml"
          xmlns:ui="http://java.sun.com/jsf/facelets">
    <head>
      <title><ui:insert name="title">#{title}</ui:insert></title>
      <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
      <meta name="keywords" content="#{keywords}" />
      <meta name="description" content="#{description}" />

    	<link rel="stylesheet" href="default.css" type="text/css"></link>
    </head>



    <body>



    <div id="header">

        <strong>Developers:</strong> Marley
    	<div style="width:100%;font-size:36px;line-height:48px;background-color:navy;color:white">&nbsp;&nbsp;PL/SQL</div>


        <h1><ui:insert name="theme"/></h1>
        <ui:insert name="body"/>


    </div>




    <div id="footer">
    <div align="center"><p><a href="http://formspring.me/plsql">Задать вопрос, дополнить</a></p></div>

    <div align="right">


    <table>
    <tr>
    <td>

    <p>
        <a href="http://validator.w3.org/check?uri=referer"><img
          src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" border="0" /></a>
      </p>

    </td>
    <td>
    <p>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
            alt="Valid CSS!" />
    </a>
    </p>
    </td>
    </tr>
    </table>



    </div>

    <div align="right" style="background-color:navy;width:100%;color:white">Разработка и обсуждение проекта ведется на: <strong><a href="http://projects.plsql.ru">projects.plsql.ru</a></strong></div>



    </div>

    </body>

    </html>


<br/><br/>

web.xml

<br/><br/>

    <?xml version="1.0" encoding="UTF-8"?>
    <web-app xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://java.sun.com/xml/ns/javaee" xmlns:web="http://java.sun.com/xml/ns/javaee/web-app_2_5.xsd" xsi:schemaLocation="http://java.sun.com/xml/ns/javaee http://java.sun.com/xml/ns/javaee/web-app_3_0.xsd" id="WebApp_ID" version="3.0">
      <display-name>plsql</display-name>
      <welcome-file-list>
        <welcome-file>index.xhtml</welcome-file>
        <welcome-file>index.html</welcome-file>
        <welcome-file>index.htm</welcome-file>
        <welcome-file>index.jsp</welcome-file>
        <welcome-file>default.html</welcome-file>
        <welcome-file>default.htm</welcome-file>
        <welcome-file>default.jsp</welcome-file>
      </welcome-file-list>
      <servlet>
        <servlet-name>Faces Servlet</servlet-name>
        <servlet-class>javax.faces.webapp.FacesServlet</servlet-class>
        <load-on-startup>1</load-on-startup>
      </servlet>
      <servlet-mapping>
        <servlet-name>Faces Servlet</servlet-name>
        <url-pattern>*.xhtml</url-pattern>
      </servlet-mapping>
    </web-app>


<br/>
<br/>

<hr>

<br/>
<br/>



<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_18.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_19.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>

<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_20.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_21.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_22.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
<img src="http://prev.javadev.ru/pictures/simple_java_project_with_jsf_and_facelets/simple_java_project_with_jsf_and_facelets_23.png" border="0" alt="Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows"><br/><br/>
