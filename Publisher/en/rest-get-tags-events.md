# REST API: request events with some tags

To request all the events for the last monthly period that have a specific
tag you can send an HTTP GET request to the following URL:

`https://api.copernica.com/v1/tags/$tag/events?access_token=xxxx`

The $tag should be replaced with the the tag of interest. If you have multiple
tags on which you want to filter, you can separate them with semicolons like:

`https://api.copernica.com/v1/tags/$tag1;$tag2;$tag3/events?access_token=xxxx`

If you want to have the events for an earlier monthly period you can add
the starting date to the request like:

`https://api.copernica.com/v1/tags/$tag/events/$date?access_token=xxxx`

or

`https://api.copernica.com/v1/tags/$tag1;$tag2;$tag3/events/$date?access_token=xxxx`

where $data has the form yyyy-mm-dd.

Note: currently we support a monthly period to retrieve events but this
period is subject to change if performance requires this.


## Returned fields

A JSON with all the events for the provided tags.

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
    print_r($api->get("tags/myTag/events"));

For the example above you need the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [Fetching all profile information](rest-get-profile)
