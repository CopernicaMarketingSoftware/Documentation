# REST API: GET errors (Publisher)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Errors are one of these statistics. You can 
retrieve all errors by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/errors?access_token=xxxx`

This method also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** field.

## Returned fields

The method returns a JSON object with several errors. For each error  
the following information is available:

* **ID**: The ID of the error.          
* **timestamp**: The timestamp on which the error occurred.
* **errorcode**: The error code.
* **description**: The description of the error that was returned by the SMTP server.
* **errortype**: The type of the error ('nocontent', 'nohost', 'unreachable', 'unexpected', 'error', 'mailerror', 'mailmessage', 'nodata', 'privateiprange' or 'other'). 
* **errortypedescription**: The description of the error based on the type.
* **emailing**: The ID of the emailing.
* **destination**: The ID of the destination.
* **profile**: The ID of the profile.
* **subprofile**: The ID of the subprofile (if applicable).

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("publisher/errors/"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Get abuses for Publisher](./rest-get-publisher-abuses)
* [Get clicks for Publisher](./rest-get-publisher-clicks)
* [Get deliveries for Publisher](./rest-get-publisher-deliveries)
* [Get impressions for Publisher](./rest-get-publisher-impressions)
* [Get unsubscribes for Publisher](./rest-get-publisher-unsubscribes)



