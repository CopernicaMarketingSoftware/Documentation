# REST API: GET database

A method to request all metadata from a database. This method does not 
support parameters. By sending a GET request to the following URL, 
you can fetch the database metadata:

`https://api.copernica.com/v2/database/$id?access_token=xxxx`

where `$id` should be replaced by the identifier of the database you want 
to get the metadata of.

## Returned fields

- **ID**: unique numerical identifier
- **name**: name of the database
- **description**: description of the database
- **archived**: whether or not the database is archived
- **created**: when the database was created
- **fields**: array of fields in the database
- **interests**: array with interests in the database
- **collections**: array with the collections in the database

Fields, interests and collections are returned as arrays of objects. 
If you want to know how these arrays are built, you can check out 
the pages of these API methods, which return similar data:

- [GET database fields](rest-get-database-fields)
- [GET database interests](rest-get-database-interests)
- [GET database collections](rest-get-database-collections)

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// do the call, and print result
print_r($api->get("database/{$databaseID}"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all REST API methods](rest-api)
- [POST database](rest-post-databases)
