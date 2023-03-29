# REST API: PUT couponcampaign coupon

This method is used to create a new database with the REST API. It uses 
an HTTP PUT request to the following address:

`https://api.copernica.com/v3/couponcampaign/$couponcampaign/coupon/$coupon?access_token=xxxx`

After a successful call the ID of the created request is returned.

## Available parameters

* **redeemed**: boolean om aan te geven dat een coupon ingewisseld is (true/false)

## JSON example

```json
{
    "redeemed" : true
}
```

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to be sent to the api
$data = array(
    'redeemed'          =>  true
);

// do the call
$api->put("couponcampaign/$couponcampaign/coupon/$coupon", $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API methods](rest-api)
