# REST API: GET profile emailings (Marketing Suite)

A method to request a list of all mailings sent from Marketing Suite to a 
specific profile. This is an HTTP GET call to the following address:

`https://api.copernica.com/v2/profile/{$profileID}/ms/emailings?access_token=xxxx`

Don't forget to replace `{$profileID}` by the ID of the profile you 
want to retrieve the emailings for.

## Returned fields

The method returns a JSON object containing the following information for each mailing:

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

The JSON object will contain a property 'data' with an array containing all 
the emailings. The JSON for a single emailing looks something like this:

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

## PHP Example

The following script demonstrates how to use this method. Because we use the 
CopernicaRestApi class, you don't have to worry about escaping special characters 
in the URL; it is done automatically.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// do the call, and print result
print_r($api->get("profile/{$profileID}/ms/emailings", array()));
```

The example above requires the [CopernicaRestApi class](./rest-php).

## More information

* [Overview of all API calls](./rest-api)
* [Get MS mailings](./rest-get-ms-emailings)
* [Get Publisher mailings](./rest-get-profile-publisher-emailings)
