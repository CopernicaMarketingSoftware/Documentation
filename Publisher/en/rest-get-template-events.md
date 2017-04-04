# REST API: request events for a Marketing Suite template

To request the events of the last monthly period for a Marketing Suite 
template you can send an HTTP GET request to the following URL:

`https://api.copernica.com/v1/template/$id/events?access_token=xxxx`

The $id should be replaced with the numerical identifier of the template 
you're requesting the events of.

If you want to have it for an earlier monthly period you can add a start
date to the request like:

`https://api.copernica.com/v1/template/$id/events/$date?access_token=xxxx`

where $date has the form yyyy-mm-dd.

Note: currently we support a monthly period to retrieve events but this
period is subject to change if performance requires this.


## Returned fields

This method returns a JSON containing all the events.

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
    print_r($api->get("template/1234/events"));

For the example above you need the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
