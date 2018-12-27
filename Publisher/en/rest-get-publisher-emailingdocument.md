# REST API: GET emailingdocument (Publisher)

A method to request all metadata from an emailingdocument. This method does not 
support parameters. By sending a GET request to the following URL, 
you can fetch the emailingdocument metadata:

`https://api.copernica.com/v2/publisher/emailingdocument/$id?access_token=xxxx`

where `$id` should be replaced by the identifier of the emailingdocument you want 
to get the metadata of.

## Returned fields

- **id**: unique numerical identifier
- **template_id**: unique numerical identifier of template
- **name**: name of document
- **from_address**: from address of document
- **subject**: subject of document
- **source**: source of document

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// do the call, and print result
print_r($api->get("publisher/emailingdocument/{$documentID}"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
