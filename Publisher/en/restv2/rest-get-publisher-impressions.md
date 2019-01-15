# REST API: GET impressions (Publisher)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Impressions are one of these statistics. You can 
retrieve all impressions by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/publisher/impressions?access_token=xxxx`

This method also support the use of the [fields parameter](./rest-fields-parameter) 
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
print_r($api->get("publisher/impressions/"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Get abuses for Publisher](./rest-get-publisher-abuses)
* [Get clicks for Publisher](./rest-get-publisher-clicks)
* [Get deliveries for Publisher](./rest-get-publisher-deliveries)
* [Get errors for Publisher](./rest-get-publisher-errors)
* [Get unsubscribes for Publisher](./rest-get-publisher-unsubscribes)
