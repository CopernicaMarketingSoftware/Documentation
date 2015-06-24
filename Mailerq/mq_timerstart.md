# Function MQ_TimerStart

This function starts a timer. When the given time runs out, the callback will be invoked, unless the timer is stopped first with [MQ_TimerStop](/documentation/mq_timerstop).

```c
/**
 *  Start a timer
 *
 *  @param  context     the context to start the timer in
 *  @param  timeout     the number of seconds to wait before invoking the callback
 *  @param  callback    the callback to invoke when the timer runs out
 *  @param  data        customer user data to provide to the callback
 */
MQ_Timer *MQ_TimerStart(MQ_Context *context, float timeout, void(*callback)(void *data), void *data);

```

Using timer functionality, we can amend the example for the [MQ_IOWatch](/documentation/mq_context#mq_iowatch) function so that it times out when no input is entered for at least five seconds.

```c
#include <mailerq.h>
#include <string.h>
#include <stdio.h>

/**
 *  Structure that references both timers
 */
struct Timers
{
    /**
     *  The IO watcher
     */
    MQ_IOWatcher *io;

    /**
     *  The timer
     */
    MQ_Timer *timer;
};

/**
 *  Callback function to receive standard input
 *
 *  @param  watcher the watcher that is monitoring the file descriptor
 *  @param  fd      the file descriptor that received events
 *  @param  data    custom data pointer
 */
void io_callback(MQ_IOWatcher *watcher, int fd, int events, void *data)
{
    // buffer for data to process
    char    data[1024];
    ssize_t length;

    // retrieve the timers
    struct Timers *timers = (struct Timers*)data;

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

        // deactive the timer
        MQ_TimerStop(timers->timer);

        // clean up the timers
        free(timers);
    }
    else
    {
        // reset the timer to five seconds
        MQ_TimerReset(timers->timer, 5.0);
    }
}

/**
 *  Callback function for an expiring timer
 *
 *  @param  data    custom user data
 */
void timer_callback(void *data)
{
    // get the timers
    struct Timers *timers = (struct Timers*)data;

    // we did not receive any input for 5 seconds
    // so we stop listening to input
    MQ_IOUnwatch(timers->io);

    // and free the timers
    free(timers);
}

/**
 *  Monitor standard input for data
 *
 *  @param  context the context to monitor in
 */
void monitor(MQ_Context *context)
{
    // create the structure holding the timers
    Timers *timers = malloc(sizeof(struct Timers));

    // set the context
    timers->context = context;

    // monitor stdin for input
    timers.io = MQ_IOWatch(context, STDIN, MQ_READ, callback, timers);

    // and stop monitoring after five seconds
    timers.timer = MQ_TimerStart(context, 5.0, timer_callback, timers);
}

```