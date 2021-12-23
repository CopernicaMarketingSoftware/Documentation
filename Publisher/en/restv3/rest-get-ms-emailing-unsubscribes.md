# REST API: GET emailing unsubscribes (Marketing Suite)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Unsubscribes are one of these statistics. You can 
retrieve all unsubscribes by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v3/ms/emailing/{$emailingID}/unsubscribes?access_token=xxxx`

## Parameters

The following optional parameters are available:

* **begintime**: The timestamp after which the unsubscribe must have occurred (YYYY-MM-DD HH:MM:SS format).
* **endtime**: The timestamp before which the unsubscribe must have occurred (YYYY-MM-DD HH:MM:SS format).
* **unique**: Only retrieve the unique unsubscribes (true / **false**)

Bold is the default value

## Returned fields

The method returns a JSON object with several unsubscribe clicks. For each unsubscribe 
the following information is available:

* **ID**: The ID of the unsubscribe.  
* **mailing**: The ID of the mailing.
* **timestamp**: Timestamp of the unsubscribe.
* **destination**: The ID of the destinations that unsubscribed.
* **source**: Source of the unsubscribe.

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// execute the call
print_r($api->get("ms/emailing/{$emailingID}/unsubscribes"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
