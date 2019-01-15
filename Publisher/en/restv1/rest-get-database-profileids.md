# REST API: GET database profile identifiers

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv2/rest-api.md) of the REST API.

It’s very easy to request just the IDs of profiles in a database. 
Just send an HTTP GET request to the following URL:

`https://api.copernica.com/v1/database/$id/profileids?access_token=xxxx`

In this, `$id` should be replaced by the unique numerical identifier of 
the database.

## Available parameters

This method does not support any parameters.

## Returned fields

The method returns a JSON array consisting of numerical identifiers of profiles.

## PHP example
The following PHP script demonstrates how to use the API method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// do the call, and print result
print_r($api->get("database/1234/profileids"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API calls](rest-api)
- [GET database profiles](rest-get-database-profiles)

