# REST API: GET profile subprofiles

Subprofiles are to a collection what regular profiles are to a database.
To request the subprofiles that represent a certain profile in a certain
collections you can send an HTTP GET request to the following URL:

`https://api.copernica.com/v4/profile/$id/subprofiles/$id`

The first `$id` should be replaced with the numerical identifier of the profile 
you're requesting the subprofiles of and the second `$id` should be replaced
with the identifier of the collection that contains the subprofile.

## Returned fields

This method returns a JSON object with the subprofiles under the **data** 
property. Each subprofile contains the following fields:

* **ID**: Numerical ID of the subprofile.
* **secret**: The "secret" code linked to a subprofile.
* **fields**: Associative array of field names and values.
* **profile**: Numerical ID of the profile the subprofile belongs to.
* **collection**: ID of the collection where the subprofile is stored.
* **created**: Timestamp for creation of subprofile in YYYY-MM-DD hh:mm:ss format.
* **modified**: Timestamp for last edit of subprofile in YYYY-MM-DD hh:mm:ss format.
* **removed**: Indicates whether the subprofile has been removed or not.

### JSON example

The JSON for a single subprofile might look something like this:

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

## PHP Example

The following PHP script demonstrates how to use the API method.

```php
// dependencies
require_once('copernica_rest_api.php');
  
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// do the call, and print result
print_r($api->get("profile/{$profileID}/subprofiles/{$collectionID}"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [GET profile](rest-get-profile)
