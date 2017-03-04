# Example scripts of GET, POST, PUT and DELETE calls
As mentioned before, the API methods are called using HTTP Requests,
where the type of request determines what to do. GET requests retrieve
data, POST requests create new data, PUT requests update existing data and DELETE
requests delete data. You can send these requests using whichever
technique you prefer, in the following examples we use cURL and PHP.

**Note that in each of these examples you'll need to replace the access keys and IDs with your own access keys and IDs.**

## A GET request

If you wish to retrieve information from a certain profile, or an entire
database, you use the GET request.

The following example script returns the information of the profile with profile ID 1. It is not needed to include the databaseID in the URL, because each profile in a Copernica account has its own unique
identifier. Database independently that is.

```
<?php
/**
 *  Example API call
 *  GET profile information
 */

// the ID of the profile

$profileID = 2;

// the token

$token = 'your token here';

// set up the curl resource

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.copernica.com/v1/profile/$profileID?access_token=$token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);

// execute the request

$output = curl_exec($ch);

// output the profile information - includes the header

echo($output) . PHP_EOL;

// close curl resource to free up system resources

curl_close($ch);

?>
```

### Example response of a GET request

If your request is successful, you will receive the requested
information. In this example the information of a single profile.

```
HTTP/1.1 200 OK
Date: Fri, 14 Feb 2014 08:47:26 GMT
Server: Apache
Transfer-Encoding: chunked
Content-Type: application/json

{
    "ID": "2",
    "fields": {
        "Company": "VOC",
        "Address": "Houten Hoofd 1",
        "ZipCode": "1623AA",
        "City": "Hoorn",
        "Country": "Netherlands",
        "Phone": "",
        "Website": "",
        "Status": "Sailing",
        "AccountManager": "Bontekoe Bros",
        "Age": "22"
    },
    "interests": [],
    "database": "1",
    "secret": "4686c108d52736fb85ca10975c6f0a5e",
    "created": "2014-02-10 10:33:29"
}
```

## A POST request

If you wish to add a new profile to the database, you send a POST
request to the database, telling it to add a profile. In the `$data=` array, you  can specify all the fields you want to fill.

```
<?php
/**
 *  Example API call
 *  Create a new profile in a database
 */

// the databaseID

$databaseID = 1;

$data = array (
    "Company" => "EasyREST4u",
    "City" => "Hendrik Ido Ambacht"
    );

// json encode data

$data_string = json_encode($data); 

// the token

$token = 'your token here';

// set up the curl resource
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.copernica.com/v1/database/$databaseID/profiles?access_token=$token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string)                                                                       
));       

// execute the request

$output = curl_exec($ch);

// output the profile information - includes the header

echo($output) . PHP_EOL;

// close curl resource to free up system resources
curl_close($ch);

?>
```

### Example response POST request

The API call will return a header containing the location of the newly
created profile. Currently you cannot create multiple profiles in a
single call.

    HTTP/1.1 302 Found
    Date: Thu, 30 Jan 2014 11:14:07 GMT
    Server: Apache/2.2.22 (Ubuntu)
    X-Powered-By: PHP/5.3.10-1ubuntu3.9
    Location: https://api.copernica.com/v1/profile/157?access_token=123456
    Content-Length: 0
    Content-Type: application/json

## A DELETE request

To delete a profile, you send a DELETE request. Since PHP and cURL do
not support CURLOPT_PUT or CURLOPT_DELETE, we use a
CURLOPT_CUSTOMREQUEST and set it to "DELETE".

```
<?php
/**
 *  Example API call
 *  DELETE profile entirely
 */

// the profileID to be deleted

$profileID = 2;

// the token

$token = 'your token here';

// set up the curl resource

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.copernica.com/v1/profile/$profileID?access_token=$token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

// execute the request

$output = curl_exec($ch);

// output the profile information - includes the header

echo($output) . PHP_EOL;

// close curl resource to free up system resources

curl_close($ch);

?>
```

### Example response DELETE request

Upon successful deletion a `X-Deleted` header will be sent, followed by
what was deleted and the identifier of the deleted item, in the example
header below it's the profile with ID 156.
```
    HTTP/1.1 200 OK
    Date: Thu, 30 Jan 2014 11:23:52 GMT
    Server: Apache/2.2.22 (Ubuntu)
    X-Powered-By: PHP/5.3.10-1ubuntu3.9
    X-Deleted: profile 156
    Content-Length: 0
    Content-Type: application/json
```

## Example PUT request with cUrl

If you want to alter a profile, database or any other existing part of a database, use a PUT request. The request below finds all people named 'John' that live in Amsterdam, and gives them the country code 'nl_NL'. Note the `CURLOPT_CUSTOMREQUEST`.
```
<?php
/**
 *  Example API call
 *  Update the profiles in a database
 */

// the databaseID

$databaseID = 756;

// find all Johns living in Amsterdam

$data = array(
            "name" => "John", 
            "city" => "Amsterdam" 
        );

// and update their landcode 

$update = array(
    'countrycode' => 'nl_NL'
);

// make the POST fields

$data_string = json_encode($update); 

// initialize array

$url = array();

foreach ($data as $key => $value)
{
    // make the url encoded query string

    $url[] = 'fields[]='.urlencode($key.'=='.$value);
}

$url = implode('&', $url);

// the token

$token = 'your token';

// set up the curl resources

$ch = curl_init();

echo ("https://api.copernica.com/v1/database/$databaseID/profiles/?$url").PHP_EOL;

curl_setopt($ch, CURLOPT_URL, "https://api.copernica.com/v1/database/$databaseID/profiles/?access_token=$token&$url");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); // note the PUT here

curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_HEADER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string)                                                                       
));       

// execute the request

$output = curl_exec($ch);

// output the profile information - includes the header

echo($output) . PHP_EOL;

// close curl resource to free up system resources

curl_close($ch);
?>
```

