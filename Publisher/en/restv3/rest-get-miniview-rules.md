# REST API: GET miniview rules

A miniview is to a collection what view is to the database. To retrieve 
the rules of such a selection you can send an HTTP GET request to this 
address:

`https://api.copernica.com/v3/miniview/$id/rules?access_token=xxxx`

The `$id` should be replaced with the numeric identifier of the selection
from which you want to retrieve the rules.

## Supported parameters

You can add one or more of the following parameters to the URL:

- **start**: the first rule to fetch
- **limit**: max size of the requested batch
- **total**: show/hide the total number of matching rules

You can find more information about the **start**, **limit** and **total** parameters 
in our [paging article](./rest-paging.md). 

## The returned properties

This method returns a list of rules. Each item in this list is a JSON object
with the following properties:

- **id**: ID of the rule
- **name**: name of the rule
- **description**: description of the rule
- **view**: ID of the selection that the rule belongs to
- **conditions**: array of conditions for the rule
- **inversed**: boolean value to indicate whether the rule should be inversed. 
If set to "True" only profiles *not* conforming to the conditions are selected
- **disabled**: boolean value to indicate whether the rule should be disabled or not

## PHP example

The following script can be used to fetch rules from a selection.

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters to pass to the call
$parameters = array(
   'limit'     =>  100,
);
    
// do the call, and print result
print_r($api->get("miniview/{$miniviewID}/rules", $parameters));
```
    
The example above requires the [CopernicaRestApi class](rest-php).
    
## More information

* [Overview of all API calls](./rest-api.md)
* [GET view rule](./rest-get-view-rule)
* [GET rule](./rest-get-rule)


