# REST API: GET impressions (Publisher destination)

You can retrieve the statistics per emailing destination just like you 
would retrieve the statistics of a mailing. You can 
retrieve the impressions for an emailing destination by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v3/publisher/destination/$id/impressions?access_token=xxxx`

Where the `$id` should be replaced with the ID of the emailing destination. This method 
also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** field.

## Returned fields

The method returns a JSON object with several impressions stored in the 'data' 
field. For each impression the following information is available:

* **ID**: The ID of the impression.        
* **timestamp**: The timestamp of the impression.
* **ip**: The IP from which the impression came.
* **useragent**: The user agent string of the user the impression came from.
* **referer**: The referer of the user the impression came from.
* **device**: The type of device the impression came from ('desktop','tablet','mobile','unknown').
* **emailing**: The ID of the mailing.
* **destination**: The ID of the destination.
* **profile**: The ID of the profile.
* **subprofile**: The ID of the subprofile (if applicable).

### JSON example

The JSON representation of a single impression might look somewhat like this:

```json
{  
   "ID":"44807",
   "timestamp":"2010-07-20 14:34:32",
   "ip":"0.0.0.0",
   "useragent":"Microsoft Outlook 2007, WinXP",
   "device":"desktop",
   "referer":null,
   "emailing":"1328",
   "destination":"822758",
   "profile":"2590894",
   "subprofile":null
}
```

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// set the period
$parameters = array(
    'fields'    =>  array('timestamp>2019-01-01', 'timestamp<2019-02-01')
);

// execute the call
print_r($api->get("publisher/destination/{$destinationID}/impressions/", $parameters));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher destination](./rest-get-publisher-destination)
* [Get abuses for a Publisher destination](./rest-get-publisher-destination-abuses)
* [Get clicks for a Publisher destination](./rest-get-publisher-destination-clicks)
* [Get deliveries for a Publisher destination](./rest-get-publisher-destination-deliveries)
* [Get errors for a Publisher destination](./rest-get-publisher-destination-errors)
* [Get unsubscribes for a Publisher destination](./rest-get-publisher-destination-unsubscribes)
