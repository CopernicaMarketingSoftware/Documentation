# REST API: GET emailing destination (Publisher)

You can use the REST API to retrieve a summary of a mailing destination with an HTTP 
GET call to the following URL:

`https://api.copernica.com/v2/publisher/emailingdestination/$id?access_token=xxxx`

Where `$id` should be replaced with the ID of the mailing destination you want summarized. 
This method also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** field.

## Returned fields

The method returns a JSON object containing the following information:

* **ID**: The ID of the destination.
* **timestampsent**: The timestamp on which the mailing was sent to this recipient.
* **internal**: The internal ID of the destination.
* **profile**: The ID of the profile of the destination.
* **subprofile**: The ID of the subprofile of the destination (if applicable).
* **mailing**: The ID of the mailing.

## PHP example

The script below demonstrates how to use this API method. Don't forget 
to replace the ID in the URL before executing the call.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("publisher/emailingdestination/{$emailingDestinationID}"));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
