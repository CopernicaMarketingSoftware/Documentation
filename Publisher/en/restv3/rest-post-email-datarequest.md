# REST API: POST email data request

With this method you can post a request to collect all data available about
an email address, apart from the profile/subprofile information. If we
receive such a request we will collect all the data and store this data
in a JSON file. You can choose to receive this file 
per email or with a POST request from us to your web address when it is ready.

If you choose to receive it per email the file will be attached if possible, 
or linked if the size limit is exceeded. It is also possible to check if the 
data is available or download it via a GET request using the unique ID that 
this method returns.

To create this data request you send an HTTP POST request to the following URL:

`https://api.copernica.com/v3/email/$email/datarequest?access_token=xxxx`

The code `email` should be replaced by the email address you want to retrieve 
data of.

## Available parameters

The following parameters can be added to the URL:

* **report** (optional): The target to report to; This can either be an email address or 
a web address. If the target is an email address and the file is small enough the 
JSON file will be added as an attachment to the email, otherwise a link will 
be provided to download the data. If you choose to use a web address an 
HTTP POST call will be made with the JSON data.

If you don't use the report parameter you will still be able to retrieve 
the data with the GET request as explained below.

## Return value

The result of this POST call is a unique identifier. This identifier can be
used to check if the data is already available by sending a HTTP GET request
to the following URL:

`https://api.copernica.com/v3/datarequest/$id?access_token=xxxx`

The code `id` should be replaced with the identifier obtained from your
HTTP POST request. Note that this file will expire eventually.

If the data is not available yet the data member of the JSON will contain the 
text "Data not available (yet)".

## PHP example

```php
// required scripts
require_once('copernica_rest_api.php');

// insert your access token here
$api = new CopernicaRestAPI("your-access-token", 2);

// data to pass to the method
$data = array(
    'report'    =>  'example@example.com'
);

// process the request (don't forget to add the email!)
$api->post("email/{$emailAddress}/datarequest", $data)
```
This example requires the [REST API class](./rest-php).

## JSON File

The JSON with all available information. If the data is available, the
JSON contains two members, **info** and **data**. The info member has also 
two members **type** and **id**.  The type provides the type of info which 
can be **email**, **profile**, or **subprofile**, the **id** is the email
address or the numeric identifier of the profile or subprofile. 

The data member in the JSON contains an array of arrays with all the info 
we have found. Examples of the information that is in the data member are:

- Complete MIMEs that were sent
- Opens and clicks information
- Completed surveys
- etc.

## More information

* [All REST calls](./rest-api)
* [Data request for a profile](./rest-post-profile-datarequest)
* [Data request for a subprofile](./rest-post-subprofile-datarequest)
* [Get data from a data request](./rest-get-datarequest-data)
* [Get status of a data request](./rest-get-datarequest-status)
* [Privacy](./privacy)
