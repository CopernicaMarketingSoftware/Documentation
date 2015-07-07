# API reference

The SMTPeter API provides a simple RESTful interface. This means that  
your application can access the API using the HTTP protocol. With simple (secure) 
HTTP calls you can create, store and modify email messages (in HTML or MIME  
format) and retrieve email statistics. All you need is an 
[access-token](/app/#/admin/api-access) and you are ready to go. 


> **Note:** API requests must use secure HTTPS connections. Unsecure HTTP 
requests will result in a 400 Bad Request response. You can do a call to the API 
with any programming language that supports HTTP requests. 


To send a mail this way, simply execute a POST request with your api token as parameter to
[https://www.smtpeter.com/v1/send](https://www.smtpeter.com/v1/send).


The request should contain the following fields:

    envelope: The address the e-mail originated from
    mime: The mime data for the message
    recipients: The email address that will receive the email


The following fields are optional, and control the way that
SMTPeter processes the messages:

    inlineizecss: When set to true, all CSS will be inlined inside the HTML
    clicktracking: When set to true, links will be redirected and logged
    bouncetracking: When set to true, bounces will be monitored
    openstracking: When set to true, impressions will be monitored


The fields can be either provided as regular POST data, or
they can be encoded in JSON. For JSON the Content-Type should
be set to application/json.

Here is an example of POST request in PHP with cURL: 

```php
<?php
/**
 *  Example API call
 *  Send a mail
 */

$data = array (
	"envelope" => "from@email.com",
	"mime" => "text/html",
    "recipients" => "to@email.com",
    "inlineizecss" => true,
    "clicktracking" => true,
    "bouncetracking" => false,
    "openstracking" => true,
);

// json encode data
$data_string = json_encode($data); 

// your API token
$token = '123abc...';

// set up the curl resource
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.smtpeter.com/v1/send?access_token={$token}");
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
```


## Authentication
The API requires an application key (token) that is provided after you register 
your app. The key identifies your application to the service, and is used to 
track overall call usage. It's passed using the standard `access_token` parameter. 
If you haven't created a API key yet, now is the perfect time to 
register for free and create your key.

