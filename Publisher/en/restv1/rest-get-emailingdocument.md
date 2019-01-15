# REST API: GET emailingdocument
A method to request all metadata from an emailingdocument. This method does not 
support parameters. By sending a GET request to the following URL, 
you can fetch the emailingdocument metadata:

`https://api.copernica.com/v1/emailingdocument/$id?access_token=xxxx`

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
$api = new CopernicaRestApi("your-access-token");

// do the call, and print result
print_r($api->get("emailingdocument/1234"));
```

The example above requires the [CopernicaRestApi class](rest-php).
