# REST API: GET unsubscribes (Publisher)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Unsubscribes are one of these statistics. You can 
retrieve all unsubscribes by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v3/publisher/unsubscribes?access_token=xxxx`

This method also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** field.

## Returned fields

The method returns a JSON object with several unsubscribes in the 'data' field. 
For each unsubscribe the following information is available:

* **ID**: The ID of the unsubscribe. 
* **timestamp**: The timestamp of the unsubscribe.
* **source**: The source of the unsubscribe: Either from a link or an email.
* **success**: Whether the unsubscribe was successful or not.
* **emailing**: The ID of the emailing.
* **destination**: The ID of the destination.
* **profile**: The ID of the profile.
* **subprofile**: The ID of the subprofile (if applicable).

### JSON example

A single unsubscribe might look something like this:

```json
{  
   "ID":"1",
   "timestamp":"2011-11-09 12:42:35",
   "source":"link",
   "success":true,
   "emailing":"42341",
   "destination":"847259",
   "profile":"5063195",
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
print_r($api->get("publisher/unsubscribes/", $parameters));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Get abuses for Publisher](./rest-get-publisher-abuses)
* [Get clicks for Publisher](./rest-get-publisher-clicks)
* [Get deliveries for Publisher](./rest-get-publisher-deliveries)
* [Get errors for Publisher](./rest-get-publisher-errors)
* [Get impressions for Publisher](./rest-get-publisher-impressions)
