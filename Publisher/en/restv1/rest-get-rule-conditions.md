# REST API: GET rule conditions

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv2/rest-api.md) of the REST API.

A method to request all conditions from a rule. This method does not 
support parameters. It is called by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v1/rule/$id/conditions?access_token=xxxx`

In this, `$id` needs to be replaced by the numerical identifier or the name of the rule you wish to request the conditions for.

## Available parameters

There are no available parameters for this method.

## Returned fields

This method returns a JSON rule object with the following properties:

- **id**: numeric ID of the condition
- **type**: type of condition
- **rule**: numeric ID of the rule the condition belongs to

Based on the condition type, specific properties are set. For an overview
of the supported conditions and the properties that they support, check
the specific articles:

- [Change conditions](./rest-condition-type-change.md)
- [Date conditions](./rest-condition-type-date.md)
- [DoubleField conditions](./rest-condition-type-doublefield.md)
- [Email conditions](./rest-condition-type-email.md)
- [Export conditions](./rest-condition-type-export.md)
- [Fax conditions](./rest-condition-type-fax.md)
- [Field conditions](./rest-condition-type-field.md)
- [Interest conditions](./rest-condition-type-interest.md)
- [LastContact conditions](./rest-condition-type-lastcontact.md)
- [Miniview conditions](./rest-condition-type-miniview.md)
- [SMS conditions](./rest-condition-type-sms.md)
- [Todo conditions](./rest-condition-type-todo.md)
- [Survey conditions](./rest-condition-type-survey.md)
- [Part conditions](./rest-condition-type-part.md)
- [ReferView conditions](./rest-condition-type-referview.md)

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// do the call, and print result
print_r($api->get("rule/1234/conditions"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [GET rule](./rest-get-rule)
