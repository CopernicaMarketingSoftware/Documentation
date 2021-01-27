# REST API: GET destinations (MS mailing)

You can retrieve the destinations for an emailing by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/ms/emailing/$id/destinations?access_token=xxxx`

Where the `$id` should be replaced with the ID of the emailing. This method 
also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestampsent** field.

## Optional parameters
* **Unsubscribed**: Set to 'true' for retrieving the unsubscribed destinations.

## Returned fields

The method returns a JSON object with several destinations under the 'data' property. 
For each destination the following information is available:

* **ID**: Unique ID of the destination.           
* **mailing**: ID of the mailing sent to this destination.
* **timestampsent**: Timestamp of sending to the destination.
* **profile**: Profile ID of the destination.
* **subprofile**: Subprofile ID of the destination.

### JSON example

The destination might look something like this:

```json
{  
   "ID":"783919",
   "timestampsent":"2015-06-08 13:53:45",
   "profile":"9033832",
   "subprofile":null,
   "mailing":"466"
}
```

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("ms/emailing/{$emailingID}/destinations/"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a MS emailing](./rest-get-ms-emailing)





