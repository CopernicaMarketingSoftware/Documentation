# REST API: Retrieve events for a message id sent with Publisher

If you are interested in the events of a message for the period of one month
after a message is sent you can make a GET request to the following URL

`https://api.copernica.com/v1/old/message/$id/events/?access_token=xxxx`

where `$id` is the unique string that identifies a message. If you are
interested in a later monthly period you can add the start date to the 
request like

`https://api.copernica.com/v1/old/message/$id/events/$date?access_token=xxxx`

where $date hase the form yyyy-mm-dd.

Note: currently we support a monthly period to retrieve events but this
period is subject to change if performance requires this.


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
    print_r($api->get("old/message/dkJDF343Df/events"));

For the example above you need the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [Get general message information](rest-get-message)
