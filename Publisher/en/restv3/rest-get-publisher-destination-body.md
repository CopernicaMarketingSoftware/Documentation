# REST API: GET destination/message body (Publisher)

You can retrieve the message body sent to a destination with an HTTP GET 
call to the URL corresponding to the desired output format. The URL 
always included the `$id`, which is the unique string that identifies a 
message.

Depending on the format the output looks different. **MIME** includes all 
the headers for example, while **text** only shows the plain text. Include the 
desired type in the URL. The default return format is HTML.

Note: The terms 'destination' and 'message' can be used interchangeably 
in this article, including the code examples.

## HTML

HTML stands for HyperText Language Markup/internet markup. To retrieve the 
HTML message body you can send a request to the following 
URL:

`https://api.copernica.com/v3/publisher/destination/$id/body?access_token=xxx`

or the following URL:

`https://api.copernica.com/v3/publisher/destination/$id/body/html?access_token=xxx`

## MIME

Mime is the internet standard for email. To retrieve the email in MIME 
format you can send the request to the following URL:

`https://api.copernica.com/v3/publisher/destination/$id/body/mime?access_token=xxx`

## Text

It's also possible to request the message body in plain text. The corresponding 
URL for this request is:

`https://api.copernica.com/v3/publisher/destination/$id/body/text?access_token=xxx`

## PHP example

To request the message body you can use a script like the one below:

```php
// import the helper class
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// retrieve the message body in the default format (HTML in this case)
print_r($api->get("publisher/destination/1044554/body"));

// retrieve the message body in HTML
print_r($api->get("publisher/destination/1044554/body/HTML"));

// retrieve the message body in MIME format
print_r($api->get("publisher/destination/1044554/body/mime"));

// retrieve the message body in text format
print_r($api->get("publisher/destination/1044554/body/text"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [GET destination](./rest-get-publisher-destination)
