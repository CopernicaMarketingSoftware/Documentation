# REST API: GET subprofile

This is a simple method to request all information from a subprofile given 
its ID. The profile information can be requested with an HTTP GET call to the
following URL:

`https://api.copernica.com/v3/subprofile/$id?access_token=xxxx`

The `$id` should be replaced with the numerical identifier of the subprofile you're
requesting the information of.

## Returned fields

This method returns subprofile information. The JSON object contains the 
following properties:

* **ID**: Numerical ID of the subprofile.
* **secret**: The "secret" code linked to a subprofile.
* **fields**: Associative array of field names and values.
* **profile**: Numerical ID of the profile the subprofile belongs to.
* **collection**: ID of the collection where the subprofile is stored.
* **created**: Timestamp for creation of subprofile in YYYY-MM-DD hh:mm:ss format.
* **modified**: Timestamp for last edit of subprofile in YYYY-MM-DD hh:mm:ss format.
* **removed**: Indicates whether the subprofile has been removed or not.

### JSON example

The JSON for the subprofile might look something like this:

```json
{  
   "ID":"20285",
   "secret":"132879300b4731870080b1cd301fd43d",
   "fields":{  
   },
   "profile":"2139358",
   "collection":"6312",
   "created":"2008-08-25 16:14:56",
   "modified":"2010-08-25 16:15:56",
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
print_r($api->get("subprofile/{$subprofileID}"));
```

The example above requires the [CopernicaRestApi class](rest-php).
    
## More information

* [List of all the API calls](rest-api)
* [GET database profile identifiers](rest-get-database-profileids)
* [POST profile subprofiles](rest-post-profile-subprofiles)
