# JSON specification

The Yothalot master server loads its instructions from three different
queues: a queue for the mapreduce jobs, a queue for the race jobs and
a queue for regular jobs. The PHP API and the C++ API publish, under
the hood, messages to these queues. However, if you like, you can also
post messages to these queues directly.

The messages that you can post to the three queues should be JSON 
formatted, and contain all information that is needed to start up
jobs. 


## Regular jobs

The most simple jobs that the Yothalot cluster can run, are the regular
jobs. A regular job is nothing more that a single script or single
executable that should be started *somewhere* on the Yothalot cluster.
If you post a JSON encoded message to the regular "jobs" queue, the
master node will pick up this message, and assigns the job to a node
in the cluster that has the capacity to run it.

The input JSON for a regular job is JSON formatted, and looks like this:

````json
{
    "executable":   "path/to/executable",
    "arguments": [ "extra", "command", "line", "arguments" ],
    "stdin": "data that should be sent to stdin",
    "server": "optional hostname of server that is best suited to run the job",
    "filename": "optional filename that is going to be processed"
    "exchange": "optional exchange name to publish results",
    "routingkey": "optional routing key for the results",
}
````

Many of the above properties are optional, only the name of the executable
is required. The executable name holds the path to a program that must
be installed on *each* of the servers in the Yothalot cluster (because
you can never know on which server the job is going to be started). The
pathname can either be an absolute pathname (like /usr/bin/ls), or the 
name of a program that can be found in the $PATH of the servers.

All other parameters are options: "arguments" holds an array with optional
command line arguments that should be passed to the executable, and "stdin"
holds the input for the process: data that is going to be sent to stdin
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

````json
{
    "executable":   "path/to/executable",
    "arguments": [ "extra", "command", "line", "arguments" ],
    "stdin": "data that was sent to stdin",
    "stdout": "output that was sent to stdout",
    "stderr": "output that was sent to stderr",
    "server": "hostname of the server on which the job ran",
    "pid": 1234,
    "signal": 0,
    "exit": 0,
    "started": "2015-11-01 23:22:11",
    "finished": "2015-11-01 23:22:17"
}
````

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

````json
{
    "executable": "path/to/executable",
    "arguments": [ "extra","command","line","arguments"],
    "input": [ {
        "data": "input data for process 1",
        "server": "server to run job 1 on",
        "filename": "filename for job 1"
    }, {
        "datga" : "input data for process 2",
        "server": "server to run job 2 on",
        "filename": "filename for job 2"
    },
    "exchange": "exchange for publishing result",
    "routingkey": "routingkey for publishing result"
}
````

@todo uitleg
@todo "server" en "filename" voor elke input zijn optional


If the input data is too big, you can also choose to store your input
data in files in a temporary directory on the Yothalot cluster. In that
case you should not include an input _array_ in the input JSON, but an
"input" string holding a path to the directory with the input files:

````json
{
    "executable": "path/to/executable",
    "arguments": [ "extra","command","line","arguments"],
    "input": "relative/path/to/directory",
    "exchange": "exchange for publishing result",
    "routingkey": "routingkey for publishing result"
}
````

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

{
    "executable":   "path/to/executable",
    "arguments": [ "extra", "command", "line", "arguments" ],
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

@todo meer uitleg


## Mapreduce jobs





