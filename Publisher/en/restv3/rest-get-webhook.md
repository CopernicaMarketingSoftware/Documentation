# REST API: GET webhook

This method is used to fetch an existing webhook with the REST API. It uses 
an HTTP GET request to the following address:

`https://api.copernica.com/v3/webhook/$id?access_token=xxxx`

Replace the `$id` with the identifier of the webhook you want to fetch.

## Returned fields

| Variable          | Description                                                                           |
|-------------------|---------------------------------------------------------------------------------------|
| **ID**            | Unique numerical identifier of the webhook.                                           |
| **handler**       | The URL of the webhook's endpoint that wil handle the call.                           |
| **trigger**       | The event that will trigger this webhook.                                             |
| **callers**       | An array of the callers that are permitted to trigger the webhook.                    |

### JSON example

The JSON for the database might look something like this:

```json
{  
   "ID":"1894",
   "handler":"https://my-webhook-url.com",
   "trigger":"create",
   "callers":["ms", "publisher"]
}
```

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once("copernica_rest_api.php");

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// do the call, and print result
$api->get("webhook/{$id}");
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all REST API methods](rest-api)
- [POST webhook](rest-post-webhook)
- [PUT database](rest-put-webhook)
- [DELETE database](rest-delete-webhook)
