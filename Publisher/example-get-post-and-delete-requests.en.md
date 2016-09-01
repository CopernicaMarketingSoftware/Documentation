As mentioned before, the API methods are called using HTTP Requests,
where the type of request determines what to do. GET requests retrieve
data, POST requests updates data or creates new data\* and DELETE
requests delete data. You can send these requests using whichever
technique you prefer, in the following examples we will use **cURL**.

\*PUT and POST requests are exactly the same in the Copernica REST API

### Example of GET request in PHP with cURL

If you wish to retrieve information from a certain profile, or an entire
database, you use the GET request.

The following example script returns the information of the profile with
\$profileID 1. It is not needed to include the databaseID in the URL,
because each profile in a Copernica account has its own unique
identifier. Database independently that is. If you use this script, make
sure to update it with the ID of your database and the token supplied on
your application dashboard on Copernica.com.

 

~~~~ {.language-php}
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
curl_setopt($ch, CURLOPT_URL, "https://api.copernica.com/profile/$profileID?access_token=$token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);

// execute the request

$output = curl_exec($ch);

// output the profile information - includes the header

echo($output) . PHP_EOL;

// close curl resource to free up system resources

curl_close($ch);
~~~~

### Example response of a GET request

If your request is successful, you will receive the requested
information. In this example the information of a single profile.

~~~~ {.language-javascript}
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
~~~~

### Example of POST request in PHP with cURL

If you wish to add a new profile to the database, you send a POST
request to the database, telling him to add a profile. If you use this
script, make sure to update it with the ID of your database and the
token supplied on your application dashboard on Copernica.com.

~~~~ {.language-php}
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
curl_setopt($ch, CURLOPT_URL, "https://api.copernica.com/database/$databaseID/profiles?access_token=$token");
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
~~~~

The API call will return a header containing the location of the newly
created profile. Currently you cannot create multiple profiles in a
single call.

### Example response POST request

When the profile is successfully created, a header will be returned
containing the location of the newly created profile.

    HTTP/1.1 302 Found
    Date: Thu, 30 Jan 2014 11:14:07 GMT
    Server: Apache/2.2.22 (Ubuntu)
    X-Powered-By: PHP/5.3.10-1ubuntu3.9
    Location: https://api.copernica.com/profile/157?access_token=123456
    Content-Length: 0
    Content-Type: application/json

### Example of DELETE request in PHP with cURL

To delete a profile, you send a DELETE request. Since PHP and cURL do
not support CURLOPT\_PUT or CURLOPT\_DELETE, we use a
CURLOPT\_CUSTOMREQUEST and set it to "DELETE".

~~~~ {.language-php}
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
curl_setopt($ch, CURLOPT_URL, "https://api.copernica.com/profile/$profileID?access_token=$token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

// execute the request

$output = curl_exec($ch);

// output the profile information - includes the header

echo($output) . PHP_EOL;

// close curl resource to free up system resources

curl_close($ch);
~~~~

Upon successful deletion a `X-Deleted` header will be sent, followed by
what was deleted and the identifier of the deleted item, in the example
header below the profile with identifier 156.

### Example response DELETE request

    HTTP/1.1 200 OK
    Date: Thu, 30 Jan 2014 11:23:52 GMT
    Server: Apache/2.2.22 (Ubuntu)
    X-Powered-By: PHP/5.3.10-1ubuntu3.9
    X-Deleted: profile 156
    Content-Length: 0
    Content-Type: application/json

Example PUT request with cUrl
-----------------------------

The script below demonstrates how you make a PUT request.

    >?php
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

    echo ("https://api.copernica.com/database/$databaseID/profiles/?$url").PHP_EOL;

    curl_setopt($ch, CURLOPT_URL, "https://api.copernica.com/database/$databaseID/profiles/?access_token=$token&$url");
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

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.en.md)
-   [Register your app and obtain your access token](./register-your-app-on-copernica-com.en.md)
-   [REST API resources / methods](requests-index)

