# REST API: PUT minirule

A minirule is to a miniview what a rule is to a view. A method to edit 
the properties of an existing minirule can be called by sending an HTTP 
PUT request to the following URL:

`https://api.copernica.com/v3/minirule/$id?access_token=xxxx`

The `$id` needs to be replaced with the ID of the minirule you want to 
edit the properties of.

## Available data

The following keys can be placed in the message body of the HTTP 
PUT command:

- **name**: name of the rule
- **view**: ID of the selection that the rule belongs to
- **conditions**: array of conditions for the rule
- **inverted**: boolean value to indicate whether the rule should be inverted. 
If set to "True" only profiles *not* conforming to the conditions are selected
- **disabled**: boolean value to indicate whether the rule should be disabled or not

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to be sent to the api
$data = array(  	
	'name'   =>  'new rule name',
);

// do the call, and print result
print_r($api->put("minirule/{$ruleID}", $data));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [GET minirules](./rest-get-minirule)
