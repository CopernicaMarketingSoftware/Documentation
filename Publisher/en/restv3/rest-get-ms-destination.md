# REST API: GET destination/message (Marketing Suite)

You can use the REST API to retrieve a summary of a destination with an HTTP 
GET call to the following URL:

`https://api.copernica.com/v3/ms/destination/$id?access_token=xxxx`

Where `$id` should be replaced with the ID of the destination you want summarized. 
This can either be a numerical ID or the hashed ID, which is a string 
containing letters and numbers.

Note: The terms 'destination' and 'message' can be used interchangeably 
in this article, including the code examples.

## Returned fields

The method returns a JSON object containing the following information:

* **ID**: Unique ID of the destination.        
* **messageID**: The hashed ID of the destination, also called the message ID.   
* **mailing**: ID of the mailing sent to this destination.
* **timestampsent**: Timestamp of sending to the destination.
* **profile**: Profile ID of the destination.
* **subprofile**: Subprofile ID of the destination.

### JSON example

The destination might look something like this:

```json
{  
   "ID":"783919",
   "messageID":"b4icbaqjswyrb7tc",
   "timestampsent":"2015-06-08 13:53:45",
   "profile":"9033832",
   "subprofile":null,
   "mailing":"466"
}
```

## PHP example

The script below demonstrates how to use this API method. Don't forget 
to replace the ID in the URL before executing the call.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("ms/destination/{$destinationID}"));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
