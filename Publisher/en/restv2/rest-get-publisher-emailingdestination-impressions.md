# REST API: GET impressions (Publisher mailing destination)

You can retrieve the statistics per emailing destination just like you 
would retrieve the statistics of a mailing. You can 
retrieve the impressions for an emailing destination by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/publisher/emailingdestination/$id/impressions?access_token=xxxx`

Where the `$id` should be replaced with the ID of the emailing destination. This method 
also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** field.

## Returned fields

The method returns a JSON object with several impressions. For each impression 
the following information is available:

* **ID**: The ID of the impression.        
* **timestamp**: The timestamp of the impression.
* **ip**: The IP from which the impression came.
* **user-agent**: The user agent string of the user the impression came from.
* **referer**: The referer of the user the impression came from.
* **emailing**: The ID of the mailing.
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
print_r($api->get("publisher/emailingdestination/{$emailingDestinationID}/impressions/"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher emailing destination](./rest-get-publisher-emailingdestination)
* [Get abuses for a Publisher emailing destination](./rest-get-publisher-emailingdestination-abuses)
* [Get clicks for a Publisher emailing destination](./rest-get-publisher-emailingdestination-clicks)
* [Get deliveries for a Publisher emailing destination](./rest-get-publisher-emailingdestination-deliveries)
* [Get errors for a Publisher emailing destination](./rest-get-publisher-emailingdestination-errors)
* [Get unsubscribes for a Publisher emailing destination](./rest-get-publisher-emailingdestination-unsubscribes)
