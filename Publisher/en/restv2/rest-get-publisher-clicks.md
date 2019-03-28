# REST API: GET clicks (Publisher)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Clicks are one of these statistics. You can 
retrieve all clicks by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/publisher/clicks?access_token=xxxx`

This method also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** field.

## Returned fields

The method returns a JSON object with several clicks. For each click 
the following information is available:

* **ID**: ID of the click.
* **link_id**: ID of the link that was clicked.
* **link**: The link that was clicked.
* **link_title**: The title of the link that was clicked.
* **timestamp**: The timestamp of the click.
* **ip**: The IP where the click came from.
* **useragent**: The user agent string of the clicker.
* **referer**: The referer of the clicker.
* **emailing**: The ID of the emailing where the click came from.
* **destination**: The destination where the click came from.
* **profile**: The profile where the click came from.
* **subprofile**: The subprofile where the click came from (if applicable).

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("publisher/clicks/"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Get abuses for Publisher](./rest-get-publisher-abuses)
* [Get deliveries for Publisher](./rest-get-publisher-deliveries)
* [Get errors for Publisher](./rest-get-publisher-errors)
* [Get impressions for Publisher](./rest-get-publisher-impressions)
* [Get unsubscribes for Publisher](./rest-get-publisher-unsubscribes)

