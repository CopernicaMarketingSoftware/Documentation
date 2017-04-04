# REST API: request event information from a subprofile

To request the events from a subprofile for the last monthly period you
can send an HTTP GET request to the following URL:

`https://api.copernica.com/v1/subprofile/$id/events?access_token=xxxx`

The $id should be replaced with the numerical identifier of the subprofile 
you're requesting the events of. If you want to retrieve events for an earlier
monthly period you can add the starting date to the request like:

`https://api.copernica.com/v1/subprofile/$id/events/$month?access_token=xxxx`

where $month has the form yyyy-mm-dd.

Note: currently we support a monthly period to retrieve events but this
period is subject to change if performance requires this.

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
        "type" : "open|click|failure|...",
        "fieldname1" : "data1",
        "fieldname2" : "data2",
        ...
    },
    ...
]
```

## PHP Example

The following PHP script demonstrates how to use the API method.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("subprofile/1234/events"));

For the example above you need the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [Fetching all subprofile information](rest-get-subprofile)
