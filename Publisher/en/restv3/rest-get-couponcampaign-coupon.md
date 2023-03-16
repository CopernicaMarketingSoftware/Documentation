# REST API: GET couponcampaign coupon

A method to request a specific coupon inside a coupon campaign. 
This is an HTTP GET call to the following address:

`https://api.copernica.com/v3/couponcampaign/$id/coupon/$id?access_token=xxxx`

The first `$id` here should be replaced with the numerical identifier of the coupon campaign. The second `$id` should be replaced with the numerical identifier of the coupon.

## Returned fields

The method returns a JSON object that contains the following fields:

| Variable          | Description                                                                               |
|-------------------|-------------------------------------------------------------------------------------------|
| **ID**            | The ID of the coupon                                                                      |
| **code**          | Code of the coupon                                                                        |
| **validfrom**     | Date from which the coupon is valid                                                       |
| **validuntil**    | Date until which the coupon is valid                                                      |
| **status**        | Status of the coupon (available, sent, redeemed)                                          |

## JSON example

The JSON for this method might look something like this:

```json
{
  "ID": "1",
  "code": "1234CD",
  "validfrom": {
    "date": "2023-02-16 10:03:58.000000",
    "timezone_type": 3,
    "timezone": "Europe/Amsterdam"
  },
  "validuntil": null,
  "status": "redeemed"
}
```

## PHP example

The following PHP scripts is an example of how to call this API method:

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this to your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// execute the call and print the result.
print_r($api->get("couponcampaign/{$couponcampaignID}/coupon/{$couponID}"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information
* [Overview of all API calls](rest-api)
