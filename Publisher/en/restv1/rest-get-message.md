# REST API: GET message

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv2/rest-api.md) of the REST API.

If you want to get some general information from a mail sent with Marketing
Suite you can make a simple a GET request to the following URL:

`https://api.copernica.com/v1/message/$id?access_token=xxxx`

where `$id` is the unique string that identifies a message. 

## Return value

A JSON with the general information about the message.

## PHP Example

The following PHP script demonstrates how to use the API method.

```php
// dependencies
require_once('copernica_rest_api.php');
   
// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// do the call, and print result
print_r($api->get("message/AMRJHv989dfds"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
