# REST API: PUT rule

A method to edit the properties of an existing rule. It is called using
the following URL:

`https://api.copernica.com/v4/rule/$id`

The `$id` needs to be replaced with the ID of the rule you want to edit
the properties of.

## Available data

The following data can be placed in the message body of the HTTP PUT command:

- **name**: name of the rule
- **inversed**: boolean value to indicate whether the rule should be inversed.
If set to "True" only profiles *not* conforming to the conditions are selected
- **disabled**: boolean value to indicate whether the rule should be disabled or not

## JSON example
The following JSON demonstrates how to use the API method:

```json
{
    "name": "new_name"
}
```

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data to be sent to the api
$data = array(
   	'name'   =>  'new_name'
);

// do the call, and print result
print_r($api->put("rule/{$ruleID}", $data));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [POST view rule](./rest-post-view-rules)
