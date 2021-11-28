---
layout: page
title: Java Basics Convert Dates
description: Java Basics Convert Dates
keywords: Java Basics Convert Dates
permalink: /lang/basics/dates/
---

# [Java Basics] Convert Dates

<br/>

string format YYYY-MM-DD // 2017-12-31

<br/>

```java
private java.sql.Date stringToSQLDate(String date){
    java.util.Date dateRes =  stringToDate(date);
    return new java.sql.Date(dateRes.getTime());
}
```

<br/>

```java
private java.util.Date stringToDate(String date){

    String YYYY = date.substring(0, 4).toString();
    String MM = date.substring(5, 7).toString();
    String DD = date.substring(8, 10).toString();

    Calendar cl = Calendar.getInstance();

    cl.set(Calendar.YEAR, Integer.parseInt(YYYY));
    cl.set(Calendar.MONTH, Integer.parseInt(MM) -1);
    cl.set(Calendar.DATE, Integer.parseInt(DD));

    java.util.Date dateRes =  cl.getTime();

    return dateRes;
}
```

<br/>
<hr/>
<br/>

```java
public static java.sql.Date UtilDateToSqlDate(java.util.Date date) {
    java.sql.Date result = new java.sql.Date(date.getTime());
    return result;
}
```
