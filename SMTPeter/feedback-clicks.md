# Feedback loops for clicks

SMTPeter can rewrite hyperlinks in emails to track clicks. When someone
clicks on one of these rewritten links, the click is redirected over the
SMTPeter webservers before it is forwarded to the actual website, so that
we can log the click and use it for statistics.

If you set up a click feedback loop, we will notify you in realtime
about each click that we registered. For each click we send a HTTP POST
call (HTTPS is possible too) to your server with the relevant information
about the click.


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
        <td>url</td>
        <td>the clicked url (the link <i>before</i> it was rewritten)</td>
    </tr>
    <tr>
        <td>useragent</td>
        <td>optional user agent string (extracted from http request header)</td>
    </tr>
    <tr>
        <td>referer</td>
        <td>optional referer (extracted from http request header)</td>
    </tr>
</table>

The "id" and "recipient" variables allow you to link the click to the 
originally sent email message.
