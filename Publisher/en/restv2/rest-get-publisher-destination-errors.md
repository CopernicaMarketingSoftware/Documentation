# REST API: GET errors (Publisher destination)

You can retrieve the statistics per emailing destination just like you 
would retrieve the statistics of a mailing. You can 
retrieve the errors for an emailing destination by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/publisher/destination/$id/errors?access_token=xxxx`

Where the `$id` should be replaced with the ID of the emailing destination. This method 
also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** field.

## Returned fields

The method returns a JSON object with the errors stored in the 'data' field. 
For each error the following information is available:

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

### JSON example

The JSON for a single error looks similar to this:

```json
{  
   "ID":"16",
   "timestamp":"2008-06-25 14:23:05",
   "errorcode":"5.1.2",
   "description":"Resolver error: no mailservers found for domain",
   "errortype":"nohost",
   "errortypedescription":"Map domain name to IP address",
   "emailing":"401",
   "destination":"54215",
   "profile":"52647",
   "subprofile":null
}
```

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// set the period
$parameters = array(
    'fields'    =>  array('timestamp>2019-01-01', 'timestamp<2019-02-01')
);

// execute the call
print_r($api->get("publisher/destination/{$destinationID}/errors/", $parameters));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher destination](./rest-get-publisher-destination)
* [Get abuses for a Publisher destination](./rest-get-publisher-destination-abuses)
* [Get clicks for a Publisher destination](./rest-get-publisher-destination-clicks)
* [Get deliveries for a Publisher destination](./rest-get-publisher-destination-deliveries)
* [Get impressions for a Publisher destination](./rest-get-publisher-destination-impressions)
* [Get unsubscribes for a Publisher destination](./rest-get-publisher-destination-unsubscribes)



