---
layout: page
title: Java Basics Language Loops
description: Java Basics Language Loops
keywords: Java Basics Language Loops
permalink: /lang/basics/loops/
---

# [Java Basics] [Language] Loops

    package my;

    import java.util.*;

    public class Sample {
        public static void main(String[] args){
            List<Integer> numbers = Arrays.asList(1,2,3,4,5);

            // Example 1

            for(int e : numbers){
                System.out.println(e);
            }


            // Example 2

            for(int i=0; i < numbers.size(); i++){
                System.out.println(numbers.get(i));
            }

            // Example 3

            numbers.forEach(
            	(Integer value) -> System.out.println(value));

            // Example 4

            numbers.forEach(value -> System.out.println(value));

            // Example 5

            numbers.forEach(System.out::println);

        }

    } // The End of Class;
