# REST API: GET clicks (Publisher mailing)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Clicks are one of these statistics. You can 
retrieve the clicks for an emailing by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v3/publisher/emailing/$id/clicks?access_token=xxxx`

Where the `$id` should be replaced with the ID of the emailing. This method 
also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** field.

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

// set the period
$parameters = array(
    'fields'    =>  array('timestamp>2019-01-01', 'timestamp<2019-02-01')
);

// execute the call
print_r($api->get("publisher/emailing/{$emailingID}/clicks/", $parameters));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher emailing](./rest-get-publisher-emailing)
* [Get abuses for a Publisher emailing](./rest-get-publisher-emailing-abuses)
* [Get deliveries for a Publisher emailing](./rest-get-publisher-emailing-deliveries)
* [Get errors for a Publisher emailing](./rest-get-publisher-emailing-errors)
* [Get impressions for a Publisher emailing](./rest-get-publisher-emailing-impressions)
* [Get unsubscribes for a Publisher emailing](./rest-get-publisher-emailing-unsubscribes)

