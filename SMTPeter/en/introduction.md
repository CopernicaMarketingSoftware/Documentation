# Getting started with SMTPeter

SMTPeter is a cloud based email gateway which can be used to send all sorts of mail from all sorts of devices, whether it be bulk mailings, transactional emails or personal messages. We make sure all of your messages are perfect: they are automatically preprocessed, archived and signed before being sent to their recipient.

Connecting SMTPeter to your application is an easy task. It all comes down to two simple tasks (besides registering, of course): creating a Sender Domain and connecting to one of the two APIs. After you’ve done that, you’re ready to send email using SMTPeter. Below, we’ll explain how to do this.

## Setting up a Sender Domain

SMTPeter uses the so-called Sender Domain technology to drastically simplify authenticating emails and jack up your sender reputation. It’s a pretty simple concept: the user sets up some recommended DNS settings that point to SMTPeter’s servers, and SMTPeter does everything else. That way, you never have to worry about complex things like SPF, DKIM and DMARC or your tracking domains. [This article](sender-domains) explains everything in detail, but for now we just want to explain how to set up your sender domain.

The Sender Domains module can be found under the ‘Account configuration’ tab in the application. The interface speaks for itself: click ‘Setup sender domain’ and then ‘Add sender domain’ and follow the steps. Don’t worry about your click- and tracking domains or the DMARC deployment, you can always edit them later on.

Once you’ve incorporated the recommended settings in your DNS, your domain is ready to be verified. After you’ve created your sender domain, a warning message about verification is displayed in SMTPeter with a code in it. This code needs to be added to your DNS as well. Once SMTPeter has seen this record, we believe the domain is truly yours and it will be ready to use.

## The REST API

If you’re planning on using the REST API to send emails, all you have to do is generate an access token. You can do so by going to the configuration tab and clicking ‘REST API’ in the ‘APIs’ section. Here, you’ll find your token and the possibility to create a new one in case you need it. We recommend using the REST API, because it supports a number of options the SMTP API does not support, such as statistics and handling JSON files.

Once you’ve got your access token, the API is accessible via the following URL, in which METHOD needs to be replaced by the method you want to use and YOUR_ACCESS_TOKEN needs to be your actual access token.

`https://www.smtpeter.com/v1/METHOD?access_token=YOUR_API_TOKEN`

## The SMTP API

Instead of the REST API, the traditional SMTP API can also be used to connect with SMTPeter. This API is best used when connecting to traditional email clients such as Outlook and Thunderbird, and when connecting to mobile devices. With the SMTP API, it is also possible to set the standard SMTP user options in the interface using toggle switches.

In order to use the SMTP API, you must create a valid username and password in the application. Remember these well, because you will only see them once!

Of course it's also possible to connect to both APIs. That way, you can use the features you like best from both.

Once you’ve gone through these steps, you’re ready to start sending email and exploring what SMTPeter has to offer!

More information:
[Sender Domains](sender-domains)
[SMTP API](smtp-api)
[REST API](rest-api)



