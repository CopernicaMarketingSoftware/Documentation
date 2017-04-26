# Feedback loops for opens

The Marketing Suite can rewrite image links in emails to track opens. When an email
is opened for which this option was set, the image will not be downloaded from your
own server, but from the cache on our web servers instead. This
allows us to track all opens and to use that for statistics.

If you set up a feedback loop for opens, the Marketing Suite notifies you in realtime
about each registered image download. For each open that we monitor we send 
a HTTP POST call (HTTPS is possible too) to your server with the relevant 
information about the open. 

Note: this might generate a lot of traffic, so be sure that your server is capable
of handling this.

## Variables

With each POST call the following variables are passed to your script:

<table>
    <tr>
        <td>id</td>
        <td>unique identifier of the message that was opened</td>
    </tr>
    <tr>
        <td>recipient</td>
        <td>email address of the person that opened the mail</td>
    </tr>
    <tr>
        <td>ip</td>
        <td>ip address of the opened</td>
    </tr>
    <tr>
        <td>time</td>
        <td>time when the url was opened</td>
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

The "id", "recipient" and "tags" variables allow you to link the open to the 
originally sent email message.

## More information

* [Feedback loops](./feedback-loops)
