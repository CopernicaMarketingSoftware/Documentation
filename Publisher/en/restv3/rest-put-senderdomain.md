# REST API: PUT senderdomain

This method is used to update an existing senderdomain with the REST API. It uses 
an HTTP PUT request to the following address:

`https://api.copernica.com/v3/senderdomain/$id?access_token=xxxx`

Replace the `$id` with the identifier of the senderdomain you want to edit.

## Available parameters

| Parameter         | Description                                                                           |
|-------------------|---------------------------------------------------------------------------------------|
| **tracking**      | (optional) The domain that you want to register impressions on.                       |
| **bounce**        | (optional) The dommain that you want to register bounces on.                          |

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once("copernica-rest-api.php");

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to be sent to the api
$data = array(
    'tracking' => 'tracking.mysenderdomain.com',
    'bounce' => 'bounces.mysenderdomain.com'
);

// do the call
$api->put("senderdomain/{$id}", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API calls](rest-api)
- [GET senderdomain](rest-get-senderdomain)
- [POST senderdomains](rest-post-senderdomains)
- [DELETE senderdomain](rest-delete-senderdomain)
