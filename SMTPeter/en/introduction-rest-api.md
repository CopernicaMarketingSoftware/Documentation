# Configure REST API

If you’re planning on using the REST API to send emails, all you have to 
do is generate an access token. You will later on use this token to make 
your calls. Go to the configuration tab and click on `REST API` in the 
APIs section. Here, you’ll find your token and the possibility to create 
a new one in case you need it. We recommend using the REST API, because 
it supports a number of options the SMTP API does not support, such as 
statistics and handling JSON files.

Once you’ve got your access token, the API is accessible via the 
following URL, in which METHOD needs to be replaced by the method you 
want to use and YOUR_ACCESS_TOKEN needs to be your actual access token.

`https://www.smtpeter.com/v1/METHOD?access_token=YOUR_API_TOKEN`

We've made a few examples in different programming languages. With these 
classes, you can set up a connection with the REST API. This way, no 
low-level calls have to be written and you can start using SMTPeter directly.

* [PHP example](php-example "PHP example")
* [Python example](python-example "Python example")


## More information

* [Getting started](./introduction)
* [Getting started with SMTP API](./introduction-smtp-api)
* [REST API](rest-api)