# Feedback loops for clicks

If you enable click-tracking, the Marketing Suite rewrites all hyperlinks 
in your emails.  If someone clicks on one of these rewritten links, that user first goes to
the our website, where the click is registered, and is then immediately
redirected to the original URL. This all happens automatically and very fast, 
and is most of the time unnoticeable for your receiver. This technology
allows the Marketing Suite to track all clicks on your mails.

If you set up a click feedback loop, the Marketing Suite also notifies you in realtime
about these clicks. For each click we send a HTTP POST call (HTTPS is possible 
too) to your server with the relevant information about the click.


## Variables

With each POST call the following variables are sent over:

<table>
    <tr>
        <td>id</td>
        <td>unique identifier of the message that was clicked</td>
    </tr>
    <tr>
        <td>recipient</td>
        <td>email address of the person that clicked</td>
    </tr>
    <tr>
        <td>ip</td>
        <td>ip address of the clicker</td>
    </tr>
    <tr>
        <td>time</td>
        <td>time when the url was opened</td>
    </tr>
    <tr>
        <td>original</td>
        <td>the original url (this is the link to which the user was redirected)</td>
    </tr>
    <tr>
        <td>useragent</td>
        <td>optional user agent string (extracted from http request header)</td>
    </tr>
    <tr>
        <td>referer</td>
        <td>optional referer (extracted from http request header)</td>
    </tr>
    <tr>
        <td>tags</td>
        <td>the tags that you associated with the mail</td>
    </tr>
</table>

The "id", "recipient" and "tags" variables allow you to link the click to the 
originally sent email message.
