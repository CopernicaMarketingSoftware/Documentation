# Function MQ_log

_Available from MailerQ 5.6.5._

```c
/**
 *  Log priorities
 */
#define MQ_CRIT     1
#define MQ_WARN     2
#define MQ_INFO     3

/**
 *  Log something in the MailerQ application-log. This will be prepended
 *  by the priority and the time in the final log entry. 
 *  @param  priority
 *  @param  message 
 */
void MQ_log(int priority, const char *message);
```

This function is safe to be called from any thread simultaneously, and will log to the open MailerQ [application-log](logging#application-log) output streams as set in the settings. 

```c
MQ_log(MQ_CRIT, "log-1");
MQ_log(MQ_WARN, "log-2");
MQ_log(MQ_INFO, "log-3");
MQ_log(-1,      "log-invalid")
```

If the plugin contains the snippet above, upon execution the log outputs as specified to the application log outputs. If an incorrect priority is passed, as above, `(invalid priority)` will be prepended to the log line and it will be logged under info priority.

```txt
[Critical] [2019-09-23 12:46:56] [plugin] log-1 
[Warning]  [2019-09-23 12:46:56] [plugin] log-2 
[Info]     [2019-09-23 12:46:56] [plugin] log-3 
[Info]     [2019-09-23 12:46:56] [plugin] (invalid priority) log-invalid
```