# Function MQ_ev

Internally, MailerQ works with libev for registering timers and watching file descriptors and while some simplified wrapper functions are available for the MQ_Context, you might find it easier to work directly with libev instead.

```c

/**
 *  Retrieve the underlying libev event loop from
 *  the given context
 *
 *  @param  context the context to retrieve the loop from
 *  @return struct libev
 */
struct ev_loop *MQ_ev(MQ_Context *context);

```

The loop instance that is returned will already be running and since it is likely to be handling many other smtp and database connections it is highly discouraged to stop this loop, since it will most likely break other open connections. You should only use it for adding timers and filedescriptors to it.
