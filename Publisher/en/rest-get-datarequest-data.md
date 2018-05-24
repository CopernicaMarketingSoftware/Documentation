# REST API: GET data request data

With this request you can get the data of your data request.

To make this request you send an HTTP GET request to the following URL:

`https://api.copernica.com/v1/datarequest/$id/data?access_token=xxxx`

where `$id` is the request identifier of interest. You may first want to
check if the data is available with the [data request status](/rest-get-datarequest-status).


## Return value

A file containing a JSON with all available information. The
JSON contains two members, *info* and *data*. The info member has also 
two members *type* and *id*.  The type provides the type of info, which 
can be *email*, *profile*, or  *subprofile*, the *id* is the email
address, or the numeric identifier of the profile or subprofile. The data
member in the JSON contains an array of arrays with all the info we have
found. Examples of the information that is in the data member are:
- Complete MIMEs that where sent,
- Opens, and clicks information,
- Filled in surveys
- etc.

If the data are not yet available, this returns in a 404.

## PHP example

```php
// required scripts
require_once('copernica_rest_api.php');

// insert your access token here
$api = new CopernicaRestApi("your-access-token");

// get the status of the data request
$api->get("datarequest/$id/data")
```
This example requires the [REST API class](./rest-php).

## More information

* [All REST calls](./rest-api)
* [Data request for a profile](./rest-post-profile-datarequest)
* [Data request for a subprofile](./rest-post-subprofile-datarequest)
* [Data by an email address](./rest-post-email-datarequest)
* [Status of a data request](./rest-get-datarequest-status)
* [Privacy](./privacy)
