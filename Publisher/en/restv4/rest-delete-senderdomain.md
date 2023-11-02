# REST API: DELETE senderdomain

This method is used to delete an existing senderdomain with the REST API. It uses 
an HTTP DELETE request to the following address:

`https://api.copernica.com/v3/senderdomain/$id?access_token=xxxx`

The `$id` needs to be replaced by the numerical identifier, the ID, of the 
senderdomain.

## PHP example

The following example demonstrates how to make a call using this method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// do the call
$api->delete("senderdomain/{$id}");
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](./rest-api)
* [GET senderdomain](./rest-get-senderdomain)
* [POST senderdomains](./rest-post-senderdomains)
* [PUT senderdomain](./rest-put-senderdomain)
