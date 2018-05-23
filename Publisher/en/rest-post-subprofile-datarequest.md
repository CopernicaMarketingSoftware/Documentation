# REST API: POST subprofile data request

With this method you can post a request to collect all data available about
a subprofile. If we receive such a request, we will collect all the data
and store this data in a JSON file. You can choose to receive this file 
per email or with a POST request from us to your web address when it is ready. 

If you choose to receive it per email the file will be attached if possible, 
or linked if the size limit is exceeded. It is also possible to check if the
data is available via a GET request and the unique ID that this method
returns.

To create this data request you send an HTTP POST request to the following URL:

`https://api.copernica.com/v1/subprofile/$id/datarequest?access_token=xxxx`

The code *id* should be replaced by the numerical identifier of the subprofile 
you want to request the data for.

## Available parameters

The following parameters can be added to the URL:

* *report*: The target to report to. This target can either be an email address or 
a web address. If the target is an email address and the file is small enough the 
JSON file will be added as an attachment to the email, otherwise a link will 
be provided to download the data. If you choose to use a web address an 
HTTP POST call will be made with the JSON data.

## Return value

The result of this POST call is a unique identifier. This identifier can be
used to check if the data is already available by sending a HTTP GET request
to the following URL:

`https://api.copernica.com/v1/datarequest/$id?access_token=xxxx`

The code *id* should be replaced with the identifier obtained from your
HTTP POST request.

## PHP example

```php
// required scripts
require_once('copernica_rest_api.php');

// insert your access token here
$api = new CopernicaRestApi("your-access-token");

// data to pass to the method
$data = array(
    'report'    =>  'example@example.com'
);

// process the request (don't forget to add the ID!)
$api->post("subprofile/12345/datarequest", $data)
```
This example requires the [REST API class](./rest-php).

## JSON File

The JSON with all available information. If the data is available the
JSON contains two members, *info* and *data*. The info member has also 
two members *type* and *id*.  The type provides the type of info which 
can be *email*, *profile*, or  *subprofile*, the *id* is the email
address or the numeric identifier of the profile or subprofile. 

The data member in the JSON contains an array of arrays with all the info 
we have found. Examples of the information that is in the data member are:

- Complete MIMEs that where sent,
- Opens, an clicks information,
- Filled in surveys
- etc.

## More information

* [All REST calls](./rest-api)
* [Data request for a profile](./rest-profile-profile-datarequest)
* [Data request for an email address](./rest-post-email-datarequest)
* [Get data from a data request](./rest-get-datarequest)
* [Privacy](./privacy)
