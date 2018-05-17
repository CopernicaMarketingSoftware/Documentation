# REST API: GET profile data

This method requests all data available about a profile in a JSON file.
To request the data you can send an HTTP GET request to the following URL:

`https://api.copernica.com/v1/profile/$id/data?access_token=xxxx`

The code *id* should be replaced by the numerical identifier of the profile 
you want to retrieve the data of.

## Available parameters

The following parameters can be added to the URL:

* *report*: The target to report to; This can either be an email address or 
a web address. If the file is small enough the JSON file will be added as 
an attachment to the email, otherwise a link will be provided to download the 
data. If you choose to use a web address an HTTP POST call will be made with 
the JSON data.

## Return value

The result of this GET call is a JSON file containing all known information 
about the profile. The file contains two objects. The first is an info component 
showing you information about this request, which is useful if you execute multiple 
requests in a row or keep the files for a longer time. 

The second object is an array with the data itself. This includes a lot of data: 
Profile data, history, the MIME of every email sent to them, survey data, 
personalized PDFs sent to them, clicks, opens, etc...

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
$api->get("profile/id/data", $data)
```

This example requires the [REST API class](./rest-php).

## More information

* [All REST calls](./rest-api)
* [Privacy](./privacy)
* [Data by subprofile ID](./rest-get-subprofile-data)
* [Data by email address](./rest-get-email-data)
