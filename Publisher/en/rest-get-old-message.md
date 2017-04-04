# REST API: Retrieve general information from a Publisher message id

If you want to get some general information from a mail sent with Publisher
you can make a simple a GET request to the following URL:

`https://api.copernica.com/v1/old/message/$id?access_token=xxxx`

where `$id` is the unique string that identifies a message. 

## Return value

A JSON with the general information about the message.

## PHP Example

The following PHP script demonstrates how to use the API method.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("old/message/AMRJHv989dfds"));

For the example above you need the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
