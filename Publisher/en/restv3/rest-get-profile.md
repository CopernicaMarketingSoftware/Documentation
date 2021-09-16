# REST API: GET profile

This is a simple method to request all information from a profile given 
its ID. The profile information can be requested with an HTTP GET call to the
following URL:

`https://api.copernica.com/v3/profile/$id?access_token=xxxx`

The `$id` should be replaced with the numerical identifier of the profile you're
requesting the information of.

## Returned fields

This method returns profile information. The profile object contains the 
following properties:

* **ID**: Numerical ID of the profile
* **fields**: Associative array of field names and values
* **interests**: Array of interests for the profile
* **database**: ID of the database where the profile is stored
* **secret**: The "secret" code linked to a profile
* **created**: Timestamp for creation of profile in YYYY-MM-DD hh:mm:ss format
* **modified**: Timestamp for last edit of profile in YYYY-MM-DD hh:mm:ss format
* **removed**: Indicates whether the profile has been removed or not

### JSON example

The JSON for a profile might look something like this:

```json
{  
   "ID":"18381",
   "fields":{  
      "name":"Test",
      "email":"test@example.com",
   },
   "interests":[  
      "baseball",
      "soccer"
   ],
   "database":"7616",
   "secret":"e5903b43c08g011f7a1e1f2644f618be",
   "created":"2013-01-06 14:19:51",
   "modified":"2019-02-21 13:26:21",
   "removed":false
}
```

## PHP example

The following PHP script demonstrates how to call the API method.

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// do the call, and print result
print_r($api->get("profile/{$profileID}"));
```

The example above requires the [CopernicaRestApi class](rest-php).
    
## More information

* [List of all the API calls](rest-api)
* [GET database profile identifiers](rest-get-database-profileids)
* [POST database profile](rest-post-database-profiles)
* [PUT profile fields](rest-put-profile-fields)
* [DELETE profile](rest-delete-profile)
