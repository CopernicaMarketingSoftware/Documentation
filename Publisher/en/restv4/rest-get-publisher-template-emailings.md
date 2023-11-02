# REST API: GET emailings (Publisher template)

You can use the REST API to retrieve all emailings in which a template 
was used with an HTTP GET call to the following URL:

`https://api.copernica.com/v4/publisher/template/$id/emailings`

Where `$id` should be replaced with the ID of the template you want to retrieve 
emailings for.

## Available parameters

The following parameters are available:

* **type**: Includes the type of mailings to include ('mass', 'individual' or 'both').
* **followups**: Indicates whether we should retrieve only mailings from follow-ups ('yes'), only 
mailings *not* from follow-ups ('no') or all mailings ('both').
* **test**: Indicates whether we should retrieve only test mailings ('yes'), only mailings that were 
not tests ('no') or all mailings ('both').

All of these parameters default to 'both', which means the result won't be 
filtered if you don't pass any of them.

## Returned fields

The method returns a JSON object representing an emailing in the **data** field. 
The emailing contains the following fields:

* **id**: The ID of the mailing
* **timestamp**: The timestamp
* **document**: ID of the document used for the mailing
* **template**: ID of the template used for the mailing
* **subject**: Subject of the mailing
* **from_address**: The from address of the mailing as an array. (With properties 'name' and 'email')
* **destinations**: The number of destinations.
* **testgroups**: Amount of testgroups
* **finalgroup**: ID of the final group (only relevant in case of a splitrun)
* **type**: The type of mailing: mass or individual.
* **clicks**: Amount of clicks for this mailing
* **impressions**: Amount of opens for this mailing
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

## PHP example

The script below demonstrates how to use this API method. Don't forget 
to replace the ID in the URL before executing the call.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// execute the call
print_r($api->get("publisher/template/{$templateID}/emailings"));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
* [Get Publisher template](./rest-get-publisher-template)
