# REST API: POST database copy

This method is used to copy a database with the REST API. It uses 
an HTTP POST request to the following address:

`https://api.copernica.com/v2/database/$id/copy?access_token=xxxx`

The `$id` in the URL should be replaced by the database you want to copy. 
After a successful call the ID of copy is returned. Please note that it 
may take a while for the copy to be completed.

## Available parameters

The method requires either an existing database ID for the copy, or a 
name for a new database. If both are given the name is ignored.

* **target**: ID of an existing database to copy to
* **name**: Name for the new database
* **options**: Array with options for copying

The options array contains several variables defining what exactly should 
be copied. You can set the following variables in the array:

* **views**: Boolean that indicates whether the views should be included in the copy.
* **collections**: Boolean that indicates whether the collections should be included in the copy.
* **miniviews**: Boolean that indicates whether the miniview should be included in the copy. 
You can only copy miniviews if the collections are copied as well.
* **profiles**: Boolean that indicates whether the profiles should be included in the copy.
* **subprofiles**: Boolean that indicates whether the subprofiles should be included in the copy. 
You can only copy subprofiles if both the collections and profiles are copied as well.

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// set the options for copying
$options = array(
    'collections'   =>  true,
    'miniviews'     =>  true,
    'views'         =>  true,
    'profiles'      =>  true,
    'subprofiles'   =>  true
);

// copy data
$data = array(
    'name'      =>  'Database (copy)',
    'options'   =>  $options
);

// copy the database
print_r($copyID = $api->post("database/{$databaseID}/copy", $data));

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API methods](rest-api)
- [GET databases](rest-get-databases)
