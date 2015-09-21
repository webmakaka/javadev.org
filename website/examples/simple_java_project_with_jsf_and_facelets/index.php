<html>

<?php include_once "../../_header.php"?>


<body>

<?php $page=$_GET['page']; ?>

<?php include_once "../../_functions/functions.php"?>
<?php include_once "../../_functions/geshi/geshi.php"?>



<br/><br/>

<div class="link">
	<div align="left"><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>"><?php echo $_SERVER['HTTP_HOST'];?></a><br/></div>
</div>





<div class="link">
	<div align="left">



<strong>Создание очень простого приложения с помощью Elipse Helios и Jboss 6 в Windows:</strong>


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

<strong>index.xhtml</strong>
<br/>
<pre class="cpp" style="font-family:monospace;"><span style="color: #000080;">&lt;</span><span style="color: #000040;">!</span>DOCTYPE html PUBLIC <span style="color: #FF0000;">&quot;-//W3C//DTD XHTML 1.0 Transitional//EN&quot;</span> 
    <span style="color: #FF0000;">&quot;http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd&quot;</span><span style="color: #000080;">&gt;</span>
&nbsp;
<span style="color: #000080;">&lt;</span>html xmlns<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://www.w3.org/1999/xhtml&quot;</span>
	xmlns<span style="color: #008080;">:</span>ui<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://java.sun.com/jsf/facelets&quot;</span>
	xmlns<span style="color: #008080;">:</span>h<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://java.sun.com/jsf/html&quot;</span>
	xmlns<span style="color: #008080;">:</span>f<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://java.sun.com/jsf/core&quot;</span><span style="color: #000080;">&gt;</span>
&nbsp;
<span style="color: #000080;">&lt;</span>ui<span style="color: #008080;">:</span>composition <span style="color: #0000ff;">template</span><span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;/templates/defaultTemplate.xhtml&quot;</span><span style="color: #000080;">&gt;</span>
&nbsp;
&nbsp;
     <span style="color: #000080;">&lt;</span>ui<span style="color: #008080;">:</span>param name<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;title&quot;</span> value<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;PL/SQL&quot;</span><span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
     <span style="color: #000080;">&lt;</span>ui<span style="color: #008080;">:</span>param name<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;keywords&quot;</span> value<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;SQL, PL/SQL, Oracle,  DataBase, Programming, Development, Coding&quot;</span><span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
     <span style="color: #000080;">&lt;</span>ui<span style="color: #008080;">:</span>param name<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;description&quot;</span> value<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;Основы программирования на языке PL/SQL&quot;</span><span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
&nbsp;
     <span style="color: #000080;">&lt;</span>ui<span style="color: #008080;">:</span>define name<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;theme&quot;</span><span style="color: #000080;">&gt;</span>ВВЕДЕНИЕ<span style="color: #008080;">:</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>ui<span style="color: #008080;">:</span>define<span style="color: #000080;">&gt;</span>
     <span style="color: #000080;">&lt;</span>ui<span style="color: #008080;">:</span>define name<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;body&quot;</span><span style="color: #000080;">&gt;</span>
  <span style="color: #000080;">&lt;</span>p<span style="color: #000080;">&gt;</span>   
&nbsp;
     SQL <span style="color: #008000;">&#40;</span>Structured Query Language<span style="color: #008000;">&#41;</span> – язык запросов, с помощью которых можно создавать, считывать, изменять и удалять данные в базах данных.
		<span style="color: #000080;">&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>PL<span style="color: #000040;">/</span>SQL <span style="color: #008000;">&#40;</span>Procedure Language<span style="color: #008000;">&#41;</span> – расширяет стандартный SQL и добавляет возможность работать с переменными, константами, процедурами, функциями, модулями, условными операторами, циклами, обрабатывать исключени и т.д. Язык PL<span style="color: #000040;">/</span>SQL разработан корпорацией Oracle для своих баз данных. Приложения, написанные на этом языке хранятся и выполняются внутри базы данных.
