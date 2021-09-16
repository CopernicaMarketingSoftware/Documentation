# REST API: DELETE document (Publisher)

When you send an HTTP DELETE request to the following URL, you’ll delete 
a document:

`https://api.copernica.com/v3/publisher/document/$id?access_token=xxxx`

The `$id` needs to be replaced by the numerical identifier of the document
that you want to remove.

## PHP example

The following example demonstrates how to make a call using this method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// do the call
$api->delete("publisher/document/{$documentID}");
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
