# Getting started 

SMTPeter is a *cloud based email gateway* which takes care of sending emails, the easy way.
You can choose to send email via the REST API or the SMTP API.
After registering, you only need a few things to do in order to start with SMTPeter:

* In the SMTPeter dashboard, set up your domain from which you want to send emails;
* Set up the correct DNS records, so that SMTPeter can send email out of your name;
* Set up **login credentials** to acces the **API**.


## Setting up a Sender Domain

The sender domains module can be found under the `Account configuration` tab in the application. 
The interface speaks for itself: click `Setup sender domain` and then `Add sender domain` and 
follow the steps. Don’t worry about your click- and tracking domains or the DMARC deployment, 
you can always edit them later on.

Once you’ve incorporated the recommended settings in your DNS, your domain is ready to be verified. 
After you’ve created your sender domain, a warning message about verification is displayed in
SMTPeter with a code in it. This code needs to be added to your DNS as well. Once SMTPeter has 
seen this record, we believe the domain is truly yours and it will be ready to use.

[Click here for more information about sender domains](sender-domains)


## REST vs SMTP

SMTPeter lets you send email via the REST- and SMTP API. We highly suggest that, if you have the 
option to choose, you use the REST API. This API gives you more options, freedom and is more 
user-friendly overall. On top of that, the REST API is much quicker, because no complex and timeconsuming
*SMTP handshake* is required. 


## REST API

If you’re planning on using the REST API to send emails, all you have to do is generate an access token. 
You can do so by going to the configuration tab and clicking ‘REST API’ in the ‘APIs’ section. Here, 
you’ll find your token and the possibility to create a new one in case you need it. We recommend using 
the REST API, because it supports a number of options the SMTP API does not support, such as statistics 
and handling JSON files.

Once you’ve got your access token, the API is accessible via the following URL, in which METHOD needs to 
be replaced by the method you want to use and YOUR_ACCESS_TOKEN needs to be your actual access token.

`https://www.smtpeter.com/v1/METHOD?access_token=YOUR_API_TOKEN`

We've made a few examples in different programming languages. With these classes, you can set up a connection 
with the REST API. This way, no low-level calls have to be written and you can start using SMTPeter directly.

* [PHP example](php-example "PHP example")
* [Python example](python-example "Python example")


## SMTP API

Instead of the REST API, the traditional SMTP API can also be used to connect with SMTPeter. This API is 
best used when connecting to traditional email clients such as Outlook and Thunderbird, and when connecting 
to mobile devices. With the SMTP API, it is also possible to set the standard SMTP user options in the 
interface using toggle switches.

In order to use the SMTP API, you must create a valid username and password in the application. Remember 
these well, because you will only see them once!
Of course it's also possible to connect to both APIs. That way, you can use the features you like best 
from both.

That's everything! SMTPeter is now ready to be utilized. 
Read more about what SMTPeter has to offer:

- [Sender Domains](sender-domains)
- [SMTP API](smtp-api)
- [REST API](rest-api)

