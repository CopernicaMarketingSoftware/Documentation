# REST API: GET Publisher destinations (profile)

You can retrieve the Publisher destinations for a profile by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v4/profile/$id/publisher/destinations`

Where the `$id` should be replaced with the ID of the profile. This method 
also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestampsent** field.

## Returned fields

The method returns a JSON object with several destinations. For each destination 
the following information is available:

* **ID**: The ID of the destination.
* **timestampsent**: The timestamp on which the mailing was sent to this recipient.
* **internal**: The internal ID of the destination.
* **profile**: The ID of the profile of the destination.
* **subprofile**: The ID of the subprofile of the destination (if applicable).
* **mailing**: The ID of the mailing.

### JSON example

The JSON for a single destination might look something like this:

```json
{  
   "ID":"56ed14bf71f7bc4e200e712e646ed32f",
   "timestampsent":"2014-08-26 10:14:15",
   "internal":"802345",
   "profile":"9180926",
   "subprofile":null,
   "mailing":"42913"
}
```

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// execute the call
print_r($api->get("profile/{$profileID}/publisher/destinations/"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a profile](./rest-get-profile)
* [Retrieve a Publisher destination](./rest-get-publisher-destination)





