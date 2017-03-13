# Feedback loops for profile deletions

If you set up a profile deletion feedback loop, the Marketing Suite notifies
you in realtime whenever a profile or subprofile is deleted from your account's databases.
For each event we send an HTTP POST call (HTTPS is possible 
too) to your server with the relevant information about the profile that was removed.


## Variables

With each POST call the following variables are sent over:

<table>
    <tr>
        <td>profile / subprofile</td>
        <td>unique identifier of the profile/subprofile that was deleted</td>
    </tr>
    <tr>
        <td>action</td>
        <td>which action was performed on the profile ('create', 'update' or 'delete')</td>
    </tr>
    <tr>
        <td>timestamp</td>
        <td>time when the profile was deleted (in YYYY-MM-DD HH:MM:SS format)</td>
    </tr>
    <tr>
        <td>field_X</td>
        <td>value of the X field of the profile before it was deleted</td>
    </tr>
    <tr>
        <td>interest_N</td>
        <td>the N-th interest of the profile before it was deleted</td>
    </tr>
</table>

The "action" variable will always have the value 'delete'; this helps discern
these messages from messages that are sent when a profile is
[created](feedback-creates) or [updated](feedback-updates).
In case you want to restore the profile, the "field" and "interest" variables
show you the state of the profile's data as it was just before it was deleted.
