# REST API: GET destination errors (Marketing Suite)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Errors are one of these statistics. You can 
retrieve all errors for a specific destination by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/ms/destination/{$destinationID}/errors?access_token=xxxx`

This method also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** field.

## Returned fields

The method returns a JSON object with several errors. For each error 
the following information is available:

**ID**: The ID of the error.
**mailing**: The ID of the mailing.
**timestamp**: The timestamp of the error.
**status**: The status of the error.
**errorcode**: The code associated with this error.
**description**: A description of the error.
**errortype**: The type of error this was recognized as.
**destination**: The ID of the destination that caused an error.
**profile**: The ID of the profile that caused an error.
**subprofile**: The ID of the subprofile that caused an error.

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("ms/destination/{$destinationID}/errors"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Get all errors](./rest-get-ms-errors)
* [Get destination abuses](./rest-get-ms-destination-abuses)
* [Get destination clicks](./rest-get-ms-destination-clicks)
* [Get destination deliveries](./rest-get-ms-destination-deliveries)
* [Get destination impressions](./rest-get-ms-destination-impressions)
