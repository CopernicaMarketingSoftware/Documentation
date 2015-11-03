# JSON specification

The Yothalot master server loads its instructions from three different
queues: a queue for the mapreduce jobs, a queue for the race jobs and
a queue for regular jobs. The PHP API and the C++ API publish, under
the hood, messages to these queues. However, if you like, you can also
post messages to these queues directly.

The messages that you can post to the three queues should be JSON 
formatted, and contain all information that is needed to start up
jobs. 

**Watch out** if you're publishing JSON to the queues directly
(especially JSON for mapreduce jobs), you must carefully understand
what kind of input and output the jobs have to generate and have to
accept. It is often better and easier to use the C++ and PHP API instead
to start and submit jobs.


## Regular jobs

The most simple jobs that the Yothalot cluster can run, are the regular
jobs. A regular job is nothing more that a single script or single
executable that should be started *somewhere* on the Yothalot cluster.
If you post a JSON encoded message to the regular "jobs" queue, the
master node will pick up this message, and assigns the job to a node
in the cluster that has the capacity to run it.

The input JSON for a regular job is JSON formatted, and looks like this:

```json
{
    "executable":   "path/to/executable",
    "arguments": [ "extra", "command", "line", "arguments" ],
    "directory": "the working directory",
    "stdin": "data that should be sent to stdin",
    "server": "optional hostname of server that is best suited to run the job",
    "filename": "optional filename that is going to be processed",
    "exchange": "optional exchange name to publish results",
    "routingkey": "optional routing key for the results",
}
```

Many of the above properties are optional, only the name of the executable
is required. The executable name holds the path to a program that must
be installed on *each* of the servers in the Yothalot cluster (because
you can never know on which server the job is going to be started). The
pathname can either be an absolute pathname (like /usr/bin/ls), or the 
name of a program that can be found in the $PATH of the servers.

All other parameters are options: "arguments" holds an array with optional
command line arguments that should be passed to the executable, "directory"
the working directory for the new process and "stdin" contains the input 
for the process: the data that is going to be sent to stdin
the moment the program starts.

The Yothalot master server automatically assigns the job to one of the 
nodes in the cluster. This can literally be any node, and you can never
be sure on which server the job will be started. However, with the 
optional "server" and "filename" properties you can include hints for the
Yothalot master on which server the job would run best. If you include 
the "server" property, and set it to a hostname of one of the nodes in
the Yothalot cluster, the master node will do its best to assign the job
to that specific node. By including the "filename" property, the master
will try to assign the job to a node that holds a local copy of that
specific file. 

If you want to be notified when the job is finished, you must include
an exchange and routing key in the JSON, so that the Yothalot process
knows where to publish the results to. If you leave these properties out
of the JSON, no job results are published back. You can for example use
this feature by first creating a temporary queue, then publish the
input JSON holding the name of this temporary queue as "routingkey"
property, and then waiting for a message to be appear in this temporary
queue.

All other properties that you add to the input JSON are ignored by the
Yothalot cluster - but they are included in the result JSON that is 
published to the specified result exchange and routing key. This means
that you can use this to add your own properties to be able to identify
a result.

The results that are published back by the Yothalot master node, have
almost the same format and same properties as the input object - but 
with some additional properties added, and with some properties replaced
and removed:

```json
{
    "stdout": "output that was sent to stdout",
    "stderr": "output that was sent to stderr",
    "server": "hostname of the server on which the job ran",
    "pid": 1234,
    "signal": 0,
    "exit": 0,
    "started": "2015-11-01 23:22:11",
    "finished": "2015-11-01 23:22:17"
}
```

