# REST API: GET clicks (Publisher testgroup)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. These are particularly useful in the case of testgroups 
to compare their results. Clicks are one of these statistics. You can 
retrieve the clicks for a testgroup by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v3/publisher/testgroup/$id/clicks?access_token=xxxx`

Where the `$id` should be replaced with the ID of the testgroup.

## Supported parameters

The method supports the 'unique' parameter. This is a boolean that indicates 
whether multiple clicks from a single destination are to be included.

## Returned fields

The method returns a JSON object with several clicks under the 'data' field. 
For each click the following information is available:

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

### JSON example

The JSON for a single click looks somewhat like this:

```json
{  
   "ID":"19431",
   "link_id":"3145",
   "link":"{webversion}",
   "link_title":"",
   "timestamp":"2010-11-03 15:07:33",
   "ip":"0.0.0.0",
   "useragent":"Firefox 3.6, WinXP",
   "referer":null,
   "emailing":"1914",
   "destination":"823456",
   "profile":"2290961",
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

// data for the call
$data = array(
    'unique'    =>  true
);

// execute the call
print_r($api->get("publisher/testgroup/{$testgroupID}/clicks/", $data));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher testgroup](./rest-get-publisher-testgroup)
* [Get abuses for a Publisher testgroup](./rest-get-publisher-testgroup-abuses)
* [Get deliveries for a Publisher testgroup](./rest-get-publisher-testgroup-deliveries)
* [Get errors for a Publisher testgroup](./rest-get-publisher-testgroup-errors)
* [Get impressions for a Publisher testgroup](./rest-get-publisher-testgroup-impressions)
* [Get unsubscribes for a Publisher testgroup](./rest-get-publisher-testgroup-unsubscribes)

