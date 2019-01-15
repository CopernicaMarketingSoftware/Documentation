# REST API: GET data request status

With this request you can get the status of your data request.

To make this request you send an HTTP GET request to the following URL:

`https://api.copernica.com/v1/datarequest/$id/status?access_token=xxxx`

where `$id` is the request identifier of interest.

## Return value

A json with some information about the status of your data request:
This json always has the member *status*, which have can the values: available,
pending, or not available. When the status is available, you can download
the data. When it is pending, we are still searching for extra data. When it
is not available we do not have any information. It may be that you have
entered a wrong request identifier. The JSON may have a member *available*,
which indicates the number of bytes we have already have added to the 
requested data. It also may have the member *content-type*. Currently this
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
$api = new CopernicaRestApi("your-access-token");

// get the status of the data request (don't forget the id)
$api->get("datarequest/$id/status")
```
This example requires the [REST API class](./rest-php).

## More information

* [All REST calls](./rest-api)
* [Data request for a profile](./rest-post-profile-datarequest)
* [Data request for a subprofile](./rest-post-subprofile-datarequest)
* [Data by an email address](./rest-post-email-datarequest)
* [Data from a data request](./rest-get-datarequest-data)
* [Privacy](./privacy)