&nbsp;
   <span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>p<span style="color: #000080;">&gt;</span>  
<span style="color: #000080;">&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
 <span style="color: #000080;">&lt;</span>p<span style="color: #000080;">&gt;</span>    
     Начиная с версии Oracle 8i, для реализации логики в базе данных, можно использовать язык Java.
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>p<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
&nbsp;
<span style="color: #000080;">&lt;</span>p<span style="color: #000080;">&gt;</span> 
<span style="color: #000080;">&lt;</span>strong<span style="color: #000080;">&gt;</span>Почему разработчики для баз данных Oracle пользуются языком PL<span style="color: #000040;">/</span>SQL<span style="color: #008080;">:</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>strong<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>p<span style="color: #000080;">&gt;</span> 
&nbsp;
<span style="color: #000080;">&lt;</span>ul<span style="color: #000080;">&gt;</span>
	<span style="color: #000080;">&lt;</span>li<span style="color: #000080;">&gt;</span>Языку PL<span style="color: #000040;">/</span>SQL легко научиться и им легко пользоваться.  Люди со скромным уровнем знаний по программированию могут без особых усилий довольно быстро освоить синтаксис PL<span style="color: #000040;">/</span>SQL и приступить к разработке программ средней сложности.<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>li<span style="color: #000080;">&gt;</span>
	<span style="color: #000080;">&lt;</span>li<span style="color: #000080;">&gt;</span>Код PL<span style="color: #000040;">/</span>SQL хранится в базе данных. Перед использованием код компилируется и хранится в виде понятных для компьютеров инструкций, от чего скорость их выполнения сильно возрастает.<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>li<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>ul<span style="color: #000080;">&gt;</span>
&nbsp;
 <span style="color: #000080;">&lt;</span>p<span style="color: #000080;">&gt;</span> 