The "signal" property is only included if the process was killed by a
signal (for example by signal 11 in case of a segmentation fault), and
the "exit" property is only used for processes that ended normally, and
produced a valid exit code (most processes that exit normally use exit
code 0, a non-zero exit code often is an indication of some kind of 
error.

The amount of data that can be included in the JSON is limited. If the
job sends out too much data to stdout and/or stderr, the output is going
to be truncated so that the output JSON does not become too big. If this
is the case, you can find an extra property "truncated" set to true in
the output JSON.

You can consume these messages from the result queue and process the 
results. Note that besides the properties mentioned above, your custom
properties will also be included in the output JSON.


## Race jobs

Besides regular jobs, you can also publish so called "race" jobs to
the special race queue. A race job is a special kind of job that we (as
in: Copernica) use for running multiple processes in parallel to find
a certain record in a group of log files. When you send a race job to
the cluster, the master node will start up multiple processes in parallel,
and the first process that creates output on stdout or stderr, or the first
processes that does not end normally "wins" the race, and the output
and result status of that job is published to a result queue.

The instruction of a race job is also JSON formatted, and looks 
like this:

```json
{
    "executable": "path/to/executable",
    "arguments": [ "extra","command","line","arguments"],
    "directory": "working directory for race processes",
    "input": [ {
        "data": "input data for process 1",
        "server": "server to run job 1 on",
        "filename": "filename for job 1"
    }, {
        "data" : "input data for process 2",
        "server": "server to run job 2 on",
        "filename": "filename for job 2"
    } ],
    "exchange": "exchange for publishing result",
    "routingkey": "routingkey for publishing result"
}
```

The "input" property is an array that hold objects with properties "data",
"server", and "filename". For every object in the array a race process is
started. The data in the "data" property is passed to the process via stdin.
The "server" and "filename" properties are optional for each input and
provide a hint Yothalot on which server the process ideally should start.

If the input data is too big, you can also choose to store your input
data in files in a temporary directory on the Yothalot cluster. In that
case you should not include an input _array_ in the input JSON, but an
"input" string holding a path to the directory with the input files:

```json
{
    "executable": "path/to/executable",
    "arguments": [ "extra","command","line","arguments"],
    "directory": "working directory for the race processes",
    "input": "relative/path/to/directory",
    "exchange": "exchange for publishing result",
    "routingkey": "routingkey for publishing result"
}
```

The path to the input directory should be relative to the GlusterFS
mount point, and the data from _all_ the files in the input directory 
are going to be used as input for the race job.

The files in this directory should be regular Yothalot files (you can
create such files using the PHP class Yothalot\Output (hyperlink) or the
C++ Yothalot::Output class (also hyperlink). Every record in these files
will result in one racer process to be started. In other words: if you
store 10 files in the temporary directory, and each of these ten files
hold 100 record, a total of 1000 individual processes are started by
the Yothalot framework, each to process one record from the input 
files (unless of course one of the jobs that is started early succeeds 
before the later jobs can run, then the race is finished before all
jobs were started). When the race is over, the Yothalot framework 
automatically removes the temporary directory with the input files.

The output from a race job is also JSON formatted and is published back
to the exchange and routingkey named in the input JSON, and looks like 
this:

```json
{
    "winner": {
        "stdin": "data that was sent to stdin",
        "stdout": "output that was sent to stdout",
        "stderr": "output that was sent to stderr",
        "server": "hostname of the server on which the job ran",
        "pid": 1234,
        "signal": 0,
        "exit": 0,
        "started": "2015-11-01 23:22:11",
        "finished": "2015-11-01 23:22:17"
    },
    "processes": 123, (total number of processes started),
    "started": "2015-11-01 23:21:08",   (start of race)
    "finished": "2015-11-01 23:22:17"   (end of race)
}
```

This JSON contains some of the properties that you have provided to start
up the race. It also has a property "winner" that contains an object with
properties about the winning process. You can e.g. see with which data
the process has won the race, when the winning process was started and when
it ended. The JSON also contains a property with the number of processes
that were started before one process won the race.

@todo meer uitleg


## Mapreduce jobs

Besides regular and race jobs mapreduce jobs can be started. Mapreduce
jobs are the most advanced jobs that the Yothalot cluster can run, and
the output from one process is forwarded to be the input of the next 
process. Unlike the previously mentioned regular and race jobs, the
mapper and reducer executables must produce output in a predescribed 
format, while the reducer and finalizer executable need to accept
input in a similar format.

To start a mapreduce task you have to publish a JSON to the mapreduce 
queue. When you send a mapreduce job to the cluster, the master node 
will start up the multiple mapper, reducer and finalizer jobs in 
parallel. 

```json
{
    "mapper": {
        "executable": "path/to/executable",
        "arguments" : ["extra", "command", "line", "arguments"],
        "limits" : {
            "processes": 100
        }
    },
    "reducer": {
        "executable": "path/to/executable",
        "arguments" : ["extra", "command", "line", "arguments"],
        "limits" : {
            "files": 100,
            "bytes": "10MB",
            "processes": 100
        }
    },    
    "finalizer": {
        "executable": "path/to/executable",
        "arguments" : ["extra", "command", "line", "arguments"],
        "limits" : {
            "files": 100
            "bytes": "10MB
            "processes": 100
        }
    },
    "input": [ {
        "data": "input data for process 1",
        "server": "server to run job 1 on",
        "filename": "filename for job 1"
    }, {
        "data": "input data for process 2",
        "server": "server to run job 2 on",
        "filename": "filename for job 2"
    } ],
    "modulo": 1
    "processes": 100
    "exchange": "exchange for publishing result",
    "routingkey": "routingkey for publishing result"
}
```

The "mapper", "reducer" and "finalizer" properties hold the name of an
executable, and the command line arguments, just like you can specify
these properties for regular jobs and race jobs that we described
above. But unlike the executable for these other job types, it is not 
possible to set a working directory for mapreduce jobs. The Yothalot 
framework takes care of creating a temporary directory in which the 
jobs are going to run.

Besides the executable name and command line arguments, you can also 
add an optional "limits" object with hints for the Yothalot master
process about the amount of data that the executable can process. Each
"mapper", "reducer" and "finalizer" is going to be started in parallel,
and with the "limits.processes" option, you can limit the max number
of mappers/reducers/finalizers that are going to run at the same time.

The reducer and finalizers take a set of temporary files as input, and 
it is their job to reduce and finalize (write) this data. The
"limits.files" and "limits.bytes" settings specify how many input files
a reducer or finalizer can process at most, and the number of bytes that it
can handle at most. If more files or more data has to be mapped, the 
Yothalot master node will attempt to split up the job in smaller
sub jobs, so that no process will handle more data that set in the
limit. This is a soft limit, if it is impossible to split up the
data, it could happen that reducers or finalizers are started with
more input.

The input that is sent to the mapper processes can be specified in the
very same format as the input for race processes: you can set the
"input" property to an array holding the different data items (with
optional hints about the server to best start it on), or you can
specify a directory that holds the input files. Once again, this works
exactly the same as it does for race jobs, and the input directory
is therefore also automatically removed when the job is finished:

```json
{
    "mapper": {
        "executable": "path/to/executable",
        "arguments" : ["extra", "command", "line", "arguments"],
        "limits" : {
            "processes": 100
        }
    },
    "reducer": {
        "executable": "path/to/executable",
        "arguments" : ["extra", "command", "line", "arguments"],
        "limits" : {
            "files": 100,
            "bytes": "10MB",
            "processes": 100
        }
    },    
    "finalizer": {
        "executable": "path/to/executable",
        "arguments" : ["extra", "command", "line", "arguments"],
        "limits" : {
            "files": 100
            "bytes": "10MB
            "processes": 100
        }
    },
    "input": "path/to/input/directory"
    "modulo": 1
    "processes": 100
    "exchange": "exchange for publishing result",
    "routingkey": "routingkey for publishing result"
}
```

The "modulo" setting (default value is 1) is a setting that allows you
to split up the intermediate data into multiple groups, so that more
processes can run in parallel, and the global "processes" setting holds
the total max number of processes that can run in parallel (you can 
thus set a maximum for the max number of parallel mappers/reducers/finalizers, 
to run, but also a maximum for the total number of parallel processes).

Just like with the other job types, the "exchange" and "routingkey"
properties can be used to set the name of a result queue to which the
result data should be written.


## Input and output for mapreduce processes

Although you are free to choose any output format for regular jobs and
race jobs, the output for mapper and reducer jobs is well defined, because 
reducers and finalizers will have to further process this output.

The "mapper" processes receive exactly the input that is set in the
"input" property and are therefore basically the same as the regular
jobs and race jobs. The output however, should be a list of filenames,
each written using the Yothalot::Output class. When the mapper process
is started, the Yothalot framework inserts one command line argument to
the list of already defined arguments, holding the modulo setting,
for example, the JSON mentioned above would result in the following
mapper process to be started: "path/to/executable --modulo 1 extra command line arguments".

The number of files that a mapper creates should be identical to the
passed in modulo setting, and each file should have unique key/value
combinations, ordered by key. If a file is empty, the mapper can output
an empty line. See below for a more specific description of the format
of the output files.

The reducer process takes as input a list of filenames (one file per
line), and needs to output a single filename into which all the keys
and values that were stored in the input files are merged and reduced.

The finalizer process finally, also takes a list of input files, just like
the reducer does, and is required to reduce all records from these files.
The finalizer process does not have to generate any output.

@todo better explenation


## Output of a mapreduce process

When a mapreduce process is finished, the Yothalot master process
publishes a JSON message back to the result queue, holding the results
for the mapreduce process. Because a mapreduce process can run in 
parallel, with multiple write stages, there is normally no output:


```json
{
    // general stats
    "mapper": {
        // mapper-specific-stats
        "processes": 100
    },
    "reducer": {
        // reducer-specific-stats
    },    
    "finalizer": {
        // finalizer-specific-stats
    },
    "error": {
        "executable": "executable that caused the error",
        "arguments": "command line arguments that caused the error",
        "stdin": "input that caused the error",
        "stderr": "output sent to stderr",
        "stdout": "output sent to stdout",
        "server": "server on which an error occured",
        "pid": 1234,
        "signal": 0,
        "exit": 0,
        "started": "2015-11-01 23:22:11",
        "finished": "2015-11-01 23:22:17"
    }
}
```

## Format of the intermediate files



