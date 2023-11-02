# REST API: GET database profiles

You can request all profiles from a database with an HTTP GET call 
to the following URL:

`https://api.copernica.com/v3/database/$id/profiles?access_token=xxxx`

In this, `$id` should be replaced by the numerical identifier, the ID, 
of the database you want to request profiles from. Since this can be 
quite a time-consuming call it is possible to use the 'dataonly' property 
to speed it up.

## Available parameters

The following parameters can be added to the URL as variables:

* **start**: First ID to retrieve.
* **limit**: Length of the batch.
* **total**: Boolean. Indicates whether to show the total or not. Setting this to 'false' 
will speed up the call.
* **fields**: Optional parameter to set conditions for profiles that should be returned.
* **orderby**: Name or ID of field to sort profiles by (defaults to ID).
* **order**: Ascending ('asc') or descending ('desc') order.
* **dataonly**: Boolean. If set to true the method will only retrieve the ID, fields, interests, 
and modified date to speed up the call.

### Paging

More information on the **start**, **limit** and **total** parameters can be found in 
the [article on paging](rest-paging).

### Fields

The **fields** parameter can be used to select profiles. For example, 
if you only want to request profiles where the field “country” equals 
“The Netherlands”, you can do so using “fields”. More information on 
this parameter can be found in the 
[article on the “fields” parameter](rest-fields-parameter).

### Ordering

The **orderby** variable can be set to the name or the ID of a field to sort the 
subprofiles by it. There are also three special values to sort by:

* **id**: default value, sort subprofiles by ID
* **random**: return subprofiles in a random order
* **modified**: subprofiles are ordered by last modified

The **order** variable can be used to sort in ascending ('asc') or descending 
('desc') order.

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

The following script demonstrates how to use this method.

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
print_r($api->get("database/{$databaseID}/profiles", $parameters));`
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API calls](rest-api)
- [GET database profile identifiers](rest-get-database-profileids)
- [POST database profiles](rest-post-database-profiles)
- [PUT profile fields](rest-put-profile-fields)
- [DELETE profile](rest-delete-profile)