<span style="color: #000080;">&lt;</span>strong<span style="color: #000080;">&gt;</span>Фрагмен видеозаписи лекции Мирончика Игоря, прочитанный в обучающем центре <span style="color: #FF0000;">&quot;Микротест&quot;</span> в <span style="color: #0000dd;">2010</span> году. На видео рассказывается о командах языка запросов SQL, применительно к технологиям работы с базами данных Oracle.<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>strong<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>p<span style="color: #000080;">&gt;</span> 
&nbsp;
<span style="color: #000080;">&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #0000dd;">div</span> align<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;center&quot;</span><span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>iframe title<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;YouTube video player&quot;</span> width<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;480&quot;</span> height<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;390&quot;</span> src<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://www.youtube.com/embed/ozIldJZQgqE&quot;</span> frameborder<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;0&quot;</span><span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>iframe<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span><span style="color: #0000dd;">div</span><span style="color: #000080;">&gt;</span>
&nbsp;
<span style="color: #000080;">&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>p<span style="color: #000080;">&gt;</span> 
Перед изучением языка, следует посмотреть данный фрагмен <span style="color: #008000;">&#40;</span>а если понравится, то бесплатно скачать весь курс<span style="color: #008000;">&#41;</span>, а после уже браться за книги с целью получения каких<span style="color: #000040;">-</span>то конкретных данных.
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>p<span style="color: #000080;">&gt;</span> 
<span style="color: #000080;">&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
&nbsp;
<span style="color: #000080;">&lt;</span>p<span style="color: #000080;">&gt;</span> 
<span style="color: #000080;">&lt;</span>strong<span style="color: #000080;">&gt;</span>Мирончик Игорь<span style="color: #008080;">:</span> Обзор технологий разработки Oracle 11g PL<span style="color: #000040;">/</span>SQL<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>strong<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>p<span style="color: #000080;">&gt;</span> 
&nbsp;
<span style="color: #000080;">&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
&nbsp;
<span style="color: #000080;">&lt;</span><span style="color: #0000dd;">div</span> align<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;center&quot;</span><span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>iframe title<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;YouTube video player&quot;</span> width<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;480&quot;</span> height<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;390&quot;</span> src<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://www.youtube.com/embed/n64MHMVJWc0&quot;</span> frameborder<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;0&quot;</span> <span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>iframe<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span><span style="color: #0000dd;">div</span><span style="color: #000080;">&gt;</span>
&nbsp;
<span style="color: #000080;">&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
&nbsp;
<span style="color: #000080;">&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>p<span style="color: #000080;">&gt;</span> 
     <span style="color: #000080;">&lt;</span>strong<span style="color: #000080;">&gt;</span>Темы<span style="color: #008080;">:</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>strong<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>p<span style="color: #000080;">&gt;</span> 
	<span style="color: #000080;">&lt;</span>ul<span style="color: #000080;">&gt;</span>
		<span style="color: #000080;">&lt;</span>li<span style="color: #000080;">&gt;&lt;</span>a href<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;beginning.xhtml&quot;</span><span style="color: #000080;">&gt;</span>Что необходимо для изучения языка программирования PL<span style="color: #000040;">/</span>SQL<span style="color: #008080;">?</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>a<span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>li<span style="color: #000080;">&gt;</span>
		<span style="color: #000080;">&lt;</span>li<span style="color: #000080;">&gt;&lt;</span>a href<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;IDE_for_plsql_development.xhtml&quot;</span><span style="color: #000080;">&gt;</span>Среды программирова��ия для языка PL<span style="color: #000040;">/</span>SQL<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>a<span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>li<span style="color: #000080;">&gt;</span>
		<span style="color: #000080;">&lt;</span>li<span style="color: #000080;">&gt;&lt;</span>a href<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;scott_tiger.xhtml&quot;</span><span style="color: #000080;">&gt;</span>Демонстрационные Схемы<span style="color: #008080;">:</span> SCOTT<span style="color: #000040;">/</span>TIGER и HR<span style="color: #000040;">/</span>HR<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>a<span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>li<span style="color: #000080;">&gt;</span>
		<span style="color: #000080;">&lt;</span>li<span style="color: #000080;">&gt;&lt;</span>a href<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;Installation_Oracle_DataBase_on_Windows.xhtml&quot;</span><span style="color: #000080;">&gt;</span>Устанавливаем сервер баз данных Oracle 11G R2 в Windows<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>a<span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>li<span style="color: #000080;">&gt;</span>
		<span style="color: #000080;">&lt;</span>li<span style="color: #000080;">&gt;&lt;</span>a href<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;plsql_basics.xhtml&quot;</span><span style="color: #000080;">&gt;</span>Основы языка PL<span style="color: #000040;">/</span>SQL<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>a<span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>li<span style="color: #000080;">&gt;</span>
		<span style="color: #000080;">&lt;</span>li<span style="color: #000080;">&gt;&lt;</span>a href<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;hello_world.xhtml&quot;</span><span style="color: #000080;">&gt;</span>Простейшая программа на PL<span style="color: #000040;">/</span>SQL<span style="color: #008080;">:</span> <span style="color: #FF0000;">&quot;Hello World&quot;</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>a<span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>li<span style="color: #000080;">&gt;</span>
		<span style="color: #000080;">&lt;</span>li<span style="color: #000080;">&gt;&lt;</span>a href<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;IF_Statemet.xhtml&quot;</span><span style="color: #000080;">&gt;</span><span style="color: #0000ff;">if</span>, if<span style="color: #000040;">-</span>then<span style="color: #000040;">-</span><span style="color: #0000ff;">else</span>, if<span style="color: #000040;">-</span>then<span style="color: #000040;">-</span>elsif<span style="color: #000040;">-</span>then<span style="color: #000040;">-</span><span style="color: #0000ff;">else</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>a<span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>li<span style="color: #000080;">&gt;</span>
	<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>ul<span style="color: #000080;">&gt;</span>
&nbsp;
<span style="color: #000080;">&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
&nbsp;
 <span style="color: #000080;">&lt;</span>p<span style="color: #000080;">&gt;</span>     <span style="color: #000080;">&lt;</span>strong<span style="color: #000080;">&gt;</span>Ссылки<span style="color: #008080;">:</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>strong<span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>p<span style="color: #000080;">&gt;</span> 
