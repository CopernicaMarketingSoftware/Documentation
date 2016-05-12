# Create a Yothalot program

After having implemented your [mapreduce](cpp-mapreduce "MapReduce")
algorithm you have to create a little program that uses your implementation. The program should look as follows:


```cpp
/**
 *  myMapReduce.cpp
 *  main program that is passed to the Yothalot framework
 */

/**
 *  includes
 */
#include <yothalot.h>
#include "MyMapReduce.h"

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
You first initialize the class with your [mapreduce](cpp-mapreduce "MapReduce")
algorithm. Here we used a default
initialization of a MapReduce class, but you can of course add other
functionality to your class with other constructors as well that you 
use when you instantiate it.

Next, you create an instance of `Yothalot::Program`, by calling its constructor
with arguments `argc`, `argv` and a pointer to the instance of your class. 
By passing `argc`, and `argv` to the constructor of `Yothalot::Program`,
all command line arguments are passed to `Yothalot::Program`. This enables
the Yothalot framework to call your program with the appropriate command
line arguments to get the behavior of the program Yothalot wants. Passing
a pointer to your algorithm is of course necessary to `Yothalot::Program`
is aware of your algorithm.

Finally, you return with a call to member function `run()` of the `Yothalot::Program`
class. That is all there is to create the executable. 


## Compiling your program

Since you are using C++ to implement your algorithm, you need to compile your program in order to use
it. You may use your preferred compiler but we are at least sure that it
works with gcc 4.8.4. You can install gcc using the repository of your Linux
distribution.

If you are using gcc you can compile your program by typing on the command
line in the directory where your program is stored:

```bash
g++ -std=c++11 myMapReduce.cpp -lyothalot -o myMapReduce
```

Since the Yothalot C++ API uses C++ 11 features you need to pass the -std=c++11
flag. Moreover, the program depends on the Yothalot library. You need to tell this
to the compiler as well. This is done with -lyothalot.

Running the above command will give you a program myMapReduce. The Yothalot
framework will call this program from its nodes. Therefore, the program
should be available on all the nodes. If you copy your file to the GlusterFS
cluster, you are sure that all nodes have access to the program.

You can of course add the optimization flags that you like, however, you
have to make sure that if you allow the compiler to use certain CPU features
these features should be supported by all CPUs in your Yothalot cluster.

## Running your program
You are now ready to execute this MapReduce job on the Yothalot framework. Make sure
Yothalot is running on the master node. If you are running locally this means
that the Yothalot application should be started. 

You can start a MapReduce job by calling Yothalot with the command line option `--mapreduce`, the name of your
program, and some data. In case of the example [MapReduce](cpp-mapreduce "MapReduce") this yields:
```bash
./yothalot --mapreduce /path/to/myMapReduce word1 word2 word3 word1
```
After executing correctly, the output file on GlusterFS should contain three different word counts.

See [Starting a Yothalot job](cpp-start "Start up a job") for more detailed information on running jobs.


## Access and paths

Yothalot needs to know where files and other resources are located on the GlusterFS file system.
Therefore, it is important that you provide the absolute paths to these resources.
To solve help you with this issue we have created a utility class
[Yothalot::Fullname](cpp-fullname "Fullname")
that makes switching between relative and absolute paths easy. By using this
class in your program you can pass either relative or absolute paths to your program and use
absolute paths if you want to access a file or other resource.

Yet, there is one issue that [Yothalot::Fullname](cpp-fullname "Fullname")
does not solve, the path to your program. Your program is started up to perform
mapper, reducer, and writer tasks. Therefore Yothalot needs to have access
to your program. You can achieve this by putting your program on the Yothalot cluster.
When you provide Yothalot the information about your program, you either have
to provide the full path to your program, or you have add the program to the
the $PATH environment. Then Yothalot knows where to look for your program.
