# REST API: POST rule conditions

A method to add a condition for a rule. It is called by sending an HTTP POST request to the following URL:

`https://api.copernica.com/v3/rule/$id/conditions?access_token=xxxx`

In this, `$id` needs to be replaced by the numerical identifier or the name 
of the rule you wish to edit the conditions of. After a successful call 
the ID of the created request is returned.

## Available parameters

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

## JSON example
The following JSON demonstrates how to use the API method:

```json
{
    "type": "field",
    "comparison": "equals",
    "field": 12,
    "value": "test"
}
```

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters to pass to the call
$data = array(
    'type'         => 'field',
    'comparison'   => 'equals',
    'field'        => 12,
    'value'        => 'test'
);

// do the call, and print result
$api->post("rule/{$rule}/conditions", array(), $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [GET rules](./rest-get-view-rules)
* [GET rule](./rest-get-rule)
* [PUT rule](./rest-put-rule)
* [PUT rule condition](./rest-put-rule-conditions)
