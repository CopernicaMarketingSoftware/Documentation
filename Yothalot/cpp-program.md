# Create a Yothalot program

After having implemented your [mapreduce](copernica-docs:Yothalot/cpp-mapreduce "MapReduce")
or [race](copernica-docs:Yothalot/cpp-race "Race") algorithm you have to create a little 
program that uses your implementation. The program should look as follows:


```cpp
/**
 *  myMapReduce.cpp
 *  main program that is passed to the Yothalot framework
 */

/**
 *  includes
 */
#include <yothalot.h>
#include "MyMapReduce.h" // or #include "MyRace.h"

/**
 *  the main program
 */
int main(int argc, const char* argv[])
{
   // Instantiate your class
   MyMapReduce myMR;
   
   // Construct a Yothalot::Program object. You pass the instantiation of
   // your mapreduce class as a first argument and you pass argc and argv
   // as the second and third argument, so that the yothalot framework
   // can process the command line arguments to find out whether to start
   // the algorith in map, reduce or write state
   Yothalot::Program myYothalotProgram(argc, argv, &myMR);
   
   // run, run, run!
   return myYothalotProgram.run();
}
```
You first initialize the class with your [mapreduce](copernica-docs:Yothalot/cpp-mapreduce "MapReduce")
or [race](copernica-docs:Yothalot/cpp-race "Race"). Here we used a default
initialization of a MapReduce class, but you can of course add other
functionality to your class with other constructors as well that you 
use when you instantiate it.

Next, you create an instance of `Yothalot::Program`, by calling its constructor
with arguments `argc`, `argv` and a pointer to the instance of your class. 
By passing `argc`, and `argv` to the constructor of `Yothalot::Program`,
all command line arguments are passed to `Yothalot::Program`. This enables
the Yothalot framework to call your program with the appropriate command
line arguments to get the behavior of the program Yothalot wants. It also
allows you to call your program with the appropriate command line arguments
to start a job [manually](copernica-docs:Yothalot/cpp-manual "Manual"). Passing
a pointer to your algorithm is of course necessary to `Yothalot::Program`
is aware of your algorithm.

Finally, you return with a call to member function `run()` of the `Yothalot::Program`
class. That is all there is to create the executable. 


## Compiling your program

Since you are using C++ you need to compile your program in order to use
it. You may use your preferred compiler but we are at least sure that it
works with gcc 4.8.4. You can install gcc using the repository of your Linux
distribution.

If you are using gcc you can compile your program by typing on the command
line in the directory where your program is stored:

```bash
g++ -std=c++11 myMapReduce.cpp -lyothalot
```

Since the Yothalot C++ API uses C++ 11 features you need to pass the -std=c++11
flag. Morover, the program depends on the Yothalot library. You need to tell this
to the compiler as well. This is done with -lyothalot. 

Running the above command will give you a program a.out. The Yothalot
framework will call this program from its nodes. Therefore, the program
should be available on all the nodes. If you copy your file to the GlusterFS
cluster, you are sure that all nodes have access to the program.


You can of course add the optimization flags that you like, however, you
have to make sure that if you allow the compiler to use certain CPU features
these features should be supported by all CPUs in your Yothalot cluster.

