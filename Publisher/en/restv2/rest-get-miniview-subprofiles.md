# REST API: GET miniview (miniselection) subprofiles

Subprofiles are to a collection what regular profiles are to a database. 
You can request all subprofiles from a miniview with an HTTP GET call 
to the following URL:

`https://api.copernica.com/v2/miniview/$id/subprofile?access_token=xxxx`

The `$id` should be replaced with the numerical identifier of the miniview you
want to fetch the subprofiles of. Since this can be 
quite a time-consuming call it is possible to use the 'dataonly' property 
to speed it up.

## Available parameters

The following parameters can be added to the URL as variables:

* **start**: first subprofile to fetch
* **limit**: length of the batch to fetch
* **total**: boolean value to show total of available subprofiles
* **fields**: optional parameter to only fetch subprofiles with certain field values
* **dataonly**: Boolean. If set to true the method will only retrieve the ID, fields, collection ID, 
profile ID and modified date to speed up the call.

### Paging 

More information on the **start**, **limit** and **total** parameters can be found in 
the [article on paging](rest-paging).

### Fields
 
The **fields** parameter can be used to filter the profiles. You can for example
use this parameter to only fetch profiles for which the field "country" equals
"France". More information about using this parameter can be found in our
[article about this fields parameter](./rest-fields-parameter.md).

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

Please note that some of these fields will not be available if the **dataonly** 
parameter has been set to true.

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
$api = new CopernicaRestAPI("your-access-token", 2);

// do the call, and print result
print_r($api->get("miniview/{$miniviewID}/subprofiles"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [GET miniview](rest-get-miniview)
