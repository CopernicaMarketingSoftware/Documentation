# REST API: GET template body (Marketing Suite)

If you want to retrieve the body of a template created with Marketing Suite 
you can send a GET request to the following URL:

`https://api.copernica.com/v3/ms/template/$id/body/$type?access_token=xxx`

where `$id` is the ID of the template and `$type` is 
the format for the message.

## Types

The message can be returned in three formats:

* **MIME**: Internet standard for email
* **HTML**: HyperText Language Markup/internet markup
* **Text**: Simple plain text

Depending on the format the output looks different. **MIME** includes all 
the headers for example, while **text** only shows the plain text. Include the 
desired type in the URL.

## PHP example

The script below demonstrates how to use this API method. Don't forget 
to replace the ID in the URL before executing the call.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("ms/template/{$templateID}/body/mime"));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
* [GET template](./rest-get-ms-template)
