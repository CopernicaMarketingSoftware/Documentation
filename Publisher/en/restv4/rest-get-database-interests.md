# REST API: GET database interests

A list of all available interests in a database can be requested using 
the following URL:

`https://api.copernica.com/v4/database/$id/interests`

The variable `$id` has to be replaced by the numerical identifier or the 
name of the database of which you want to request the interests.

## Available parameters

The following parameters can be added to the URL as variables:

- **start**: the first interest to be requested
- **limit**: length of the batch that is requested
- **total**: whether or not the total amount of interests should be counted

More information on the meaning of these parameters can be found 
[in the article on paging](rest-paging).

## Returned fields

The method returns a list of interests in the database. For each interest 
the following properties are returned:

- **ID**:       The ID of the interest
- **name**:     The name of the interest
- **group**:    The group the interest belongs to

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// parameters to pass to the call
$parameters = array(
    'limit'     =>  100
);

// do the call, and print result
print_r($api->get("database/{$databaseID}/interests", $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API calls](rest-api)
- [POST database interests](rest-post-database-interests)
- [POST profile interests](rest-post-profile-interests)
