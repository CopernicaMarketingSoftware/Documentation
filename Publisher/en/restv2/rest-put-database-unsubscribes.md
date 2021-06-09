# REST API: PUT unsubscribe profiles based on fields

You can execute the setup unsubscribe behavior of profiles matching certain criteria in a database 
by sending an HTTP PUT request to the following URL:

`https://api.copernica.com/v2/database/$id/unsubscribes?access_token=xxxx`

The variable `$id` should be replaced with the ID of the database in which you want to search for the profiles to unsubscribe.

## Supported parameters

To select profiles we pass data through the URL, the following parameter has to be used:

* **fields**: required parameter to select the profiles of which the unsubscribe behavior has to be executed

The **fields** parameter is required, to prevent overwriting all profiles in a
database with a single API call. Only the profiles that match with the supplied
fields are modified. You can find more information about this parameter in
[the article about this parameter](./rest-fields-parameter.md).

## Body data

The request does not need any additional data to be sent in the body. The [CopernicaRestApi class](rest-php) class does require a body to be sent, so in this case we use an empty array.


## PHP example

The following PHP script demonstrates how the API method can be called.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// body data
$data = array();

// parameters for profile selection
$parameters = array(
    'fields'    =>  array("ID==4567")
);

// do the call
$api->put("database/{$databaseID}/unsubscribes", $data, $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API calls](rest-api)
* [Unsubscribe subprofiles based on fields](rest-put-collection-unsubscribes)