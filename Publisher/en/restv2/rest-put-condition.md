# REST API: POST rule conditions

A method to update a condition. It is called by sending an HTTP PUT request to the following URL:

`https://api.copernica.com/v2/condition/$id?access_token=xxxx`

In this, `$id` needs to be replaced by the numerical identifier of the condition.

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

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters to pass to the call
$data = array(
	'type'          => 'date',
    'after-time'    => '01-01-2000'
);

// do the call, and print result
$api->post("condition/{$conditionID}/", array(), $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [GET rules](./rest-get-view-rules)
* [GET rule](./rest-get-rule)
* [PUT rule](./rest-put-rule)
* [PUT rule condition](./rest-put-rule-conditions)
