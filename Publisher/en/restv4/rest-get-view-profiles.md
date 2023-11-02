# REST API: GET view (selection) profiles

You can request all profiles from a view (selection) with an HTTP GET call 
to the following URL:

`https://api.copernica.com/v3/view/$id/profiles?access_token=xxxx`

The `$id` should be replaced with the numerical identifier of the view you
want to fetch the profiles of. Since this can be 
quite a time-consuming call it is possible to use the 'dataonly' property 
to speed it up.

## Supported parameters

The following parameters can be added to the URL as variables:

* **start**: First ID to retrieve
* **limit**: Length of the batch
* **total**: Boolean. Indicates whether to show the total or not. Setting this to 'false' 
will speed up the call.
* **fields**: Optional parameter to set conditions for profiles that should be returned.
* **dataonly**: Boolean. If set to true the method will only retrieve the ID, fields, interests, 
and modified date to speed up the call.

### Paging

More information on the **start**, **limit** and **total** parameters can be found in 
the [article on paging](rest-paging).

### Fields

The **fields** parameter can be used to select subprofiles. For example, 
if you only want to request subprofiles where the field “country” equals 
“The Netherlands”, you can do so using “fields”. More information on 
this parameter can be found in the 
[article on the “fields” parameter](rest-fields-parameter).

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

Please note that some of these fields will not be available if the **dataonly** 
parameter has been set to true.

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
$api = new CopernicaRestAPI("your-access-token", 3);

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
