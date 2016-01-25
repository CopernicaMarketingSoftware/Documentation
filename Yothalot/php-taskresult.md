# Information about the task

When you run a task you may be interested in feedback from your task. You may
also want to have some statistics on how long the task has ran. This information
is proved in the Yothalot\TaskResult class.

We provide you all the information about a finished task in the **Yothalot\TaskResult** class.
This **Yothalot\TaskResult** class holds results on the behavior of a job.
You cannot create a results class yourself as this would not make any sense,
yet, **Yothalot\TaskResult** classes are returned by the `wait()` method of the
**Yothalot\Job class**. The class provides you all the information on the
behaviour of the job you want and probably some extra. However, if there is relevant
information that you would like to have but is currently not provided,
please contact us by sending an email to [info@copernica.com](mailto:info@copernica.com).

## Yothalot\TaskResult

The **Yothalot\TaskResult** class provides the general information of the job, i.e.
the time when the job was started and the runtime. The class also gives
you access to a class that holds statistics on the winner of the race.
The interface of the Yothalot\TaskResult class looks as follows:

```php
class Yothalot\TaskResult
{
public:
    /**
     *  Get the time when the task is started (in Unix time)
     */
    public function started();

    /**
     *  Get the time when the task is finished (in Unix time)
     */
    public function finished();

    /**
     *  Get the total runtime
     */
    public function runtime();

    /**
     *  Get the result
     */
    public function result();
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