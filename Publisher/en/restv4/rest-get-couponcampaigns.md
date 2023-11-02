# REST API: GET couponcampaigns

A method to request a list of all coupon campaigns. 
This is an HTTP GET call to the following address:

`https://api.copernica.com/v4/couponcampaigns`

## Returned fields

The method returns a JSON object that contains the following fields:

| Variable          | Description                                                                               |
|-------------------|-------------------------------------------------------------------------------------------|
| **ID**            | The ID of the coupon campaign                                                             |
| **name**          | Name of the coupon campaign                                                              |
| **description**   | Description of the coupon campaign                                                               |
| **archived**      | Whether or not the coupon campaign is archived                                            |
| **available**     | Number of available coupons                                                               |
| **sent**          | Number of sent coupons                                                                    |
| **redeemed**      | Number of redeemed coupons                                                                |
| **tags**          | Array with the tags for this coupon campaign                                              |

## JSON example

The JSON for this method might look something like this:

```json
{
  "start": 0,
  "limit": 100,
  "count": 2,
  "data": [
    {
      "ID": "1",
      "code": "Winter VIP Sale",
      "description": "Campaign for VIP clients during winter",
      "archived": false,
      "available": 514,
      "sent": 751,
      "redeemed": 91,
      "tags": [
        "10euro",
        "discount"
      ]
    },
    {
      "ID": "2",
      "code": "Summer VIP Sale",
      "description": "Campaign for VIP clients during summer",
      "archived": false,
      "available": 20,
      "sent": 151,
      "redeemed": 23,
      "tags": []
    }
  ],
  "total": 2
}
```

## PHP example

The following PHP scripts is an example of how to call this API method:

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this to your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// execute the call and print the result.
print_r($api->get("couponcampaigns"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information
* [Overview of all API calls](rest-api)
