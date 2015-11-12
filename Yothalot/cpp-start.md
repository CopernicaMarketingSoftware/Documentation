# Starting a Yothalot job

You use the Yothalot program to start up your job. This is the same program
that handles your jobs, you only have to provide some command line arguments
to tell it that it has to start a job. The options that are used to start
up jobs are:

*   --run,
*   --race,
*   --mapreduce,
*   --directory,
*   --server,
*   --filename,
*   --wait,
*   --stdin

All arguments that are provided to Yothalot but are not options are treated
as data.

### run

This option specifies that you want to run a regular job. After the option
you provide the name of your program, or you provide a string where the
first word in the string is the name of your program. All other words in
the string are passed as input arguments to your program when it is started
by Yothalot.


### race

This option specifies that you want to run a race job. After the option
you provide the name of your program, or you provide a string where the
first word in the string is the name of your program. All other words in
the string are passed as input arguments each time when your program is started
by Yothalot.


### mapreduce

With this option you start your mapreduce task. After the option you provide
the name of the program that you have [created](copernica-docs:Yothalot/cpp-program "Writing a program").


### stdin

The input for regular jobs may come from standard input. If you set the option
`--stdin` the Yothalot program will read standard input and will pass this to
the standard input of the program that is started up.

### directory

With this option you can specify the working directory for regular and 
race jobs.


### server

With this option you can specify a hint to the Yothalot framework on which
server the job preferably should run. It is not guaranteed that the job
will indeed run on the specified server.


### filename

With this option you can specify a hint to the Yothalot framework on which
server the job preferably should run. The Yothalot framework tries to schedule
the job on a server where the file is locally stored. However, it is not
guaranteed that the file is indeed locally available.


### wait

With this option you specify that you want to wait for the result. If there
is any output it will be displayed if this option is set.


## Passing data to the job

All non option arguments that are passed to Yothalot are treated as data. For
regular jobs this means that these arguments are ignored since regular jobs
cannot deal with data. For race jobs a program is started up by Yothalot for
each piece of data. This piece of data is passed to the standard input of
the program. For mapreduce jobs the extra arguments are also seen as data.


## Extra mapreduce options

When you start up a mapreduce job you have some extra options with which you
can tune your job. You can use these options to affect the underlying behavior
of the Yothalot framework. For more information on how to tune your job you
are referred to our [tuning jobs](copernica-docs:Yothalot/tuning "Tuning jobs")
documentation page. The options for tuning your mapreduce job are:

* --maxprocesses,
* --maxmappers,
* --maxreducers,
* --maxwriters,
* --maxfiles,
* --maxbytes,
* --modulo


### maxprocesses

With this option you can limit the total amount of processes that Yothalot is
allowed to run at the same time. You can use this option to limit the amount
of resources that Yothalot uses so you can use the cluster for other tasks
as well.


### maxmappers

With this option you can specify the maximum number of mapper processes that may run at
the same time. 


### maxreducers

With this option you can specify the maximum number of reducer processes
that may run at the same time.


### maxwriters

With this option you can specify the maximum number of writer processes that
may run at the same time.


### maxfiles

With this option you can limit the input that is used in the write phase
of the mapreduce algothm based on the number of files. For an elaborate
discussion on this issue you are referred to the [tuning jobs](copernica-docs:Yothalot/tuning "Tuning jobs")
page.


### maxbytes

With this option you can limit the input that is used in the write phase
of the mapreduce algothm based on the number of bytes. For an elaborate
discussion on this issue you are referred to the [tuning jobs](copernica-docs:Yothalot/tuning "Tuning jobs")
page.


### modulo

Normally the `write()` member function in your mapreduce implementation is
called only once. You can change this with the modulo option. For a discussion
on how this works exactly and why this is useful you are referred to the 
[tuning jobs](copernica-docs:Yothalot/tuning "Tuning jobs") documentation.


## Other options

If you are using Yothalot to start up a job you still can use the command
line options as discussed in the [configuration file](copernica-docs:Yothalot/configuration)
section. E.g. you can determine in which queue your job should be placed.
