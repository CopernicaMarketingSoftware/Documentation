# REST API: PUT webhook

This method is used to update an existing webhook with the REST API. It uses 
an HTTP PUT request to the following address:

`https://api.copernica.com/v2/webhook/$id?access_token=xxxx`

Replace the `$id` with the identifier of the webhook you want to edit.

## Available parameters

| Parameter         | Description                                                                           |
|-------------------|---------------------------------------------------------------------------------------|
| **handler**       | The URL of the webhook's endpoint that wil handle the call.                                                                              |
| **trigger**       | The event that will trigger this webhook.                                                                                                |
| **callers**       | Specify what callers may trigger the webhook. This parameter is optional. If no callers are specified, all possible callers are applied. |

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once("copernica-rest-api.php");

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// data to be sent to the api
$data = array(
    "handler"   =>  "https://my-webhook-url.com",
    "trigger"   =>  "create",
    "callers"   =>  array("publisher","ms")
);

// do the call
$api->put("webhook/{$id}", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API calls](rest-api)
- [GET webhook](rest-get-webhook)
- [POST webhooks](rest-post-webhooks)
- [DELETE webhook](rest-delete-webhook)
