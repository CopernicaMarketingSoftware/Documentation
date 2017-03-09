# REST API: fetching rules from a selection

To retrieve all rules in a selection, send a HTTP GET request to this address:

`https://api.copernica.com/v1/view/$id/rules?access_token=xxxx`

The $id code should be replaced with the numeric identifier of the selection
from which you want to retrieve the rules.

## Supported parameters

You can add one or more of the following parameters to the URL:

- **start**: the first rule to fetch
- **limit**: max size of the requested batch
- **total**: show/hide the total number of matching rules

You can find more information about the *start*, *limit* and *total* parameters 
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

The following script can be used to fetch rules from a selection. The 
CopernicaRestApi class that we use in the example takes care of escaping the
parameters that are passed to the URL. If you write your own code to construct
the URL, you must take care of escaping the parameters yourself.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // parameters to pass to the call
    $parameters = array(
        'limit'     =>  100,
    );
    
    // do the call, and print result
    print_r($api->get("view/1234/rules", $parameters));

You need the [CopernicaRestApi class](./rest-php.md) to run the example.
    
## More information

* [Overview of all API calls](./rest-api.md)
* [Get a selection rule by ID](./get-view-rule)
* [Request a list of rules from database](./rest-get-rule)


