# REST API: PUT couponcampaign coupons

This method is used to add or update coupons to a campaign with the REST API. It uses 
an HTTP PUT request to the following address:

`https://api.copernica.com/v3/couponcampaign/$couponcampaign/coupons?access_token=xxxx`

## Available parameters

* **source**: array with data: code (required), validfrom (optional), validuntil (optional), redeemed (optional)

## JSON example

```json
{
    "source" :[
        {
            "code":"1234AA",
            "validfrom":"2023-02-25",
            "validuntil":"2023-02-28"
        },
        {
            "code":"1234BB",
            "validfrom":"2023-02-25",
            "validuntil":"2023-02-28"
        }
    ]
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
    'source'          =>  '[
        {
            "code":"1234AA",
            "validfrom":"2023-02-25",
            "validuntil":"2023-02-28"
        },
        {
            "code":"1234BB",
            "validfrom":"2023-02-25",
            "validuntil":"2023-02-28"
        }
    ]'
);

// do the call
$api->put("couponcampaign/$couponcampaign/coupons", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API methods](rest-api)
