# REST API: GET scheduledemailing (Marketing Suite)

A scheduled mailing is a mailing that was scheduled. It can be send immediately 
or in the future, one or multiple times. You can use the REST API to retrieve 
a summary of a scheduled mailing with an HTTP GET call to the following URL:

`https://api.copernica.com/v3/ms/scheduledemailing/$id?access_token=xxxx`

Where `$id` should be replaced with the ID of the mailing you want summarized.

## Returned fields

The method returns a JSON object containing the following information:

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
* **tags**          : An array with tags used in the mailing.

### RRules

An RRule is a rule that specifies recurrence, for example for an emailing 
that should be sent monthly. The RRules used within Copernica 
follow the [iCalendar format](https://icalendar.org/RFC-Specifications/iCalendar-RFC-5545/ "The iCalendar format") 
(RFC 5545). There are several tools on the internet that will help you 
create and understand RRules, such as the [tool on the iCalendar website](https://icalendar.org/rrule-tool.html).

### JSON example

The JSON for the emailing looks something like this and can be found in 
the 'data' property of the output:

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
   },
   "tags":[
      "test1", 
      "Test2"
   ]
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
print_r($api->get("ms/scheduledemailing/{$scheduledemailingID}", $parameters));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
* [GET Marketing Suite mailings](./rest-get-ms-emailings)
* [GET Marketing Suite scheduled mailings](./rest-get-ms-scheduledemailings)
* [POST Marketing Suite scheduled emailing](./rest-post-ms-scheduledemailing)

The following tools will help you get acquainted with RRules:
* [RRule tool on the iCalendar website](https://icalendar.org/rrule-tool.html "Create RRules with this tool on the iCalendar website")
* [The iCalendar/RFC5545 format](https://icalendar.org/RFC-Specifications/iCalendar-RFC-5545/ "The iCalendar format")
