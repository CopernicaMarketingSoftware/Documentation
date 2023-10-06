# REST API: PUT interest

You can update an interest by sending an HTTP PUT request 
to the following URL:

`https://api.copernica.com/v3/interest/$id/?access_token=xxxx`

Replace the `$id` by the ID of the interest that you want to update.

## Available parameters

The following parameters can be added to the call:

* **name**:     New name for the interests.
* **group**:    New group name for the interest. This does not affect 
interests currently in this group.

## JSON example

The following JSON demonstrates how to use the API method:

```json
{
  "name": "Football",
  "group": "Sport"
}
```

## PHP Example

The following PHP script demonstrates how to use this API method:

```php
// requirements
require_once('copernica_rest_api.php');

// change this to your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data for the method
$data = array(
    'name'  =>  "soccer",
    'group' =>  "sports"
);

// execute the call and print the results
$api->put("interest/{$interesseID}/", $data);
```

This example requires the [REST API class](rest-php).

## More information

* [Overview of all available API calls](rest-api)
* [GET database interests](./rest-get-database-interests)
