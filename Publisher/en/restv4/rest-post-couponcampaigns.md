# REST API: POST couponcampaigns

This method is used to create a new coupon campaign with the REST API. It uses 
an HTTP POST request to the following address:

`https://api.copernica.com/v4/couponcampaigns`

After a successful call the ID of the created request is returned.

## Available parameters

* **name**: name of the new coupon campaign
* **description**: optional description of the coupon campaign
* **archived**: optional boolean value to archive the coupon campaign upon creation
* **tags**: optional array with tags for the coupon campaign

## JSON example

```json
{
    "name" : "Test campaign",
    "description" : "This is a test campaign",
    "tags" : [
        "Test",
        "Campaign"
    ]
}
```

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data to be sent to the api
$data = array(
    'name'          =>  'Test campaign',
    'description'   =>  'This is a test campaign',
    'tags'          =>  array("Test", "Campaign")
);

// do the call
$api->post("couponcampaigns", $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API methods](rest-api)
