# Yothalot\Pool

If you want to run multiple jobs at the same time, you can make use of the 
Yothalot\Pool class. This Pool class allows you to group multiple jobs, and 
wait for the first one to complete. The Pool class makes sure all jobs are
started at the same time.

```php
class Yothalot\Pool
{
    // constructor
    public function __construct();
    
    // adding jobs to the pool
    public function add(Yothalot\Job $job);

    // fetch and remove a job that is ready (returns null if all jobs are still running)
    public function fetch();

    // wait for a job to complete, and return that job
    public function wait();
    
    // pool size
    public function size();
}
```

## Example use

The following example demonstrates how to use the class. You can simply
add jobs to the pool, and then wait for the first job to complete.

```php
// create a pool in which we are going to group jobs
$pool = new Yothalot\Pool();

// add multiple jobs to the pool
$pool->add($job1);
$pool->add($job2);
$pool->add($job3);

// keep running
while ($pool->size() > 0)
{
    // wait for the first job to be ready (this is a blocking call)
    $job = $pool->wait();
    
    // get the result from the job (we $job->wait() call will immediately 
    // return, because we know that the job is already finished)
    $result = $job->wait();
}
```

The wait method returns a Yothalot\Job object. The returned object is guaranteed
to be ready, so you can immediately fetch the result from it. The returned job 
is automatically removed from the pool.

