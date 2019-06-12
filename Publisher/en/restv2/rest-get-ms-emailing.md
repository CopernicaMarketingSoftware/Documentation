# REST API: GET emailing (Marketing Suite)

You can use the REST API to retrieve a summary of a mailing with an HTTP 
GET call to the following URL:

`https://api.copernica.com/v2/ms/emailing/$id?access_token=xxxx`

Where `$id` should be replaced with the ID of the mailing you want summarized.

## Returned fields

The method returns a JSON object containing the following information:

* **id**: The ID of the mailing.
* **timestamp**: Timestamp of the mailing.
* **template**: The ID of the template that was used to send the mailing.
* **subject**: The subject of the mailing.
* **from_address**: An array containing the 'name' and 'email' address of the sender.
* **destinations**: Amount of destinations the mailing was sent to.
* **type**: Type of mailing (individual or mass).
* **target**: Contains the target type and the ID and type of other 
entities above it (for example the database a collection belongs to).

### JSON example

The JSON for the emailing looks something like this and can be found in 
the 'data' property of the output:

```json
{  
   "id":"169",
   "timestamp":"2015-01-13 15:09:49",
   "template":"579",
   "subject":"Test",
   "from_address":{  
      "name":"Test",
      "email":"test@copernica.com"
   },
   "destinations":25,
   "type":"mass",
   "target":{  
      "type":"database",
      "sources":[  
         {  
            "id":"7578",
            "type":"database"
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
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("ms/emailing/{$emailingID}", $parameters));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
* [Get all Marketing Suite mailings](./rest-get-ms-emailings)
