# Feedback loops for profile creations

If you set up a profile creation feedback loop, the Marketing Suite notifies
you in realtime whenever a profile or subprofile is created within your account's databases.
For each event we send an HTTP POST call (HTTPS is possible 
too) to your server with the relevant information about the newly created profile.


## Variables

With each POST call the following variables are sent over:

<table>
    <tr>
        <td>profile / subprofile</td>
        <td>unique identifier of the profile/subprofile that was created</td>
    </tr>
    <tr>
        <td>type</td>
        <td>which type of action was performed on the (sub)profile ('create', 'update' or 'delete')</td>
    </tr>
    <tr>
        <td>parameters</td>
        <td>parameters that the action was performed with</td>
    </tr>
    <tr>
        <td>timestamp</td>
        <td>time when the (sub)profile was created (in YYYY-MM-DD HH:MM:SS format)</td>
    </tr>
</table>

The "action" variable will always have the value 'create'; this helps discern
these messages from messages that are sent when a profile is
[updated](feedback-updates) or [deleted](feedback-deletes).
Additional information about the profile or subprofile is also sent;
for profiles this consists of the following variables:

<table>
    <tr>
        <td>ID</td>
        <td>unique identifier of the profile</td>
    </tr>
    <tr>
        <td>database</td>
        <td>unique identifier of the database to which the profile belongs</td>
    </tr>
    <tr>
        <td>fields</td>
        <td>current fields of the profile</td>
    </tr>
    <tr>
        <td>interests</td>
        <td>current interests of the profile</td>
    </tr>
    <tr>
        <td>created</td>
        <td>time when the profile was created (in YYYY-MM-DD HH:MM:SS format)</td>
    </tr>
    <tr>
        <td>modified</td>
        <td>time when the profile was modified (in YYYY-MM-DD HH:MM:SS format)</td>
    </tr>
</table>

For subprofiles, this consists of the following variables:

<table>
    <tr>
        <td>ID</td>
        <td>unique identifier of the subprofile</td>
    </tr>
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
    <tr>
        <td>fields</td>
        <td>current fields of the subprofile</td>
    </tr>
    <tr>
        <td>created</td>
        <td>time when the subprofile was created (in YYYY-MM-DD HH:MM:SS format)</td>
    </tr>
    <tr>
        <td>modified</td>
        <td>time when the subprofile was modified (in YYYY-MM-DD HH:MM:SS format)</td>
    </tr>
</table>

Associative arrays such as "parameters" and "fields" are sent per key-value pair,
e.g. *parameters[key]=value*.
Arrays such as "interests" are sent per item, e.g. *interests[]=xyz*.

## More information

* [Feedback loops](./feedback-loops)
* [Update feedback](./feedback-updates)
* [Delete feedback](./feedback-deletes)
