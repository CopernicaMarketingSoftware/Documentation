# REST API: GET Publisher message events

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv2/rest-api.md) of the REST API.

If you are interested in the events of a message sent with Publisher you
can make a GET request to the following URL:

`https://api.copernica.com/v1/old/message/$id/events/?access_token=xxxx`

where `$id` is the unique string that identifies a message. 

## Available parameters

The following parameters can be added to the URL as variables:

- **start**: the start date (yyyy-mm-dd) from which you want to retrieve the events,
- **end**:   the (exclusive) end date (yyyy-mm-dd) until you want to retrieve events,

### Start and end

If no start and end parameters are provided you will get the events
from when the message is sent up to one month after a message is sent. 
If you provide a start you will get events from the start date up to one
month after the start. If you provide an end, you will get the events from
one month before the end up to (but excluding) the end. If you provide both
a start and an end and the interval between the two is longer than a month,
it will be shortened to a month where the start is leading. Take into
account that the dates are treated as UTC dates. Also take into account
that the monthly period limitation is subject to change if performance
requires this.

## Returned fields

A JSON with all the events for this message.

```json
[
    {
        "event" : "open|click|failure|...",
        "fieldname1" : "data1",
        "fieldname2" : "data2",
        ...
    },
    {
        "event" : "open|click|failure|...",
        "fieldname1" : "data1",
        "fieldname2" : "data2",
        ...
    },
    ...
]
```
The `event` property in the JSON describes which type of event it is. The types that
are available are listed in the [event types page](./event-types.md).


## PHP Example

The following PHP script demonstrates how to use the API method.

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestApi("your-access-token");
    
// parameters to pass to the call
$parameters = array(
    "start"     =>  "2017-02-27"
);
    
// do the call, and print result
print_r($api->get("old/message/dkJDF343Df/events", $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [GET message](rest-get-message)
