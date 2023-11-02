# REST API: POST webhook

This method is used to create a new webhook with the REST API. It uses 
an HTTP POST request to the following address:

`https://api.copernica.com/v4/webhooks`

After a successful call the ID of the created webhook is returned.

## Available parameters

| Parameter         | Description                                                                           |
|-------------------|---------------------------------------------------------------------------------------|
| **handler**       | The URL of the webhook's endpoint that wil handle the call.                                                                              |
| **trigger**       | The event that will trigger this webhook.                                                                                                |
| **callers**       | Specify what callers may trigger the webhook. This parameter is optional. If no callers are specified, all possible callers are applied. |
| **database**      | Optional: The ID of the database that this webhook is limited to.                     |
| **collection**    | Optional: The ID of the collection that this webhook is limited to.                   |

Trigger can be one of the following
* **create**: profile creations
* **update**: profile updates
* **delete**: profile deletions
* **click**: clicks
* **delivery**: deliveries
* **open**: impressions
* **bounce**: bounces
* **failure**: errors

## JSON example

The following JSON demonstrates how to use the API method:

```json
{  
   "handler":"https://my-webhook-url.com",
   "trigger":"create",
   "callers":["ms", "publisher"],
   "database": 1
}
```

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data to be sent to the api
$data = array(
    'handler'   =>  'https://my-webhook-url.com',
    'trigger'   =>  'create',
    'callers'   =>  array('publisher','ms'),
    'database'  =>  1017
);

// do the call
$api->post("webhooks", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all REST API methods](rest-api)
- [GET webhook](rest-get-webhook)
- [PUT webhook](rest-put-webhook)
- [DELETE webhook](rest-delete-webhook)
