# REST API: DELETE miniview

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv2/rest-api.md) of the REST API.

When you send an HTTP DELETE request to the following URL, you’ll delete 
a miniview:

`https://api.copernica.com/v1/miniview/$id?access_token=xxxx`

The `$id` needs to be replaced by the numerical identifier of the selection
that you want to remove. With this method you only remove the miniselection, and
not the profiles that are inside of it.

## PHP example

The following example demonstrates how to make a call using this method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// do the call
$api->delete("miniview/1234");
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
* [GET miniview rules](rest-get-miniview)
* [PUT miniview rules](rest-put-miniview)
