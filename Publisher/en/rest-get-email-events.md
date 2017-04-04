# REST API: request events for an email address

To request the email events for the last monthly period you can send an
HTTP GET request to the following URL:

`https://api.copernica.com/v1/email/$addres/events?access_token=xxxx`

The $addres should be replaced with the email address of interest. If you
want to retrieve events for an earlier monthly period you can add the
starting date to the request like:

`https://api.copernica.com/v1/email/$id/events/$date?access_token=xxxx`

where $date has the form yyyy-mm-dd.

Note: currently we support a monthly period to retrieve events but this
period is subject to change if performance requires this.


## Returned fields

A JSON with all the events for this profile.

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
    print_r($api->get("email/john.doe@example.com/events"));

For the example above you need the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
