# Non mapreduce jobs

Besides mapreduce jobs, you can use Yothalot for other
type of jobs as well. The other jobs that are support by Yothalot are:
regular jobs and race jobs. A regular job is a program that runs somewhere
on the Yothalot cluster and uses the input that you have provided to it.
A race job is an extension to this regular job in that it can handle multiple
pieces of data. Yothalot will start up multiple instances of the program
each having its own piece of data, so, the data can be processed in parallel.
With a race job it is also possible to stop all processes if a certain result
is obtained. With this property a race job is well suited as a search tool
to find an instance of something in a lot of data.


## Creating a program for regular and race jobs

You basically can run any program or script that you have on the Yothalot cluster.
There are only some requirements on how input is passed to the program
and what output the program should generate.
The simplest job that you can start is the regular job. For a regular job
Yothalot will execute your program or script somewhere on the server and 
passes it the command line options you have told it to use. Extra data can
be passed to the program via standard input if you instruct Yothalot to do
so. For a regular job there are no extra requirements on the type of input
or output. So, the only thing you have to do is to create a program or script
that uses standard input to read the data it should process.

Creating a program with a race job is almost the same as creating program
holding a regular job. The main difference between a race program and a
regular job is that in a race job multiple instances of your program will
be running. Each instance will receive its specific input via standard input.
New instances will be started up, if there is enough data of course, as
long as the finished programs return with zero and none of the programs
have written something to standard output or standard error. If one started
program returns with a non-zero result or has written to standard output
or error no new programs will be started and the running programs will be
stopped. The race has won be the program that returns as first a non-zero
value or writes to stander output or error.

