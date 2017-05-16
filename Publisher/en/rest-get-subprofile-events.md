# REST API: request event information from a subprofile

To request the events from a subprofile you can send an HTTP GET request
to the following URL:

`https://api.copernica.com/v1/subprofile/$id/events?access_token=xxxx`

The $id should be replaced with the numerical identifier of the subprofile 
you're requesting the events of.


## Available parameters

The following parameters can be added to the URL as variables:

- **start**: the start date (yyyy-mm-dd) from which you want to retrieve the events,
- **end**:   the (exclusive) end date (yyyy-mm-dd) until you want to retrieve events,
- **tags**:  optional tags you want to filter for.


### Start and end

If no start and end parameters are provided you will get the events
of the last monthly period. If you provide a start you will get events
from the start date up to one month after the start. If you provide an
end, you will get the events from one month before the end up to (but excluding)
the end. If you provide both a start and an end and the interval between
the two is longer than a month, it will be shortened to a month where the
start is leading. Take into account that the dates are treated as UTC dates.
Also take into account that the monthly period limitation is subject to
change if performance requires this.


### Tags

If you provide a tags parameter, your events will also be filtered on the
provided tag. If you filter on multiple tags you can separate the tags
with a semicolon.


## Returned fields

A JSON with all the event for the provided subprofile:

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

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");
    
    // parameters to pass to the call
	$parameters = array(
        "start"     =>  "2017-02-27"
    );
    
    // do the call, and print result
    print_r($api->get("subprofile/1234/events", $parameters));

For the example above you need the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [Fetching all subprofile information](rest-get-subprofile)
