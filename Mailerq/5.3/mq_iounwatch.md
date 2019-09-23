# Function MQ_ioUnwatch

This function will stop monitoring a file descriptor.

````c
/**
 *  Stop monitoring a file descriptor
 *
 *  @param  watcher the watcher to deactivate
 */
void MQ_ioUnwatch(MQ_IOWatcher *watcher);
````

For a more detailed example, see the [MQ_ioWatch](mq_iowatch) documentation
