# REST API: GET scheduledemailings (Marketing Suite)

A scheduled mailing is a mailing that was scheduled. It can be send immediately 
or in the future, one or multiple times. A method to request a list of all 
scheduled mailings sent from Marketing Suite. 
This is an HTTP GET call to the following address:

`https://api.copernica.com/v3/ms/scheduledemailings?access=token=xxxx`

You can find the call to retrieve all Publisher emailings [here](./rest-get-emailings).

## Available parameters

* **active**        : Only return active mailings ('true') or non-active mailings ('false'). Leave blank for both.
* **repeated**      : Only return repeated mailings ('true') or non-repeated mailings ('false'). Leave blank for both.
* **mass**          : Retrieve only mass mailings ('true') or all ('false'/default).
* **nextrunbefore** : Next run must be sent before this timestamp (YYYY-MM-DD HH:MM:SS format).
* **nextrunafter**  : Next run must be sent after this timestamp (YYYY-MM-DD HH:MM:SS format).

This method also supports [paging parameters](./rest-paging).

## Returned fields

The method returns a JSON object with several scheduled emailings under 
the **data** property. Each emailing contains the following fields:

* **id**            : The ID of the mailing.
* **start**         : The start date of the mailing (YYYY-MM-DD HH:MM:SS format).
* **rrule**         : The RRule for the mailing (more information below)
* **template**      : The ID of the template that was used to send the mailing.
* **next**          : The timestamp of the next occurrence of this mailing
* **previous**      : The timestamp of the previous occurrence of this mailing.
* **subject**       : The subject of the mailing.
* **from_address**  : An array containing the 'name' and 'email' address of the sender.
* **type**          : Type of mailing (individual or mass).
* **target**        : Contains the target type and the ID and type of other entities above it (for example the database a collection belongs to).

### RRules

An RRule is a rule that specifies recurrence, for example for an emailing 
that should be sent monthly. The RRules used within Copernica 
follow the [iCalendar format](https://icalendar.org/RFC-Specifications/iCalendar-RFC-5545/ "The iCalendar format") 
(RFC 5545). There are several tools on the internet that will help you 
create and understand RRules, such as the [tool on the iCalendar website](https://icalendar.org/rrule-tool.html).

### JSON example

The JSON object will contain a property 'data' with an array containing all 
the emailings. The JSON for a single emailing looks something like this:

```json
{
   "id":"1742",
   "start":"2019-06-27 17:30:00",
   "rrule":"FREQ=DAILY;COUNT=2",
   "template":"2112",
   "next":"2019-06-28 17:30:00",
   "previous":"2019-06-27 17:30:00",
   "subject":"Test emailing",
   "from_address":{
      "name":"Test",
      "email":"test@copernica.com"
   },
   "type":"mass",
   "target":{
      "type":"database",
      "sources":[
         {
            "id":"7141",
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
print_r($api->get("ms/scheduledemailings", $parameters));
```

The example above requires the [CopernicaRestApi class](./rest-php).

## More information

* [Overview of all API calls](./rest-api)
* [GET Publisher mailings](./rest-get-publisher-emailings)
* [GET Marketing Suite (regular) mailings](./rest-get-ms-emailings)

The following tools will help you get acquainted with RRules:
* [RRule tool on the iCalendar website](https://icalendar.org/rrule-tool.html "Create RRules with this tool on the iCalendar website")
* [The iCalendar/RFC5545 format](https://icalendar.org/RFC-Specifications/iCalendar-RFC-5545/ "The iCalendar format")
