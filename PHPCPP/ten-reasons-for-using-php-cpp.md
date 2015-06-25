# Ten reasons for using PHP-CPP

There are many reasons for using PHP-CPP. Let's name a few.

#### 1\. It's fast

Code written in C++ is fast - much faster than code written in PHP. When you start using C++, you bring down your CPU and memory load, and your web pages instantly become more responsive. You can bring down the hardware costs, because you simply need less servers to handle the same number of page views.

#### 2\. It is shockingly simple

C and C++ have a reputation of being difficult and complex. But just take a look at the examples in our documentation and surprise yourself. The simple reality is that algorithms written in C++ look almost identical to algorithms written in PHP. If you know how to program in PHP, you can easily learn how to do the same in C++.

In fact, the syntax of PHP and most PHP function names are directly derived from the C and C++ syntax. Moving from PHP to C++ is like coming home. We have missed you, you have been away for too long.

#### 3\. No Zend engine knowledge required

Let's face the truth: the internals of the Zend engine are way too complex, and the code of the Zend engine is a mess, and mostly undocumented. You do not want to deal with that on a day to day basis. This has always been a good reason to stay far away from writing your own native extensions.

But the PHP-CPP library has encapsulated all these complicated structures in very easy to use C++ classes and objects. You can write amazingly fast algorithms using C++ without ever having to do a direct call to the Zend engine, and without even having to look at the Zend engine source. With PHP-CPP you can write native code, without having to deal with the internals of PHP.

#### 4\. Full documentation and annotated source

Many programmers find it a matter of honor to make code that can only be understood by themselves. We do not agree. The PHP-CPP library is fully documented (the documentation can be found on [www.php-cpp.com/documentation](http://www.php-cpp.com/documentation)), and the source code is full with comments and explanations.

If you ever need more information, or want to have a look at the source code, you can easily find your way (although the _internal_ parts that deal with the Zend engine can sometimes be confusing, but that's because the Zend engine is so complicated).

#### 5\. Support for all the important PHP features

With PHP-CPP you can work with variables, arrays, functions, objects, classes, interfaces, exceptions and namespaces just as easily as you can with normal PHP scripts. Besides that, you can use all features of C++, including threads, lambdas and asynchronous programming.

#### 6\. You can't go faster than native

There are many different technologies under development that all try to speed up PHP. But nothing is ever going to beat native code. C/C++ is the fastest of all languages. Why would you choose for any of the other emerging technologies - if you can use the fastest of all languages too, which is is just as simple (if not simpler) as its alternatives?

#### 7\. Proven technology

C++ is a proven language with a more than 40 year long history. C++ has an official open standard and is controlled by a C++ standards committee with members that have proven track records. Compilers have been developed by companies like Microsoft, IBM, Intel, Apple and there are several open source compilers available (GNU, CLANG), so you can always switch to a faster or more stable alternative. The compiler vendors are constantly motivated to be better than their competitors and bring out new versions of their compilers all the time.

All this has lead to an extremely stable, powerful, clever and high quality programming language. The number of books and training courses about C++ is overwhelming, and this great C++ language can now also be used for building PHP extensions.

Alternative technologies to speed up PHP are not based on open standards, are controlled by single companies, do not have competing implementations, miss the long C++ heritage, and often only make your software more complex.

#### 8\. Access to an incredible amount of libraries

C/C++ is the most important language in the world, with the largest number of libraries. The moment you start writing code in C/C++ you immediately get access to this enormous amount of libraries. No other language can even come close to the number of libraries that are available in C/C++.

#### 9\. Working with C++ is fun

C++ is a great language that allows you to write brilliant object oriented code - but gives you at the same time the power to ruin everything. Working with C++ is like driving a very powerful sportscar: in the right hands it is the best car in the world, but also a dangerous weapon in the wrong hands. As a driver - you want such a car. As a programmer - you want C++.

#### 10\. IT IS FREE!

PHP-CPP is an open source technology and free for you to use. You would be crazy not to try it.

What are you waiting for? [Download](/download) the library, [install it on your system](/documentation/install) and get started with [your first extension](/documentation/your-first-extension).