# Information about the result objects

When you run your mapreduce job you are obviously mostly interested in the
result of the job. However, mapreduce jobs may take a long time and it may 
be useful for you to get some information on where this time is spend, how
many processes were used, how many temporary files were created, etc. You can
use this information to tweak your mapreduce algorithm or to fine tune the
behavior of the job by using its [tuning settings](tuning).

We provide you with information about the ran job by returning an object from the
```wait()``` method of the [Yothalot\Job](php-job). The
object you'll get from here depends on what kind of algorithm you passed and the result of this.
Map/Reduce, Race and regular tasks yield a ```Yothalot\MapReduceResult```, ```Yothalot\RaceResult```
or ```Yothalot\TaskResult```, respectively.

In case of any errors, you will receive an error objec that extends the regular result object.
Thus, the same tasks would - in case of failure - yield a ```Yothalot\MapReduceError```,
```Yothalot\RaceError``` or ```Yothalot\TaskError```.

Using any of these result classes is simple. You can call `wait()` from your job and
retrieve the results and call the members that you are interested in.
You can use it e.g. like this:

```php
/**
 *  call wait on your job and get the results
 */
$result = $job->wait();

/**
 *  print some of the results
 */
echo("The job started on: ".$result->started()."\n");
echo("The runtime was: ".$result->runtime()."\n");
```

## The Yothalot\MapReduceResult class

The **Yothalot\MapReduceResult** class provides the general information of the ran mapreduce
job, i.e. the time when the job was started and the runtime. The class also gives
you access to classes that hold statistics on the individual steps of the mapreduce
algorithm, i.e. the mapper step, the reducer step, and the finalizer step.
The interface of the Yothalot\MapReduceResult class looks as follows:

```php
class Yothalot\MapReduceResult
{
    /**
     *  Get the time when the job was started (in Unix time)
     */
    public function started();

    /**
     *  Get the runtime of the job (in seconds)
     */
    public function runtime();

    /**
     *  Get the statistics class of the mappers of the job
     */
    public function mappers();

    /**
     *  Get the statistics class of the reducers of the job
     */
    public function reducers();

    /**
     *  Get the statistics class of the finalizers of the job
     */
    public function finalizers();
};
```

## The Yothalot\RaceResult class

The **Yothalot\RaceResult** class provides the general information about the ran race job.
Like the amount of processes we actually ran, the runtime. And of course, you'll be
able to get the result of the winner of the race. The interface of the Yothalot\RaceResult
class looks as follows:

```php
class Yothalot\RaceResult
{
    /**
     *  Get the time when the job was started (in Unix time)
     */
    public function started();

    /**
     *  Get the time the last job was finished (in Unix time)
     */
    public function finished();

    /**
     *  Get the runtime of the job (in seconds)
     */
    public function runtime();

    /**
     *  Get the amount of processes we ran in total
     */
    public function processes();

    /**
     *  Get the winning result
     */
    public function result();

    /**
     *  Get statistics about the winner
     */
    public function winner();
}
```

The ```result()``` method of this class will return the value you returned from the winning
race as is (assuming it is serializable). The ```winner()``` method will return a Winner
object with statistics about the winning racer, more about this class later.

## The Yothalot\TaskResult class

The **Yothalot\TaskResult** class provides the general information about a single ran task.
You'll be able to get basic information like the start and end time from this. The total
time ran and the possible result that you returned from this task.

```php
class Yothalot\TaskResult
{
    /**
     *  Get the time when the job was started (in Unix time)
     */
    public function started();

    /**
     *  Get the time the last job was finished (in Unix time)
     */
    public function finished();

    /**
     *  Get the runtime of the job (in seconds)
     */
    public function runtime();

    /**
     *  Get the winning result
     */
    public function result();
}
```

## Error results

As mentioned before, the errors returned extend from the results normally returned
when an operation finishes successfully. They also evaluate to false when used in a
boolean context - making it easy to check for errors.

The error result objects also contain some extra properties to debug the failed task,
like the executable that was started, the arguments, the input, output and errors
generated.

The example shows the ```Yothalot\MapReduceError```, but the ```Yothalot\RaceError```
and the ```Yothalot\TaskError``` have exactly the same extra methods and extend from
their respective result classes.

