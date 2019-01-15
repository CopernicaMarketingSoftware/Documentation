# REST API: GET errors (Publisher mailing destination)

You can retrieve the statistics per emailing destination just like you 
would retrieve the statistics of a mailing. You can 
retrieve the errors for an emailing destination by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/publisher/emailingdestination/$id/errors?access_token=xxxx`

Where the `$id` should be replaced with the ID of the emailing destination. This method 
also support the use of the [fields parameter](./rest-fields-parameter) 
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
print_r($api->get("publisher/emailingdestination/{$emailingDestinationID}/errors/"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher emailing destination](./rest-get-publisher-emailingdestination)
* [Get abuses for a Publisher emailing destination](./rest-get-publisher-emailingdestination-abuses)
* [Get clicks for a Publisher emailing destination](./rest-get-publisher-emailingdestination-clicks)
* [Get deliveries for a Publisher emailing destination](./rest-get-publisher-emailingdestination-deliveries)
* [Get impressions for a Publisher emailing destination](./rest-get-publisher-emailingdestination-impressions)
* [Get unsubscribes for a Publisher emailing destination](./rest-get-publisher-emailingdestination-unsubscribes)



