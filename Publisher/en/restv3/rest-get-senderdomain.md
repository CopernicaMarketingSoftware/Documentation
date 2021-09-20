# REST API: GET senderdomain

This method is used to fetch an existing senderdomain with the REST API. It uses 
an HTTP GET request to the following address:

`https://api.copernica.com/v3/senderdomain/$id?access_token=xxxx`

Replace the `$id` with the identifier of the senderdomain you want to fetch.

## Returned parameters

| Name              | Description                                                                           |
|-------------------|---------------------------------------------------------------------------------------|
| **ID**            | Unique numerical identifier of the senderdomain.                                      |
| **domain**        | The domain that you are sending email with.                                           |
| **approved**      | Whether the senderdomain is validated or not.                                         |
| **records**       | A list with the different DNS records                                                 |

### JSON voorbeeld

The JSON for the database might look something like this:

```json
{  
   "ID": "113",
   "domain": "https://mysenderdomain.com",
   "approved": true,
   "records": [{
       "type": "dns",
       "property": "validation",
       "record": "TXT",
       "name": "copernica-mysenderdomain.nl",
       "value": "Q3YzYwMGI0ODNlYzUxMmE2ZWVhM2JjMDY1MTUwOGQ4OTZiNjhhMjgzMzQ1MGE1MWZkNjhiZDgwNwxx",
       "actual": [],
       "valid": "valid"
   }, ...]
}
```

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once("copernica_rest_api.php");

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// do the call, and print result
$api->get("senderdomain/{$id}");
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all REST API methods](rest-api)
- [POST senderdomains](rest-post-senderdomains)
- [PUT senderdomain](rest-put-senderdomain)
- [DELETE senderdomain](rest-delete-senderdomain)
