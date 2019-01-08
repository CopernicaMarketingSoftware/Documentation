# REST API: GET emailing (Publisher)

You can use the REST API to retrieve a summary of a mailing with an HTTP 
GET call to the following URL:

`https://api.copernica.com/v2/publisher/emailing/$id?access_token=xxxx`

Where `$id` should be replaced with the ID of the mailing you want summarized.

## Returned fields

The method returns a JSON object containing the following information:

* **id**: The ID of the mailing.
* **timestamp**: The timestamp.
* **destinations**: The number of destinations.
* **type**: The type of mailing: mass or individual.
* **embedded**: Indicates whether the images in the mailing are embedded or not. 
* **contenttype**: The type of content in the mailing: html, text or both.
* **registerclicks**: Boolean to indicate whether clicks should be registered for this mailing or not.
* **registerimpressions**: Boolean to indicate whether impressions should be registered for this mailing or not.
* **registererrors**: Boolean to indicate whether errors should be registered for this mailing or not.
* **target**: Array containing the target type and the ID and type of its sources (for example the database a collection belongs to).

## PHP example

The script below demonstrates how to use this API method. Don't forget 
to replace the ID in the URL before executing the call.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("publisher/emailing/{$emailingID}", $parameters));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
* [Get all Publisher mailings](./rest-get-publisher-emailings)
