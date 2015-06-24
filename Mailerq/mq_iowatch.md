# Function MQ_IOWatch

This function will start monitoring a file descriptor for the requested events.
When one (or more) of these events occur, the given callback will be invoked.

````c
/**
 *  Monitor a file descriptor for activity
 *
 *  @param  context     the context to register the file descriptor in
 *  @param  fd          the file descriptor to monitor
 *  @param  events      the events to monitor, binary or'ed MQ_READ and/or MQ_WRITE
 *  @param  callback    callback to invoke when one or more of the events occur
 *  @param  data        custom data to supply to the callback
 */
MQ_IOWatcher *MQ_IOWatch(MQ_Context *context, int fd, int events, void(*callback)(MQ_IOWatcher *watcher, int fd, int events, void *data), void *data);
````

As an example, we will read from the standard input until an empty line is found, at which point we will stop listening to the input. This example makes no sense for a MailerQ plugin, but will illustrate the point.

````c
#include <mailerq.h>
#include <string.h>
#include <stdio.h>

/**
 *  Callback function to receive standard input
 *
 *  @param  watcher the watcher that is monitoring the file descriptor
 *  @param  fd      the file descriptor that received events
 *  @param  data    custom data pointer
 */
void callback(MQ_IOWatcher *watcher, int fd, int events, void *data)
{
    // buffer for data to process
    char    data[1024];
    ssize_t length;

    // we are working with STDIN, which is never writable
    // (because that's what we have STDOUT for), so we don't
    // have to check the events variable, otherwise we could
    // check for readability or writability like this:
    //
    // events & MQ_READ
    // events & MQ_WRITE

    // normally, when we check for readability we should not
    // assume that we are receiving complete lines, however
    // STDIN is line-buffered, so the callback is only invoked
    // whenever the user presses return after input

    // read data from input
    length = read(fd, data, sizeof(data));

    // if there are only two characters we received an empty line
    // since the line includes the CRLF produced by the terminal
    if (length == 2)
    {
        // stop watching the file descriptor
        MQ_IOUnwatch(watcher);
    }
    else
    {
        // process the data here
    }
}

/**
 *  Monitor standard input for data
 *
 *  @param  context the context to monitor in
 */
void monitor(MQ_Context *context)
{
    // monitor stdin for input
    MQ_IOWatch(context, STDIN, MQ_READ, callback, NULL);
}
````