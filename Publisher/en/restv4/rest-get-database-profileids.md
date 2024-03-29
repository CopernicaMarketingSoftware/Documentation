# REST API: GET database profile identifiers

It’s very easy to request just the IDs of profiles in a database. 
Just send an HTTP GET request to the following URL:

`https://api.copernica.com/v4/database/$id/profileids`

In this, `$id` should be replaced by the unique numerical identifier of 
the database.

## Available parameters

This method only support paging parameters. More information on these 
parameters can be found [in the article on paging](./rest-paging.md).

## Returned fields

The method returns a JSON array consisting of numerical identifiers of profiles.

## PHP example
The following PHP script demonstrates how to use the API method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// do the call, and print result
print_r($api->get("database/{$databaseID}/profileids"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API calls](rest-api)
- [GET database profiles](rest-get-database-profiles)

