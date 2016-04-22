# SMTP credentials

You need a valid login/password combination to access the SMTP API.
These credentials have to be included in the SMTP handshake before
you send the first message over the connection. SMTPeter supports both
the "AUTH PLAIN" as well as the "AUTH LOGIN" authentication mechanism.
The credentials must be sent over a secured connections, either
because you set up a connection using [port 465](smtp-ports) or
after you've secured the connection with "STARTTLS".

The login/password combinations can be created and modified via
the SMTPeter dashboard. The number of logins that you create is not
limited.


## Credential settings

Because the SMTP protocol does not really allow parameter passing,
SMTPeter uses an alternative way to specify the features that you like
to use for the submitted messages.

For every login/password pair that you create, you can enable or disable
the required SMTPeter features. You can create multiple logins, and
install a different feature set for each login. When you send out mail,
you use login/password combination that supports the features that 
you need.

<table>
    <tr>
        <td>clicktracking</td>
        <td>modify hyperlinks to track clicks</td>
    </tr>
    <tr>
        <td>openstracking</td>
        <td>modify image urls to track opens</td>
    </tr>
    <tr>
        <td>preventscam</td>
        <td>do not modify links that would trigger scam warnings</td>
    </tr>
    <tr>
        <td>bouncetracking</td>
        <td>change envelope address to collect bounces</td>
    </tr>
    <tr>
        <td>inlinecss</td>
        <td>modify html code to contain inline css attributes</td>
    </tr>
</table>

The above table holds all the properties that can be associated with a
login/password pair. When you use the dashboard to create a login, you
can select the features to use for that login.


## Delivery Status Notifications

If you use the [bounce-tracking feature](bounce-handling), SMTPeter
replaces the envelope address and delivers the mail using its own 
envelope address. In that case all bounces end up at SMTPeter, and you 
will not receive any Delivery Status Notification (DSN) messages. You 
should use the REST API, the dashboard or the feedback loops to be 
informed about these errors.

However, if you do not hand over the bounce handling to SMTPeter, 
SMTPeter behaves as a normal MTA and sends back DSN messages to your
envelope address when anything goes wrong. If you inject mails using
a traditional email client like Thunderbird or Outlook, we recommend
not to enable bounce handling, because you probably want to receive
the bounces for these individual emails in your own inbox right after
you've submitted the mail.

SMTPeter also supports the SMTP DSN extension, meaning that you can
pass parameters to the "MAIL FROM" and "RCPT TO" commands that control
when and what kind of DSN messages you would like to receive.
