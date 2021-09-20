# REST API: POST senderdomains

This method is used to create a new senderdomain with the REST API. It uses 
an HTTP POST request to the following address:

`https://api.copernica.com/v3/senderdomains?access_token=xxxx`

After a successful call the ID of the created senderdomain is returned.

## Available parameters

| Parameter         | Description                                                                           |
|-------------------|---------------------------------------------------------------------------------------|
| **name**          | The domain that you want to send emails with.                                         |
| **tracking**      | (optional) The domain that you want to register impressions on.                       |
| **bounce**        | (optional) The dommain that you want to register bounces on.                          |

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to be sent to the api
$data = array(
    'name'   =>  'mysenderdomain.com',
    'tracking'   =>  'tracking.mysenderdomain.com',
    'bounce'   =>  'bounces.mysenderdomain.com',
);

// do the call
$api->post("senderdomains", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [GET senderdomain](rest-get-senderdomain)
- [PUT senderdomain](rest-put-senderdomain)
- [POST senderdomain](rest-post-senderdomain)
- [Overview of all REST API methods](rest-api)
