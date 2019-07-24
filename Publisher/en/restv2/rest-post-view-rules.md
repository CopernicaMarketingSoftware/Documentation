# REST API: POST view rules

Method to add a rule to an existing selection. This is an HTTP POST call to 
the following URL:

`https://api.copernica.com/v2/view/$id/rules?access_token=xxxx`

The `$id` should be replaced by the ID of the view you want to add a rule to. 
After a successful call the ID of the created request is returned.

## Available parameters

The following properties can be assigned to a rule in the message body. At 
least the name of the rule is required.

- **name**: Name of the rule. This should be unique within the set of view rule 
names and is mandatory.
- **inverted**: Boolean value that when set to "True" will return only profiles 
that do *not* adhere to the rule.
- **disabled**: Boolean value that when set to "True" will disable the rule.

Conditions can be added with the method [POST rule conditions](./rest-post-rule-conditions).

## PHP Example

The following PHP script demonstrates how to call the API method:

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// data to pass to the call
$data = array(
   'name'       =>  'rule-name',
   'inverted'   =>  false
   'disabled'   =>  false,
);
    
// execute the call and store the result
$result = $api->post("view/{$viewID}/rules", $data);
```

If the call was succesful the result you stored above should contain the 
ID for the new rule. You can immediately use the ID to create new conditions 
using the [POST rule conditions](./rest-post-rule-conditions) method.
The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
* [PUT selection](rest-put-view)
* [POST rule conditions](rest-post-rule-conditions)
* [GET view rules](rest-get-view-rules)
