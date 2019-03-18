# REST API: GET minirule

A minirule is to a collection what a regular rule is to a database. 
A method to request all metadata from a minirule can be called by sending 
an HTTP GET request to the following URL:

'https://api.copernica.com/v2/minirule/$id?access_token=xxxx'

The `$id` needs to be replaced by the numerical identifier or the 
name of the minirule you wish to request the selections for.

## Available parameters

There are no available parameters for this method.

## Returned fields

This method returns a JSON minirule object with the following properties:

- **id** ID of the rule
- **name**: name of the rule
- **view**: ID of the selection that the rule belongs to
- **conditions**: array of conditions for the rule
- **inversed**: boolean value to indicate whether the rule should be inversed. 
If set to "True" only profiles *not* conforming to the conditions are selected
- **disabled**: boolean value to indicate whether the rule should be disabled or not

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// do the call, and print result
print_r($api->get("minirule/{$miniruleID}"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [GET miniview rules](./rest-get-miniview-rules)
