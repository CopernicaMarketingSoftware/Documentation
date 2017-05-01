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
        <td>type</td>
        <td>which type of action was performed on the (sub)profile ('create', 'update' or 'delete')</td>
    </tr>
    <tr>
        <td>timestamp</td>
        <td>time when the (sub)profile was deleted (in YYYY-MM-DD HH:MM:SS format)</td>
    </tr>
</table>

The "action" variable will always have the value 'delete'; this helps discern
these messages from messages that are sent when a profile is
[created](feedback-creates) or [updated](feedback-updates).
Additional information about the profile or subprofile is also sent;
for profiles this consists of the following variables:

<table>
    <tr>
        <td>database</td>
        <td>unique identifier of the database to which the profile belongs</td>
    </tr>
</table>

For subprofiles, this consists of the following variables:

<table>
    <tr>
        <td>profile</td>
        <td>unique identifier of the profile to which this subprofile belongs</td>
    </tr>
    <tr>
        <td>database</td>
        <td>unique identifier of the database to which this subprofile belongs</td>
    </tr>
    <tr>
        <td>collection</td>
        <td>unique identifier of the collection to which this subprofile belongs</td>
    </tr>
</table>

## More information

* [Feedback loops](./feedback-loops)
* [Creation feedback](./feedback-creates)
* [Update feedback](./feedback-updates)

