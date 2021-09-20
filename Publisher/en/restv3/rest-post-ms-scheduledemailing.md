# REST API: POST scheduledemailing (Marketing Suite)

A scheduled mailing is a mailing that was scheduled. It can be send immediately 
or in the future, one or multiple times. You can use the REST API to send 
a scheduled mailing with an HTTP GET call to the following URL:

`https://api.copernica.com/v3/ms/scheduledemailing/?access_token=xxxx`

## Parameters

The method accepts the following parameters:

* **targettype**    : Type of target (database, view, collection, etc).
* **target**        : ID of the target.
* **template**      : ID of the template to send.
* **start**         : Start date for the mailing (YYYY-MM-DD HH:MM:SS format). If this date is in the past the mailing will be sent immediately.
* **rrule**         : RRule specification for the reccurence (optional, see information below).

### RRules

An RRule is a rule that specifies recurrence, for example for an emailing 
that should be sent monthly. The RRules used within Copernica 
follow the [iCalendar format](https://icalendar.org/RFC-Specifications/iCalendar-RFC-5545/ "The iCalendar format") 
(RFC 5545). There are several tools on the internet that will help you 
create and understand RRules, such as the [tool on the iCalendar website](https://icalendar.org/rrule-tool.html). 
If you don't pass an RRule to this method it will only be sent once.

## PHP example

The script below demonstrates how to use this API method. Don't forget 
to replace the ID in the URL before executing the call.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// set the data for the call
$data = array(
    'targettype'    =>  "database",
    'target'        =>  1234,
    'template'      =>  123,
    'start'         =>  "2019-07-01 12:00:00",
    'rrule'         =>  "FREQ=DAILY;COUNT=2"
);

// execute the call
print_r($api->post("ms/scheduledemailing", $data));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
* [GET Marketing Suite mailings](./rest-get-ms-emailings)
* [GET Marketing Suite scheduled emailing](./rest-get-ms-scheduledemailing)
* [GET Marketing Suite scheduled mailings](./rest-get-ms-scheduledemailings)

The following tools will help you get acquainted with RRules:
* [RRule tool on the iCalendar website](https://icalendar.org/rrule-tool.html "Create RRules with this tool on the iCalendar website")
* [The iCalendar/RFC5545 format](https://icalendar.org/RFC-Specifications/iCalendar-RFC-5545/ "The iCalendar format")
