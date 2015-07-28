# Code Examples

Below you can find code examples on how to send email and fetch statistics
for common programming languages languages.


## Send Email

The code examples below are on how to send email. 

### Send email using PHP

The example below illustrates how you can send an email with SMTPeter using PHP and cURL. 

```php
<?php
// access token
$token = "your-api-token";

// create curl resource
$curl = curl_init("https://www.smtpeter.com/v1/send?access_token={$token}");

$data = array(
    'recipient'     =>  'reciever@example.com',
    'envelope'      =>  'sender@example.com',
    'subject'       =>  'This is a test mail',
    'text'          =>  'This is the body of the text mail',
    'from'          =>  '"Peter" <sender@example.com>',
    'to'            =>  '"John" <reciever@example.com>'
);

// set options
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER      =>  1,
    CURLOPT_POST                =>  true,
    CURLOPT_POSTFIELDS          =>  json_encode($data),
    CURLOPT_HTTPHEADER          =>  array('content-type: application/json')
));

// $output contains the output string
$output = curl_exec($curl);

// clean up curl resource
curl_close($curl);
```
