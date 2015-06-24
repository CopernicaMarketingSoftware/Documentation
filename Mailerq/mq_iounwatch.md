# Function MQ_IOUnwatch

This function will stop monitoring a file descriptor.

````c
/**
 *  Stop monitoring a file descriptor
 *
 *  @param  watcher the watcher to deactivate
 */
void MQ_IOUnwatch(MQ_IOWatcher *watcher);
````

For a more detailed example, see the [MQ_IOWatch](/documentation/mq_iowatch) documentation