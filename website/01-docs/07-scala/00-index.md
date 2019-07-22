---
layout: page
title: Scala basics
permalink: /scala/
---

# Scala basics

<br/>

### For Loops

```scala

for (item <- List(1,2,3)) {
    println(item)
}

```

<br/>

```scala

val names = List("John", "Abe", "Cindy", "Cat")

for (name <- names)) {
    println(name)
}

```

<br/>


```scala

for (item <- Array.range(0,5)) {
    println(item)
}

```

<br/>


```scala

for (item <- Set(1,2,3)) {
    println(item)
}

```


<br/>


```scala

for (item <- Range(0,10)) {
    println(item)
}

```

<br/>

### While Loops

```scala

var x = 0

while(x < 5) {
  println(s"x is currently $x")
  println("x is still less than 5, adding 1 to x")
  x = x+1
}

```


<br/>


```scala

import util.control.Breaks._

var y = 0

while(y < 10) {
  println(s"y is currently $y")
  println("y is still less than 10, adding 1 to y")
  y = y+1

  if(y==3) break
}

```

<br/>

### Functions

```scala

def simple(): Unit = {
  println("Simple Print")
}

simple()

```

<br/>

```scala

def adder(num1:Int, num2:Int): Int = {
  return num1 + num2
}

adder(4,5)

```

<br/>

```scala

def greetName(name:String): String = {
  return s"Hello $name"
}

val fullgreet = greetName("Jose")
println(fullgreet)

```


<br/>

```scala

def isPrime(numcheck:Int): Boolean = {
  for(n <- Range(2,numcheck)) {
    if (numcheck%n == 0) {
      return false
    }
  }
  return true
}

println(isPrime(10))
println(isPrime(23))

```


<br/>

```scala

val numbers = List(1,2,3,7)

def check(nums:List[Int]): List[Int] = {
  return nums
}

println(check(numbers))

```