&nbsp;
<span style="color: #000080;">&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
&nbsp;
&nbsp;
	<span style="color: #000080;">&lt;</span>ul<span style="color: #000080;">&gt;</span>
		<span style="color: #000080;">&lt;</span>li<span style="color: #000080;">&gt;&lt;</span>a href<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://download.oracle.com/docs/cd/E11882_01/server.112/e17118/title.htm&quot;</span><span style="color: #000080;">&gt;</span>Oracle® Database SQL Language Reference 11g Release <span style="color: #0000dd;">2</span> <span style="color: #008000;">&#40;</span><span style="color:#800080;">11.2</span><span style="color: #008000;">&#41;</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>a<span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>li<span style="color: #000080;">&gt;</span>
		<span style="color: #000080;">&lt;</span>li<span style="color: #000080;">&gt;&lt;</span>a href<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://download.oracle.com/docs/cd/E11882_01/appdev.112/e17126/toc.htm&quot;</span><span style="color: #000080;">&gt;</span>Oracle® Database PL<span style="color: #000040;">/</span>SQL Language Reference 11g Release <span style="color: #0000dd;">2</span> <span style="color: #008000;">&#40;</span><span style="color:#800080;">11.2</span><span style="color: #008000;">&#41;</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>a<span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>li<span style="color: #000080;">&gt;</span>
&nbsp;
	<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>ul<span style="color: #000080;">&gt;</span>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<span style="color: #000080;">&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;&lt;</span>br<span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
&nbsp;
     <span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>ui<span style="color: #008080;">:</span>define<span style="color: #000080;">&gt;</span>
&nbsp;
&nbsp;
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>ui<span style="color: #008080;">:</span>composition<span style="color: #000080;">&gt;</span>
&nbsp;
&nbsp;
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>html<span style="color: #000080;">&gt;</span></pre>

<br/>
<br/>

<hr>

<br/>
<br/>

<strong>default.css</strong>
<br/>

<pre class="cpp" style="font-family:monospace;">@CHARSET <span style="color: #FF0000;">&quot;UTF-8&quot;</span><span style="color: #008080;">;</span>
body <span style="color: #008000;">&#123;</span>
	width <span style="color: #008080;">:</span> 1024px<span style="color: #008080;">;</span>
	margin <span style="color: #008080;">:</span> 20px <span style="color: #0000ff;">auto</span><span style="color: #008080;">;</span>
	padding <span style="color: #008080;">:</span> 20px<span style="color: #008080;">;</span>
	border <span style="color: #008080;">:</span> 1px solid black<span style="color: #008080;">;</span>
<span style="color: #008000;">&#125;</span>
a<span style="color: #008080;">:</span>link <span style="color: #008000;">&#123;</span>
	color <span style="color: #008080;">:</span> <span style="color: #339900;">#336699;</span>
<span style="color: #008000;">&#125;</span>
a<span style="color: #008080;">:</span>visited <span style="color: #008000;">&#123;</span>
	color <span style="color: #008080;">:</span> <span style="color: #339900;">#336699;</span>
<span style="color: #008000;">&#125;</span>
a<span style="color: #008080;">:</span>hover <span style="color: #008000;">&#123;</span>
	color <span style="color: #008080;">:</span> <span style="color: #339900;">#336699;</span>
<span style="color: #008000;">&#125;</span>
a<span style="color: #008080;">:</span>active <span style="color: #008000;">&#123;</span>
	color <span style="color: #008080;">:</span> <span style="color: #339900;">#336699;</span>
<span style="color: #008000;">&#125;</span>
&nbsp;</pre>
<br/>
<br/>

<hr>

<br/>
<br/>

