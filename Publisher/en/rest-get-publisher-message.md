# REST API: GET message (Publisher)

If you want to get some general information from a mail sent with Publisher
you can make a simple a GET request to the following URL:

`https://api.copernica.com/v2/publisher/message/$id?access_token=xxxx`

where `$id` is the unique string that identifies a message. 

You can find the call to retrieve a Marketing Suite message [here](./rest-get-ms-message).

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
print_r($api->get("publisher/message/{$messageID}"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
