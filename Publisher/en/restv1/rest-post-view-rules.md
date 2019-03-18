# REST API: POST view rules

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv2/rest-api.md) of the REST API.

Method to add a rule to an existing selection. This is an HTTP POST call to 
the following URL:

`https://api.copernica.com/v1/view/$id/rules?access_token=xxxx`

The `$id` should be replaced by the ID of the view you want to add a rule to. 
The name of the rule and other values should be added to the message body. 
After a successful call the ID of the created request is returned.

## Available parameters

The following properties can be assigned to a rule in the message body. At 
least the name of the rule is required.

- **name**: Name of the rule. This should be unique within the set of view rule 
names and is mandatory
- **view**: ID of the selection that the rule belongs to
- **conditions**: Array of conditions profiles within the selection should conform to, 
such as certain values within certain fields
- **inverted**: Boolean value that when set to "True" will return only profiles 
that do *not* adhere to the rule.
- **disabled**: Boolean value that when set to "True" will disable the rule.

## PHP Example

The following PHP script demonstrates how to call the API method:

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// data to pass to the call
$data = array(
   'name'      =>  'rule-name',
   'view'      =>  1234,
   'inverted'  =>  False
);
    
// do the call
$api->post("view/1234/rules", $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
* [PUT selection](rest-put-view)
* [POST rule conditions](rest-post-rule-conditions)
* [GET view rules](rest-get-view-rules)
