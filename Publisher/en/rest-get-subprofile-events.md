# REST API: request all event information from a subprofile

To request the fields from a subprofile you can send an HTTP GET
request to the following URL:

`https://api.copernica.com/v1/subprofile/$id/events?access_token=xxxx`

The $id should be replaced with the numerical identifier of the subprofile 
you're requesting the events of.

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
