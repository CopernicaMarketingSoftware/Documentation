# REST API: GET data request status

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv3/rest-api.md) of the REST API.

You can get the status of your data request by sending an HTTP GET request 
to the following URL:

`https://api.copernica.com/v3/datarequest/$id/status?access_token=xxxx`

where `$id` is the request identifier of interest.

## Return value

A JSON with some information about the status of your data request:
This json always has the member **status**, which have can the values: "available",
"pending", or "not available". When the status is "available", you can download
the data. When it is "pending", we are still searching for extra data. When it
is "not available" we do not have any information. It may be that you have
entered a wrong request identifier. The JSON may have a member **available**,
which indicates the number of bytes we have already have added to the 
requested data. It also may have the member **content-type**. Currently this
is always application/json, but may change in the future.

Example:
```json
{
    "status" : "available"|"pending"|"not available",
    "available" : 1234,
    "content-type" : "application/json"
}
```

## PHP example

```php
// required scripts
require_once('copernica_rest_api.php');

// insert your access token here
$api = new CopernicaRestAPI("your-access-token", 2);

// get the status of the data request (don't forget the id)
$api->get("datarequest/{$requestID}/status")
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API methods](./rest-api.md)
* [Data request for a profile](./rest-post-profile-datarequest.md)
* [Data request for a subprofile](./rest-post-subprofile-datarequest.md)
* [Data by an email address](./rest-post-email-datarequest)
* [Data from a data request](./rest-get-datarequest-data)
* [Privacy](./privacy)