<strong>defaultTemplate.xhtml</strong>
<br/>
<pre class="cpp" style="font-family:monospace;"><span style="color: #000080;">&lt;</span><span style="color: #000040;">!</span>DOCTYPE html PUBLIC <span style="color: #FF0000;">&quot;-//W3C//DTD XHTML 1.0 Transitional//EN&quot;</span> 
          <span style="color: #FF0000;">&quot;http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd&quot;</span><span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>html xmlns<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://www.w3.org/1999/xhtml&quot;</span>
      xmlns<span style="color: #008080;">:</span>ui<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://java.sun.com/jsf/facelets&quot;</span><span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>head<span style="color: #000080;">&gt;</span>
  <span style="color: #000080;">&lt;</span>title<span style="color: #000080;">&gt;&lt;</span>ui<span style="color: #008080;">:</span>insert name<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;title&quot;</span><span style="color: #000080;">&gt;</span><span style="color: #339900;">#{title}&lt;/ui:insert&gt;&lt;/title&gt;</span>
  <span style="color: #000080;">&lt;</span>meta http<span style="color: #000040;">-</span>equiv<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;Content-type&quot;</span> content<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;text/html;charset=UTF-8&quot;</span> <span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
  <span style="color: #000080;">&lt;</span>meta name<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;keywords&quot;</span> content<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;#{keywords}&quot;</span> <span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
  <span style="color: #000080;">&lt;</span>meta name<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;description&quot;</span> content<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;#{description}&quot;</span> <span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
&nbsp;
	<span style="color: #000080;">&lt;</span>link rel<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;stylesheet&quot;</span> href<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;default.css&quot;</span> type<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;text/css&quot;</span><span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>link<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>head<span style="color: #000080;">&gt;</span>
&nbsp;
&nbsp;
&nbsp;
<span style="color: #000080;">&lt;</span>body<span style="color: #000080;">&gt;</span>
&nbsp;
&nbsp;
&nbsp;
<span style="color: #000080;">&lt;</span><span style="color: #0000dd;">div</span> id<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;header&quot;</span><span style="color: #000080;">&gt;</span>
&nbsp;
    <span style="color: #000080;">&lt;</span>strong<span style="color: #000080;">&gt;</span>Developers<span style="color: #008080;">:</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>strong<span style="color: #000080;">&gt;</span> Marley
	<span style="color: #000080;">&lt;</span><span style="color: #0000dd;">div</span> style<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;width:100%;font-size:36px;line-height:48px;background-color:navy;color:white&quot;</span><span style="color: #000080;">&gt;</span><span style="color: #000040;">&amp;</span>nbsp<span style="color: #008080;">;</span><span style="color: #000040;">&amp;</span>nbsp<span style="color: #008080;">;</span>PL<span style="color: #000040;">/</span>SQL<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span><span style="color: #0000dd;">div</span><span style="color: #000080;">&gt;</span>
&nbsp;
&nbsp;
    <span style="color: #000080;">&lt;</span>h1<span style="color: #000080;">&gt;&lt;</span>ui<span style="color: #008080;">:</span>insert name<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;theme&quot;</span><span style="color: #000040;">/</span><span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>h1<span style="color: #000080;">&gt;</span>
    <span style="color: #000080;">&lt;</span>ui<span style="color: #008080;">:</span>insert name<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;body&quot;</span><span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
