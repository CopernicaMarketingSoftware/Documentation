# REST API: GET emailing (Publisher)

You can use the REST API to retrieve a summary of a mailing with an HTTP 
GET call to the following URL:

`https://api.copernica.com/v2/publisher/emailing/$id?access_token=xxxx`

Where `$id` should be replaced with the ID of the mailing you want summarized.

## Returned fields

The method returns a JSON object containing the following information:

* **id**: ID of the mailing
* **timestamp**: Timestamp of the mailing
* **document**: The ID of the document used for the mailing.
* **template**: The ID of the template used for the mailing.
* **subject**: The subject of the mailing
* **from_address**: An array containing the 'name' and 'email' of the sender.
* **destinations**: Amount of destinations the mailing was sent to
* **type**: Type of mailing (individual or mass)
* **contenttype**: Type of mailing content
* **target**: Contains the target type and the ID and type of other 
entities above it (for example the database a collection belongs to)

## PHP example

The script below demonstrates how to use this API method. Don't forget 
to replace the ID in the URL before executing the call.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("publisher/emailing/{$emailingID}"));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
* [Get all Publisher mailings](./rest-get-publisher-emailings)
