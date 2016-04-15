# Information about the race job

When you run a race job you may be interested which job has won the race
and what result it has returned. You may also want to have some statistics
on how long the job has ran in general and the winner in particular. This
information is proved in the Yothalot\RaceResult and Yothalot\Winner classes.

We provide you all the information about a finished race job in the **Yothalot\RaceResult** class.
This **Yothalot\RaceResult** class holds results on the behavior of a job.
You cannot create a results class yourself as this would not make any sense,
yet, **Yothalot\RaceResult** classes are returned by the `wait()` method of the
**Yothalot\Job class**. The class provides you all the information on the
behaviour of the job you want and probably some extra. However, if there is relevant
information that you would like to have but is currently not provided,
please contact us by sending an email to [info@copernica.com](mailto:info@copernica.com).


## Yothalot\RaceResult

The **Yothalot\RaceResult** class provides the general information of the job, i.e.
the time when the job was started and the runtime. The class also gives
you access to a class that holds statistics on the winner of the race.
The interface of the Yothalot\RaceResult class looks as follows:


```php
class Yothalot\RaceResult
{

public:
    /**
     *  Get the time when the race job is started (in Unix time)
     */
    public function started();
    
    /**
     *  Get the time when the race job is finished (in Unix time)
     */
    public function finished();

    /**
     *  Get the total runtime
     */
    public function runtime();
    
    /**
     *  Get the number of processes during the race
     */
    public function processes();

    /**
     *  Get the result
     */
    public function result();
    
    /**
     *  Get the winner class with all winner statistics
     */
    public function winner();
};
```

Using this class is simple. You can call `wait()` from your job and
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


## Yothalot\Winner

The Yothalot\Winner class holds all kind of statistics about the winning
process of the race. It also holds the result and some error codes if the
winner was determined because of an error in the script.
You cannot create a Yothalot\Winner class yourself but you can get an instance
via member winner() of the Yothalot\RaceResult class.

```php
class Yothalot\Winner
{
public:

    /**
     *  input that was send to the winner
     */
    public function input();
    
    /**
     *  output that was send to stdout by winner
     */
    public function output();
     
    /**
     *  error that was send to stderr by winner
     */
    public function error();
    
    /**
     *  name of sever on which the winning job ran
     */
    public function server();
     
    /**
     *  Process id of the winner
     */
    public function pid();
    
    /**
     *  Signal if the winner was killed
     */
    public function signal();
    
    /**
     *  Exit code with which the winner exited
     */
    public function exit();

    /**
     *  Starting time of the winner
     */
    public function started();
    
    /**
     *  Finishing time of the winner
     */
    public function finished();
    
    /**
     *  Runtime of the winner
     */
    public function runtime();
};
```

You can use the winner class like:

```php
/**
 *  call wait on your job and get the results
 */
$result = $job->wait();

/**
 *  print some of the results
 */
echo("The winner started on: ".$result->winner()->started()."\n");
echo("The runtime of the winner was: ".$result->winner()->runtime()."\n");
```

Should the race job - for whichever reason - fail to complete successfully, a
Yothalot\RaceError is returned.

```php
class Yothalot\RaceError extends Yothalot\RaceResult
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

As you can see, the error result extends from the regular result. It also
evaluates to false when used in boolean context, which makes it easy to
check whether a race job executed successfully.

All the relevant information, the executable, arguments and the input is
available in this object to debug the error by running the task standalone.
The complete command to do this is returned by the Yothalot\RaceError::command()
method.
