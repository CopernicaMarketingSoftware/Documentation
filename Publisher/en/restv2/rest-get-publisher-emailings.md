# REST API: GET emailings (Publisher)

A method to request a list of all mailings sent from Publisher. 
This is an HTTP GET call to the following address:

`https://api.copernica.com/v2/publisher/emailings?access_token=xxxx`

You can find all the call to retrieve all Marketing Suite emailings [here](./rest-get-ms-emailings).

## Available parameters

* **type**: The type of mailing between mass or individual, defaults to both.
* **followups**: Indicates if we only use follow-up mailings ("yes"), only mailings 
that were *not* the result of a follow-up ("no") or all mailings ("both"). Defaults to "both".
* **test**: Indicates if we only use test mailings ("yes"), only mailings 
that were *not* a test ("no") or all mailings ("both"). Defaults to "both".
* **mindestinations**: Only retrieve mailings at least this many destinations.
* **maxdestinations**: Only retrieve mailings with at most this many destinations.
* **fromdate**: Only retrieve mailings sent after this date (YYYY-MM-DD HH:MM:SS format).
* **todate**: Only retrieve mailings sent before this date (YYYY-MM-DD HH:MM:SS format).

This method also supports [paging parameters](./rest-paging).

## Returned fields

The method returns a JSON object with several emailings in the **data** field. 
Each emailing contains the following fields:

* **id**: The ID of the mailing
* **timestamp**: The timestamp
* **document**: ID of the document used for the mailing
* **template**: ID of the template used for the mailing
* **subject**: Subject of the mailing
* **description**: Description of the mailing
* **from_address**: The from address of the mailing as an array. (With properties 'name' and 'email')
* **destinations**: The number of destinations.
* **testgroups**: Number of testgroups
* **finalgroup**: ID of the final group (only relevant in case of a splitrun)
* **type**: The type of mailing: mass or individual.
* **clicks**: Number of clicks for this mailing
* **impressions**: Number of opens for this mailing
* **errors**: Number of errors for this mailing
* **unsubscribes**: Number of unsubscribes for this mailing
* **abuses**: Number of abuses for this mailing
* **contenttype**: The type of content in the mailing: html, text or both.
* **target**: Array containing the target type and the ID and type of its sources (for example the database a collection belongs to).

## JSON Example

The JSON might look something like this:

```json
{  
   "id":"1281",
   "timestamp":"2010-04-14 15:02:14",
   "document":"114",
   "template":"621",
   "subject":"Reminder",
   "description":"This is a reminder",
   "from_address":{  
      "name":"test",
      "email":"test@copernica.nl"
   },
   "destinations":"3",
   "testgroups":0,
   "type":"individual",
   "clicks":"5",
   "impressions":"2",
   "contenttype":"html",
   "target":{  
      "type":"database",
      "sources":[  
         {  
            "id":"214",
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

// parameters to pass to the call
$parameters = array(
    'limit'             => 10,
    'type'              => 'mass',
    'followups'         => 'no',
    'registerclicks'    => 'yes',
);

// do the call, and print result
print_r($api->get("publisher/emailings", $parameters));
```

The example above requires the [CopernicaRestApi class](./rest-php).

## More information

* [Overview of all API calls](./rest-api)
* [Get Marketing Suite mailings](./rest-get-ms-emailings)
