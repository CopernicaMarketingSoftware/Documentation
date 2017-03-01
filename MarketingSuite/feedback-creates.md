# Feedback loops for clicks

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
        <td>action</td>
        <td>which action was performed on the profile (create, update or delete)</td>
    </tr>
    <tr>
        <td>parameter_X</td>
        <td>value of the X parameter that the action was performed with</td>
    </tr>
    <tr>
        <td>timestamp</td>
        <td>time when the profile was created (in YYYY-MM-DD HH:MM:SS format)</td>
    </tr>
    <tr>
        <td>field_X</td>
        <td>value of the X field of the profile after creation</td>
    </tr>
    <tr>
        <td>interest_N</td>
        <td>value of the N-th interest of the profile after creation</td>
    </tr>
</table>

The "profile" or "subprofile" variable allows you to look up the profile that was just created.