&nbsp;
&nbsp;
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span><span style="color: #0000dd;">div</span><span style="color: #000080;">&gt;</span>
&nbsp;
&nbsp;
&nbsp;
&nbsp;
<span style="color: #000080;">&lt;</span><span style="color: #0000dd;">div</span> id<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;footer&quot;</span><span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #0000dd;">div</span> align<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;center&quot;</span><span style="color: #000080;">&gt;&lt;</span>p<span style="color: #000080;">&gt;&lt;</span>a href<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://formspring.me/plsql&quot;</span><span style="color: #000080;">&gt;</span>Задать вопрос, дополнить<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>a<span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>p<span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span><span style="color: #0000dd;">div</span><span style="color: #000080;">&gt;</span>
&nbsp;
<span style="color: #000080;">&lt;</span><span style="color: #0000dd;">div</span> align<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;right&quot;</span><span style="color: #000080;">&gt;</span> 
&nbsp;
&nbsp;
<span style="color: #000080;">&lt;</span>table<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>tr<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>td<span style="color: #000080;">&gt;</span>
&nbsp;
<span style="color: #000080;">&lt;</span>p<span style="color: #000080;">&gt;</span>
    <span style="color: #000080;">&lt;</span>a href<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://validator.w3.org/check?uri=referer&quot;</span><span style="color: #000080;">&gt;&lt;</span>img
      src<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://www.w3.org/Icons/valid-xhtml10&quot;</span> alt<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;Valid XHTML 1.0 Transitional&quot;</span> height<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;31&quot;</span> width<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;88&quot;</span> border<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;0&quot;</span> <span style="color: #000040;">/</span><span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>a<span style="color: #000080;">&gt;</span>
  <span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>p<span style="color: #000080;">&gt;</span>
&nbsp;
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>td<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>td<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>p<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>a href<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://jigsaw.w3.org/css-validator/check/referer&quot;</span><span style="color: #000080;">&gt;</span>
    <span style="color: #000080;">&lt;</span>img style<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;border:0;width:88px;height:31px&quot;</span>
        src<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://jigsaw.w3.org/css-validator/images/vcss-blue&quot;</span>
        alt<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;Valid CSS!&quot;</span> <span style="color: #000040;">/</span><span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>a<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>p<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>td<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>tr<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>table<span style="color: #000080;">&gt;</span> 
&nbsp;
&nbsp;
&nbsp;
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span><span style="color: #0000dd;">div</span><span style="color: #000080;">&gt;</span>
&nbsp;
<span style="color: #000080;">&lt;</span><span style="color: #0000dd;">div</span> align<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;right&quot;</span> style<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;background-color:navy;width:100%;color:white&quot;</span><span style="color: #000080;">&gt;</span>Разработка и обсуждение проекта ведется на<span style="color: #008080;">:</span> <span style="color: #000080;">&lt;</span>strong<span style="color: #000080;">&gt;&lt;</span>a href<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://projects.plsql.ru&quot;</span><span style="color: #000080;">&gt;</span>projects.<span style="color: #007788;">plsql</span>.<span style="color: #007788;">ru</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>a<span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span>strong<span style="color: #000080;">&gt;&lt;</span><span style="color: #000040;">/</span><span style="color: #0000dd;">div</span><span style="color: #000080;">&gt;</span>
&nbsp;
&nbsp;
&nbsp;
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span><span style="color: #0000dd;">div</span><span style="color: #000080;">&gt;</span>
&nbsp;
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>body<span style="color: #000080;">&gt;</span>
&nbsp;
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>html<span style="color: #000080;">&gt;</span></pre>

<br/>
<br/>

<hr>

<br/>
<br/>

