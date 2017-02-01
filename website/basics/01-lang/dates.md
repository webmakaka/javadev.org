---
layout: page
title: Java Basics Language Loops
permalink: /lang/basics/dates/
---

# [Java Basics] Convert Dates


string format YYYY-MM-DD // 2017-12-31



    private java.sql.Date stringToSQLDate(String date){
        java.util.Date dateRes =  stringToDate(date);
        return new java.sql.Date(dateRes.getTime());
    }


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
