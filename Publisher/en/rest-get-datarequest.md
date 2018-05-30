# REST API: GET data request

With this method you can get the data from a posted data request. It will
return the JSON with the data requested data when the data are available. Or
it will simply state that the data are not available yet.

To make this request you send an HTTP GET request to the following URL:

`https://api.copernica.com/v1/datarequest/$id?access_token=xxxx`

where `$id` is the request identifier of interest.

## Return value

The JSON with all available information. If the data are available, the
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

If the data are not yet available, the data member holds the string:
"no data available (yet).".

## PHP example

```php
// required scripts
require_once('copernica_rest_api.php');

// insert your access token here
$api = new CopernicaRestApi("your-access-token");

// process the request (don't forget to add the id!)
$api->get("datarequest/$id", $data)
```
This example requires the [REST API class](./rest-php).

## More information

* [All REST calls](./rest-api)
* [Data request for a profile](./rest-post-profile-datarequest)
* [Data request for a subprofile](./rest-post-subprofile-datarequest)
* [Data by an email address](./rest-post-email-datarequest)
* [Privacy](./privacy)

