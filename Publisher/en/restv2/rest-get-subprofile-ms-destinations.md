# REST API: GET MS destinations (subprofile)

You can retrieve the Marketing Suite destinations for a subprofile by 
sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/subprofile/$id/ms/destinations?access_token=xxxx`

Where the `$id` should be replaced with the ID of the subprofile. This method 
also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestampsent** field.

## Returned fields

The method returns a JSON object with several destinations. For each destination 
the following information is available:

* **ID**: The ID of the destination.
* **timestampsent**: The timestamp on which the mailing was sent to this recipient.
* **profile**: The ID of the profile of the destination.
* **subprofile**: The ID of the subprofile of the destination.
* **mailing**: The ID of the mailing.

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("subprofile/{$subprofileID}/ms/destinations/"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a subprofile](./rest-get-subprofile)
* [Retrieve a MS destination](./rest-get-ms-destination)





