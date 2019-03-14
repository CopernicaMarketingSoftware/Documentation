# REST API: GET rule

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv2/rest-api.md) of the REST API.

A method to request all metadata from a rule. This method does not 
support parameters. It is called by sending an HTTP GET request to the 
following URL:

`https://api.copernica.com/v1/rule/$id?access_token=xxxx`

In this, `$id` needs to be replaced by the numerical identifier or the 
name of the rule you wish to request the selections for.

## Available parameters

There are no available parameters for this method.

## Returned fields

This method returns a JSON rule object with the following properties:

- **id** ID of the rule
- **name**: name of the rule
- **description**: description of the rule
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
$api = new CopernicaRestApi("your-access-token");

// do the call, and print result
print_r($api->get("rule/1234"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [GET view rules](./rest-get-view-rules)
