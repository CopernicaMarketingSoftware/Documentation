# Click and open tracking

You can use SMTPeter's click tracking to figure out what attracts users' eyes. 
With click tracking enabled all links in emails sent through SMTPeter are 
rewritten. When a receiver clicks on such a rewritten link he or she will 
not open the original hyperlink, but a link to one of 
SMTPeter's web servers instead. SMTPeter intercepts the click and logs
it.

Of course, right after we've logged the click we redirect the user to
the original hyperlink. From a user's perspective it will appear as if 
the original link was opened.

We do the same with images. All image links in email messages are rewritten
too, such that the images are downloaded from the SMTPeter
servers instead of the original server. By doing this we know exactly
when someone opens an email, because we see the image download appear
in our log files.

## Enabling click tracking

Emails can be sent to SMTPeter using the [SMTP](smtp-api) and the 
[REST API](rest-api). Both API's allow you to enable click tracking. If
you use the REST API you can simply add a "trackclicks" property to
the JSON or POST data.

For the SMTP API there are two ways to do this. You either have to
add a "x-smtpeter-trackclicks" MIME header to your email or you have
to go to SMTPeter's dashboard to create SMTP credentials for which
clicktracking is enabled.

## Scam prevention

Some email programs show big warning if a clickable URL is connected to 
a different URL than the one that is visible.

````html
<a href="http://clicks.smtpeter.com/path/to/file">www.example.com</a>
````

The above link triggers a "this message might be scam" warning in some
email programs, because the link appears to go to "www.example.com", but
in reality the "clicks.smtpeter.com" website is opened.

If you want to prevent such scam warnings, you can instruct SMTPeter to
skip rewriting these type of hyperlinks. Alternatively you can also of 
course change the link text.

````html
<a href="http://clicks.smtpeter.com/path/to/file">my website</a>
````

## API and dashboard

All clicks and opens are logged. You can get access to these log files 
with the REST API. You therefore have access to all collected raw data.

On top of that, SMTPeter periodically processes the log files and 
extracts relevant data from it and puts this data on the dashboard. 
When you open the dashboard, you get direct insight into the best 
performing links.

An overview of all types of log files that we have is given in the table
below. You can visit the individual log file page to see what content they
hold.

| Log file                                              | Description                                           |
| ----------------------------------------------------- | ----------------------------------------------------- |
| [attempts log file](log-attempts "attempts log file") | information about all messages sent through SMTPeter  |
| [bounces log file](log-bounces "bounces log file")    | information about messages that bounced               |
| [clicks log file](log-clicks "clicks log file")       | information about the clicks generated                |
| [deliveries log file](log-deliveries)                 | information about the messages delivered              |
| [dmarc log file](log-dmarc)                           | information about received dmarc reports              |
| [failures log file](log-failures)                     | information about failed deliveries                   |
| [opens log file](log-opens "opens log file")          | information about when messages are opened            |
| [responses log file](log-responses)                   | information about response mails received by SMTPeter |


## Click tracking domain

When rewriting the links to detect the clicks, we do our best to make the
rewritten link look as much as the original. We leave the path intact and
only add a small identifier to the URL. We also change the original hostname
in the URL to a hostname that points to the SMTPeter web servers. By 
default, we use "clicks.smtpeter.com" for this. 

However, we recommend that you go to your dashboard and configure a different
click domain instead. To make your email campaigns more successful, you
can better use a click domain like "specialoffers.yourcompanyname.com". The
receivers of your messages will then already see your domain when they
hover their mouse over the hyperlinks, which gives them more confidence to
click.

## DNS configuration

If you install your own click domain, you must make sure that this domain 
leads back to the SMTPeter servers for the logging and redirection to work. 
The easiest way to do this is to create a DNS CNAME record towards 
"clicks.smtpeter.com". 

The exact way to do this depends on your DNS provider. If in doubt, please 
contact them for support.

## More information

* [WebHooks](./webhooks)
* [Downloading logfiles with REST](./rest-logfiles)
