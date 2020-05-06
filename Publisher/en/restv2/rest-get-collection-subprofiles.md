# REST API: GET collection subprofiles

You can request all subprofiles from a collection with an HTTP GET call 
to the following URL:

`https://api.copernica.com/v2/collection/$id/subprofiles?access_token=xxxx`

The `$id` should be replaced with the numerical identifier of the collection you
want to fetch the subprofiles of. Since this can be 
quite a time-consuming call it is possible to use the 'dataonly' property 
to speed it up.

## Available parameters

The following parameters can be added to the URL as variables for the call:

* **start**: first subprofile to fetch
* **limit**: length of the batch to fetch
* **total**: boolean value to show total of available subprofiles
* **fields**: optional parameter to only fetch subprofiles with certain field values
* **orderby**: name or ID of field to sort subprofiles by (default = subprofile ID)
* **order**: Ascending (asc) or descending (desc) order.
* **dataonly**: Boolean. If set to true the method will only retrieve the profile data, 
allowing the call to be processed faster.

More information on the **start**, **limit** and **total** parameters can be found in 
the [article on paging](rest-paging).

The parameter fields can be used to select subprofiles. In case you only want 
to fetch the profiles where the value of the field "country" is equal to 
"Netherlands" you can assert this in the *fields* field. For more information on 
using the *fields* parameter you can consult the [article on the fields parameter](rest-fields-parameter).

The variable order can be set to the name or the ID of a field to sort the 
subprofiles by it. There are also three special values to sort by:

* **id**: default value, sort subprofiles by ID
* **random**: return subprofiles in a random order
* **modified**: subprofiles are ordered by last modified

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

The following PHP script demonstrates how to call the API method.

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
print_r($api->get("collection/{$collectionID}/subprofiles", $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [GET collection profile identifiers](rest-get-collection-subprofiles)
