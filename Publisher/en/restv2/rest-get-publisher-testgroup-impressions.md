# REST API: GET impressions (Publisher testgroup)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. These are particularly useful in the case of testgroups 
to compare their results. Impressions are one of these statistics. You can 
retrieve the impressions for a testgroup by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/publisher/emailing/$id/impressions?access_token=xxxx`

Where the `$id` should be replaced with the ID of the testgroup.

## Supported parameters

The method supports the 'unique' parameter. This is a boolean that indicates 
whether multiple impressions from a single destination are to be included.

## Returned fields

The method returns a JSON object with several impressions stored in the 'data' 
field. For each impression the following information is available:

* **ID**: The ID of the impression.        
* **timestamp**: The timestamp of the impression.
* **ip**: The IP from which the impression came.
* **useragent**: The user agent string of the user the impression came from.
* **device**: The type of device the impression came from ('desktop','tablet','mobile','unknown').
* **referer**: The referer of the user the impression came from.
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
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("publisher/testgroup/{$testgroupID}/impressions/", $parameters));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher testgroup](./rest-get-publisher-testgroup)
* [Get abuses for a Publisher testgroup](./rest-get-publisher-testgroup-abuses)
* [Get clicks for a Publisher testgroup](./rest-get-publisher-testgroup-clicks)
* [Get deliveries for a Publisher testgroup](./rest-get-publisher-testgroup-deliveries)
* [Get errors for a Publisher testgroup](./rest-get-publisher-testgroup-errors)
* [Get unsubscribes for a Publisher testgroup](./rest-get-publisher-testgroup-unsubscribes)