```php
class Yothalot\MapReduceError extends Yothalot\MapReduceResult
{
    /**
     *  The executable that failed
     */
    public function executable();

    /**
     *  The arguments that were passed to the executable that failed
     */
    public function arguments();

    /**
     *  The input that was send to this job
     */
    public function stdin();

    /**
     *  The stderr of the failed job, you'll probably want to expect this as
     *  it could very well contain PHP fatal errors etc.
     */
    public function stderr();

    /**
     *  The stdout of the failed job.
     */
    public function stdout();

    /**
     *  The complete command that was executed. This includes
     *  the input piped into the program  as well as the arguments
     */
    public function command();
}
```

## The Yothalot\Stats class

A mapreduce job has three basic steps. A mapper step, a reducer step and
a finalizer, or writer, step. Information on each step is stored in the
Yothalot\Stats class and can be retrieved via the above listed members
`mappers()`, `reducers()`, and `finalizers()`. The interface of this class
looks as follows.

```php
class Yothalot\Stats
{
    /**
     *  get the time the first mapper, reducer, or finalizer was started (in Unix time)
     */
    public function first();

    /**
     *  get the time the last mapper, reducer, or finalizer was started (in Unix time)
     */
    public function last();

    /**
     *  get the time the last mapper, reducer, or finalizer was finished (in Unix time)
     */
    public function finished();

    /**
     *  get the running time of the mappers, reducers, or finalizers (in seconds)
     */
    public function runtime();

    /**
     *  get the running time of the fastest mapper, reducer, or finalizer (in seconds)
     */
    public function fastest();

    /**
     *  get the running time of the slowest mapper, reducer, or finalizer (in seconds)
     */
    public function slowest();

    /**
     *  get the number of mapper, reducer, or finalizer processes
     */
    public function processes();

    /**
     *  get an object with information on the input used by the mappers,
     *  reducers, or finalizers
     */
    public function input();

    /**
     *  get an object with information on the output generated by the mappers,
     *  reducers, or finalizers
     */
    public function output();
};

```
All the members can be called on an object you get from calling `mappers()`,
`reducers()` and `finalizers()`, or you can call them directly as listed below.

```php
/**
 *  call wait on your job and get the results
 */
$result = $job->wait();

/**
 *  print some results on the mappers and reducers
 */
echo("The first mapper started on: ".$result->mappers()->first()."\n");
echo("The runtime of the fastest reducer was: ".$result->reducers()->fastest()."\n");
```
As you can see you can get quite some details about the job. You can e.g. see
which step is spending the most time. This information may help you to adjust
your algorithm for the job or [fine tune](tuning) the
job behavior.

## The Yothalot\DataStats class

The mapper, reducer, and finalizer steps may produce temporary files that are used
by the step itself or are used to pass information from one step to the next one.
You can use the Yothalot\DataStats object to get insight in the amount of
temporary files and their sizes that are consumed and created in each step.
The interface of Yothalot\DataStats class is as follows:

```php
class Yothalot\DataStats
{
    /**
     *  get the number of files
     */
    public function files();
    
    /**
     *  get the number of bytes
     */
    public function bytes();
};
```

You can use it like:

```php
/**
 *  call wait on your job and get the results
 */
$result = $job->wait();

/**
 *  print some of the results on temporary files and bytes
 */
echo("The number of temporary bytes produced by the mapper is:  ".$result->mappers()->output()->bytes()."\n");
echo("The number of temporary files consumed by the reducer is: ".$result->reducers()->input()->files()."\n");
```

The information on the number of files and their sizes may again help you
to adjust your algorithm and use the [tuning settings](tuning)
to increase the performance of your mapreduce job.

## The Yothalot\Winner class

The **Yothalot\RaceResult** has a winner method to retrieve statistics about the winner
of the race. This will return the Winner object. The interface of this object looks as follows.

```php
class Yothalot\Winner
{
    /**
     *  Retrieve the input that was send to the winner
     */
    public function input();

    /**
     *  The output to stdout from the winner, this is mostly raw data
     */
    public function output();

    /**
     *  The server on which the running job ran
     */
    public function server();

    /**
     *  The process id of the winner
     */
    public function pid();

    /**
     *  The exit code of the winner, very likely just 0
     */
    public function exit();

    /**
     *  Get the time when the job was started (in Unix time)
     */
    public function started();

    /**
     *  Get the time the last job was finished (in Unix time)
     */
    public function finished();

    /**
     *  Get the runtime of the job (in seconds)
     */
    public function runtime();
}
```
