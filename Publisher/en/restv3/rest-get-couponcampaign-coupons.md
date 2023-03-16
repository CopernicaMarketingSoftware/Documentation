# REST API: GET couponcampaign coupons

A method to request a list of all coupons inside a coupon campaign. 
This is an HTTP GET call to the following address:

`https://api.copernica.com/v3/couponcampaign/$id/coupons?access_token=xxxx`

The `$id` here should be replaced with the numerical identifier of the coupon campaign.

## Available parameters

The following parameters can be added to the URL as variables:

* **start**: First ID to retrieve.
* **limit**: Length of the batch.
* **total**: Boolean. Indicates whether to show the total or not. Setting this to 'false' 
will speed up the call.
* **fields**: Optional parameter to set conditions for coupons that should be returned.

### Paging

More information on the **start**, **limit** and **total** parameters can be found in 
the [article on paging](rest-paging).

### Fields

The **fields** parameter can be used to select coupons. For example, 
if you only want to request available coupons. 

Available filters:
* **status**: status of the coupons (available, sent, redeemed)
* **valid**: Boolean. This allows you to indicate whether you want to receive all coupons or only available coupons

More information on this parameter can be found in the 
[article on the “fields” parameter](rest-fields-parameter).


## Returned fields

The method returns a JSON object that contains the following fields:

| Variable          | Description                                                                               |
|-------------------|-------------------------------------------------------------------------------------------|
| **ID**            | The ID of the coupon                                                                      |
| **code**          | Code of the coupon                                                                        |
| **validfrom**     | Date from which the coupon is valid                                                       |
| **validuntil**    | Date until which the coupon is valid                                                      |
| **status**        | Status of the coupon (available, sent, redeemed                                           |

## JSON example

The JSON for this method might look something like this:

```json
{
  "start": 0,
  "limit": 100,
  "count": 3,
  "data": [
    {
      "ID": "8",
      "code": "2345DU",
      "validfrom": "2023-02-22 14:54:07",
      "validuntil": "",
      "status": "available"
    },
    {
      "ID": "9",
      "code": "2345FA",
      "validfrom": "2023-02-22 14:54:07",
      "validuntil": "",
      "status": "sent"
    },
    {
      "ID": "10",
      "code": "2345KI",
      "validfrom": "2023-02-22 14:54:07",
      "validuntil": "",
      "status": "redeemed"
    }
  ],
  "total": 3
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
print_r($api->get("couponcampaign/{$ID}/coupons"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information
* [Overview of all API calls](rest-api)
