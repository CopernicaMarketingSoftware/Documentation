# REST API: GET view profiles

To retrieve all profiles in a selection, send a HTTP GET request to this address:

`https://api.copernica.com/v2/view/$id/profiles?access_token=xxxx`

The `$id` code should be replaced with the numeric identifier of the selection
from which you want to retrieve the profiles.

## Supported parameters

You can add one or more of the following parameters to the URL:

* **fields**: Optional parameter to set conditions for profiles that should be returned.
* **orderby**: Name or ID of the field you want to use to sort the returned profiles.
* **order**: Whether the profiles should be ordered in ascending or descending order.
* **dataonly**: Boolean. If set to true the method will only retrieve the profile data, 
allowing the call to be processed faster.

Paging parameters **start**, **limit** and **total** are also supported. More
information about these parameters can be found in the [article on paging](rest-paging).

The **fields** parameter can be used to filter the profiles. You can for example
use this parameter to only fetch profiles for which the field "country" equals
"France". More information about using this parameter can be found in our
[article about this fields parameter](./rest-fields-parameter.md).

You can assign the name or numeric identifier of a field to the parameter **order**.
This will order the profiles on the given field.
Besides a name or ID, you can also pass a couple of special values to this parameter:

* **id**: The default value, profiles are ordered based on their ID
* **random**: Profiles are randomly ordered
* **modified**: Profiles are ordered based on the *modified* timestamp.

## Returned fields

This method returns a JSON object with profiles under the **data** field. 
The following properties are available for each profile:

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

The following script can be used to fetch profiles from a selection. The 
CopernicaRestApi class that we use in the example takes care of escaping the
parameters that are passed to the URL. If you write your own code to construct
the URL, you must take care of escaping the parameters yourself.

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters to pass to the call
$parameters = array(
    'limit'     =>  100,
    'orderby'   =>  'country',
    'fields'    =>  array("age>16", "age<=65")
);
    
// do the call, and print result
print_r($api->get("view/{$viewID}/profiles", $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](./rest-api.md)
* [GET view profile identifiers](./rest-get-view-profileids.md)
* [POST database profile](./rest-post-database-profiles.md)
* [PUT profile](./rest-put-profile-fields.md)
* [DELETE profile](./rest-delete-profile.md)
