# REST API: PUT rule conditions

A method to edit conditions for a rule. It is called by sending an HTTP 
POST request to the following URL:

`https://api.copernica.com/v1/rule/$id/conditions/$id?access_token=xxxx`

The `$id` is the ID of the rule and the `$type` is the type of condition 
you want to edit.

## Available parameters

The message body can hold the following properties for a condition:

- **type**: type of condition

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

The following example demonstrates how to use this method. This condition 
is a field condition, satisfied by anyone with the first name Bob.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// parameters to pass to the call
$data = array(
	'type' = 'field'
    'field' = 'firstname'
    'value' = 'Bob'
);

// do the call, and print result
$api->post("rule/id/conditions/id", array(), $data);

// return id of created request if successful
```

## More information

* [Overview of all REST API methods](./rest-api)
* [GET rules](./rest-get-view-rules)
* [GET rule](./rest-get-rule)
* [PUT rule](./rest-put-rule)
* [POST rule condition](./rest-post-rule-conditions)
