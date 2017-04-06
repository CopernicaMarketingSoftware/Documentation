# Feedback loops for profile updates

If you set up a profile update feedback loop, the Marketing Suite notifies
you in realtime whenever a profile or subprofile is updated within your account's databases.
For each event we send an HTTP POST call (HTTPS is possible 
too) to your server with the relevant information about the profile at the time of the update.


## Variables

With each POST call the following variables are sent over:

<table>
    <tr>
        <td>profile / subprofile</td>
        <td>unique identifier of the profile/subprofile that was updated</td>
    </tr>
    <tr>
        <td>action</td>
        <td>which action was performed on the profile ('create', 'update' or 'delete')</td>
    </tr>
    <tr>
        <td>parameter_X</td>
        <td>value of the X parameter that the action was performed with</td>
    </tr>
    <tr>
        <td>timestamp</td>
        <td>time when the profile was updated (in YYYY-MM-DD HH:MM:SS format)</td>
    </tr>
    <tr>
        <td>field_X</td>
        <td>value of the X field of the profile directly after the update</td>
    </tr>
    <tr>
        <td>interest_N</td>
        <td>the N-th interest of the profile directly after the update</td>
    </tr>
</table>

The "action" variable will always have the value 'update'; this helps discern
these messages from messages that are sent when a profile is
[created](feedback-creates) or [deleted](feedback-deletes).
The "profile" or "subprofile" variable allows you to look up the profile that was modified.

## More information
* [Feedback loops](./feedback-loops)
* [Creation feedback](./feedback-creates)
* [Delete feedback](./feedback-deletes)
