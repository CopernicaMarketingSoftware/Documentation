# Tuning jobs

The Yothalot API allows you to tune the performance of jobs. You can use
these tuning parameters to either make your jobs faster - or to restrict the 
resources that can be used by jobs.

The tuning settings have no effect on the outcome of the map/reduce algorithm.
The output will be exactly the same, but internally the Yothalot will start
up different number of sub jobs, which could lead to a faster or slower
algorithm.


## Setting the modulo

You can tweak the performance of your mapreduce jobs by changing the per-job
*modulo* setting. The Yothalot framework calculates the hash value for every 
mapped key, and based on the hash and the modulo setting it splits up the 
intermediate mapped data into groups. The default modulo value is one, meaning 
that all data ends up in the same group, which effectively means that you do not 
have grouped data.

When you use a higher value for modulo, the mapped data gets grouped into multiple
intermediate files, and the subsequent reducers and writers will only operate
on one of these groups. This means that more processes are started (which is 
extra overhead), but at the same time more processes can run in parallel (which
is good if you have enough CPU and memory available), and each of these processes
has to process less data.

The default modulo value is 1, meaning that the data is not split up into groups.
This does have advantages, because after everything has been mapped and reduced, 
the Yothalot framework will start only a single writer process to write all the 
discovered key/value pairs. This is a very nice thing, because since you have
only a single writer process, you do not have to worry about race conditions, and 
you can thus for example write all output to a single file.

However, if you discover that a lot of time is lost in the writing phase
of your map/reduce algorithm, you can start experimenting with setting the modulo
to higher values. Yothalot will start up more reducers and writers, but each 
of these processes receive less data and can therefore run faster. 

Keep in mind that if you use a modulo value higher than one, multiple writer 
processes are started at the end of the mapreduce algorithm, and your `write()` 
method has to be "parallelism safe". You should write to a resource that can 
deal with parallel writes (like a database or different files in a directory), 
or you should use some kind of locking mechanism.


## Limiting input

The *write* phase of the mapreduce algorithm takes the output from previous *map* 
and *reduce* processes, and merges (and optionally reduces) all that data before 
it calls the user-supplied `write()` method to write the data. In the default 
setup, there is no input restriction for this *write* phase. The writer processes
are started with all the input that is available from the previous mapper and 
reducer steps, no matter how big that input is.

You can limit this input. You can for example specify that a writer is only
allowed to merge at most 100 intermediate input files, or that it may only
process 1GB of intermediate data. If more files or more data is available, the
Yothalot framework will first run an intermediate algorithm to merge (and optionally
reduce) input data, until the number of intermediate files is small enough to
start up the final writer jobs. 

The following two settings are relevant for limiting the input that is sent
to the writers:

* **maxfiles** - max number of files that are merged by a writer
* **maxbytes** - max number of bytes that is processed by a writer

It is especially worth investigating whether it is worthwhile to start tweaking
these settings if you discover that your algorithm spends a lot of time in
the final *write* phase.


## Setting modulo vs setting input limits

Both the *modulo* setting and the *maxfiles* and *maxbytes* settings are
useful when you discover that much time is lost in the write phase of your
mapreduce algorithm. Which tuning parameter is better to use?

Incrementing the modulo is often the most effective way to increase the 
performance of your algorithm, but has one very big downside: you suddenly get
multiple writer processes, and if you try to write to a single resource (like
a file), this leads to all sorts of other challenges. If that is a problem, 
you can then first try to limit the input parameters.

Setting the input parameters (*maxfiles* and *maxbytes*) is especially effective 
if the output from the mapper processes still contains a lot of data with 
similar keys, in other words: if there is still a lot of data to reduce after
the mapper phase, and the extra reducers that are started can really make
a difference.


## Reducing the number of processes

Besides the tuning parameters mentioned above, which are used to *improve* the
performance of the algorithm, you can also use a couple of parameters to slow
the algorithm down:

* **maxprocesses** - max total number of processes to run simultaneously
* **maxmappers** - max number of mapper processes to run simultaneously
* **maxreducers** - max number of intermediate reducer processes to run simultaneously
* **maxwriters** - max number of writer processes to run simultaneously

By default, Yothalot sets no limit on the max number of processes: it starts
up as many jobs as it can, using the capacity of the entire Yothalot cluster to 
the max. However, if you want to limit this (for example because you don't want 
that one application or one customer uses all the resources, potentially blocking 
others) you can set the *maxprocesses* parameters. This ensures that for a
specific job, there will never be more than this number of processes running.

If you know that one specific phase of your algorithm uses a limited resource, 
you can also limit the number of mappers or writers that are started. For example,
if your writer make a connection to a database, you probably don't want a full
Yothalot cluster of 1000 CPU's all connect to the same database at the same time.
In such a setup you can set the *maxwriter* setting to four, ensuring that
there will at most be four writers running at the same time, and your database
does not get overloaded. The *maxmappers* can be used in a similar fashion to
limit the number of mappers that may run.

A special word of warning about the *maxreducer* setting. During all phases of 
the mapreduce algorithm (the mapping, the reducing and the writing) values are 
being reduced and calls to the user-supplied `reduce()` method are made. The 
*maxreducers* setting only limits the number of pure reducer processes that 
are started, but does not limit the number of mappers and writers, which could
also make calls to your `reduce()` method. If you want to restrict the number of 
processes that can make calls to the user-supplied `reduce()` function at the 
same time (for example because you use a database connection inside the 
`reduce()` method), you better use the *maxprocesses* setting.

## Write intermediate files directly to GlusterFS

By default all the intermediate files are written to the local filesystem and are
only written to GlusterFS during the reduce phase. This is mostly to avoid huge
loads on GlusterFS. In case you only have very little mappers or multiple mappers
are unlikely to run on the same server you can turn this feature off. You turn
this feature off by setting **local** to **false**.