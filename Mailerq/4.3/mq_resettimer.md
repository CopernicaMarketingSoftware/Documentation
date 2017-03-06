# Function MQ_TimerReset

This function is used to reset the timeout for a given timer without having to destroy and recreate the timer. 
This function may not be called on a timer that has already expired.

```c
/**
 *  Reset a timer
 *
 *  @param  timer   the timer to reset
 *  @param  timeout the new timeout for the timer
 */
void MQ_TimerReset(MQ_Timer *timer, float timeout);

```

For a detailed example, see [MQ_TimerStart](mq_timerstart)