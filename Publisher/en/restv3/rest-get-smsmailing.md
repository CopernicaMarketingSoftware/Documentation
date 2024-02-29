# REST API: GET SMS mailing

You can use the REST API to retrieve a summary of an SMS mailing with an HTTP 
GET call to the following URL:

`https://api.copernica.com/v3/smsmailing/$id?access_token=xxxx`

Where `$id` should be replaced with the ID of the SMS mailing you want summarized.

## Returned fields

The method returns a JSON object representing the following fields:

* **id**: The ID of the SMS mailing
* **timestamp**: The timestamp of the SMS mailing
* **document**: ID of the document used for the  SMS mailing
* **message**: The message used in the SMS mailing
* **from**: From address used in the SMS mailing
* **destinations**: Number of destinations
* **successes**: Number of destinations with a successful delivery
* **errors**: Number of destinations with an error registered
* **unknown**: Number of destinations with an unknwon delivery status
* **target**: The target used for the SMS mailing

## JSON Example

The JSON might look something like this:

```json
{
  "id": "1",
  "timestamp": "2024-02-23 14:41:02",
  "document": "117",
  "message": "Hello {$profile.firstname} ({$profile.id})!",
  "from": "Copernica",
  "destinations": "4",
  "successes": "3",
  "errors": "1",
  "unknown": "0",
  "target": {
    "type": "view",
    "sources": [
      {
        "id": "12",
        "type": "view"
      },
      {
        "id": "1",
        "type": "database"
      }
    ]
  }
}
```

## PHP example

The script below demonstrates how to use this API method. Don't forget 
to replace the ID in the URL before executing the call.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// execute the call
print_r($api->get("smsmailing/{$emailingID}"));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
