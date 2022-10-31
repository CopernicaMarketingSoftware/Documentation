# REST API: POST miniview rules

Method to add a rule to an existing mini selection from a collection (miniview, 
see [view documentation](rest-post-view-rules) for selections from a 
database). This is an HTTP POST call to the following URL:

`https://api.copernica.com/v2/miniview/$id/rules?access_token=xxxx`

The `$id` should be replaced by the ID of the miniview you want to add a rule to. 
The name of the rule and other values should be added to the message body. 
After a successful call the ID of the created request is returned.

## Available parameters

The following properties can be assigned to a rule in the message body. At 
least the name of the rule is required.

- **name**: Name of the rule. This should be unique within the set of view rule 
names and is mandatory

## PHP Example

The following PHP script demonstrates how to call the API method:

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// data to pass to the call
$data = array(
    'name'      =>  'rule-name'
);
    
// do the call
$api->post("miniview/{$miniviewID}/minirules", $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
* [PUT miniview](rest-put-miniview)
* [POST minirule conditions](rest-post-minirule-conditions)
* [GET miniview rules](rest-get-miniview-rules)
