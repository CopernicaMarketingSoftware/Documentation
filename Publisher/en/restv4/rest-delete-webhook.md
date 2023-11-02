# REST API: DELETE webhook

This method is used to delete an existing webhook with the REST API. It uses 
an HTTP DELETE request to the following address:

`https://api.copernica.com/v4/webhook/$id?access_token=xxxx`

The `$id` needs to be replaced by the numerical identifier, the ID, of the 
webhook.

## PHP example

The following example demonstrates how to make a call using this method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// do the call
$api->delete("webhook/{$id}");
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](./rest-api)
* [GET webhook](./rest-get-webhook)
* [POST webhooks](./rest-post-webhooks)
* [PUT webhook](./rest-put-webhook)
