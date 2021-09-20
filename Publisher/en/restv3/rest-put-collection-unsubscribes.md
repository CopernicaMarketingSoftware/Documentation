# REST API: PUT unsubscribe subprofiles based on fields

You can execute the setup unsubscribe behavior of subprofiles matching certain criteria in a collection 
by sending an HTTP PUT request to the following URL:

`https://api.copernica.com/v3/collection/$id/unsubscribes?access_token=xxxx`

The variable `$id` should be replaced with the ID of the collection in which you want to search for the subprofiles to unsubscribe.

## Supported parameters

To select subprofiles we pass data through the URL, the following parameter has to be used:

* **fields**: required parameter to select the subprofiles of which the unsubscribe behavior has to be executed

The **fields** parameter is required, to prevent overwriting all subprofiles in a
collection with a single API call. Only the subprofiles that match with the supplied
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
$api = new CopernicaRestAPI("your-access-token", 3);

// body data
$data = array();

// parameters for subprofile selection
$parameters = array(
    'fields'    =>  array("ID==4567")
);

// do the call
$api->put("collection/{$collectionID}/unsubscribes", $data, $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API calls](rest-api)
* [Unsubscribe profiles based on fields](rest-put-database-unsubscribes)