<strong>web.xml</strong>
<br/>
<pre class="cpp" style="font-family:monospace;"><span style="color: #000080;">&lt;</span><span style="color: #008080;">?</span>xml version<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;1.0&quot;</span> encoding<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;UTF-8&quot;</span><span style="color: #008080;">?</span><span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span>web<span style="color: #000040;">-</span>app xmlns<span style="color: #008080;">:</span>xsi<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://www.w3.org/2001/XMLSchema-instance&quot;</span> xmlns<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://java.sun.com/xml/ns/javaee&quot;</span> xmlns<span style="color: #008080;">:</span>web<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://java.sun.com/xml/ns/javaee/web-app_2_5.xsd&quot;</span> xsi<span style="color: #008080;">:</span>schemaLocation<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;http://java.sun.com/xml/ns/javaee http://java.sun.com/xml/ns/javaee/web-app_3_0.xsd&quot;</span> id<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;WebApp_ID&quot;</span> version<span style="color: #000080;">=</span><span style="color: #FF0000;">&quot;3.0&quot;</span><span style="color: #000080;">&gt;</span>
  <span style="color: #000080;">&lt;</span>display<span style="color: #000040;">-</span>name<span style="color: #000080;">&gt;</span>plsql<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>display<span style="color: #000040;">-</span>name<span style="color: #000080;">&gt;</span>
  <span style="color: #000080;">&lt;</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000040;">-</span>list<span style="color: #000080;">&gt;</span>
    <span style="color: #000080;">&lt;</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000080;">&gt;</span>index.<span style="color: #007788;">xhtml</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000080;">&gt;</span>
    <span style="color: #000080;">&lt;</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000080;">&gt;</span>index.<span style="color: #007788;">html</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000080;">&gt;</span>
    <span style="color: #000080;">&lt;</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000080;">&gt;</span>index.<span style="color: #007788;">htm</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000080;">&gt;</span>
    <span style="color: #000080;">&lt;</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000080;">&gt;</span>index.<span style="color: #007788;">jsp</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000080;">&gt;</span>
    <span style="color: #000080;">&lt;</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000080;">&gt;</span><span style="color: #0000ff;">default</span>.<span style="color: #007788;">html</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000080;">&gt;</span>
    <span style="color: #000080;">&lt;</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000080;">&gt;</span><span style="color: #0000ff;">default</span>.<span style="color: #007788;">htm</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000080;">&gt;</span>
    <span style="color: #000080;">&lt;</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000080;">&gt;</span><span style="color: #0000ff;">default</span>.<span style="color: #007788;">jsp</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000080;">&gt;</span>
  <span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>welcome<span style="color: #000040;">-</span>file<span style="color: #000040;">-</span>list<span style="color: #000080;">&gt;</span>
  <span style="color: #000080;">&lt;</span>servlet<span style="color: #000080;">&gt;</span>
    <span style="color: #000080;">&lt;</span>servlet<span style="color: #000040;">-</span>name<span style="color: #000080;">&gt;</span>Faces Servlet<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>servlet<span style="color: #000040;">-</span>name<span style="color: #000080;">&gt;</span>
    <span style="color: #000080;">&lt;</span>servlet<span style="color: #000040;">-</span><span style="color: #0000ff;">class</span><span style="color: #000080;">&gt;</span>javax.<span style="color: #007788;">faces</span>.<span style="color: #007788;">webapp</span>.<span style="color: #007788;">FacesServlet</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>servlet<span style="color: #000040;">-</span><span style="color: #0000ff;">class</span><span style="color: #000080;">&gt;</span>
    <span style="color: #000080;">&lt;</span>load<span style="color: #000040;">-</span>on<span style="color: #000040;">-</span>startup<span style="color: #000080;">&gt;</span><span style="color: #0000dd;">1</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>load<span style="color: #000040;">-</span>on<span style="color: #000040;">-</span>startup<span style="color: #000080;">&gt;</span>
  <span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>servlet<span style="color: #000080;">&gt;</span>
  <span style="color: #000080;">&lt;</span>servlet<span style="color: #000040;">-</span>mapping<span style="color: #000080;">&gt;</span>
    <span style="color: #000080;">&lt;</span>servlet<span style="color: #000040;">-</span>name<span style="color: #000080;">&gt;</span>Faces Servlet<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>servlet<span style="color: #000040;">-</span>name<span style="color: #000080;">&gt;</span>
    <span style="color: #000080;">&lt;</span>url<span style="color: #000040;">-</span>pattern<span style="color: #000080;">&gt;</span><span style="color: #000040;">*</span>.<span style="color: #007788;">xhtml</span><span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>url<span style="color: #000040;">-</span>pattern<span style="color: #000080;">&gt;</span>
  <span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>servlet<span style="color: #000040;">-</span>mapping<span style="color: #000080;">&gt;</span>
<span style="color: #000080;">&lt;</span><span style="color: #000040;">/</span>web<span style="color: #000040;">-</span>app<span style="color: #000080;">&gt;</span></pre>


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

		</div>
	</div>






<?php include_once "../../_footer.php"?>

</body>

</html>
