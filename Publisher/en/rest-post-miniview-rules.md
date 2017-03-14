# REST API: adding a rule to a selection of a collection

Method to add a rule to an existing selection from a collection (miniview, see [view documentation](rest-post-view-rules) for selections from a database). This is an HTTP POST call to the following URL:

`https://api.copernica.com/v1/miniview/$id/minirules?access_token=xxxx`

The $id should be replaced by the ID of the miniview you want to add a rule to. 
The name of the rule and other values should be added to the message body.

## Available parameters

The following properties can be assigned to a rule in the message body. At 
least the name of the rule is required.

- **name**: Name of the rule. This should be unique within the set of view rule 
names and is mandatory
- **view**: ID of the selection that the rule belongs to
- **conditions**: Array of conditions profiles within the selection should conform to, 
such as certain values within certain fields
- **inversed**: Boolean value that when set to "True" will return only profiles
that do *not* adhere to the rule.
- **disabled**: Boolean value that when set to "True" will disable the rule.

## PHP Example

The following PHP script demonstrates how to call the API method:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // data to pass to the call
    $data = array(
        'name'      =>  'rule-name',
        'view'      =>  1234,
        'inversed'  =>  False
    );
    
    // do the call
    $api->post("miniview/1234/minirules", $data);

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
* [Make new selection](rest-put-miniview)
* [Add rule conditions](rest-post-minirule-conditions)
* [Get selection rules](rest-get-miniview-rules)
