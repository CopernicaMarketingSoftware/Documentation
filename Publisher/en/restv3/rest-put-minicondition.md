# REST API: PUT minicondition

A method to update a minicondition. It is called by sending an HTTP PUT request to the following URL:

`https://api.copernica.com/v3/minicondition/$type/$id?access_token=xxxx`

The `$type` and `$id` need to be replaced by the type and the numerical 
identifier of the minicondition respectively.

## Available parameters

Based on the minicondition type, specific properties are set. For an overview
of the supported miniconditions and the properties that they support, check
the specific articles:

- [Change miniconditions](./rest-condition-type-change.md)
- [Date miniconditions](./rest-condition-type-date.md)
- [DoubleField miniconditions](./rest-condition-type-doublefield.md)
- [Email miniconditions](./rest-condition-type-email.md)
- [Export miniconditions](./rest-condition-type-export.md)
- [Field miniconditions](./rest-condition-type-field.md)
- [Miniview miniconditions](./rest-condition-type-miniview.md)
- [SMS miniconditions](./rest-condition-type-sms.md)
- [Survey miniconditions](./rest-condition-type-survey.md)
- [Part miniconditions](./rest-condition-type-part.md)

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters to pass to the call
$data = array(
    'after-time'    => '01-01-2000'
);

// do the call, and print result
$api->put("minicondition/{$miniconditionType}/{$miniconditionID}", array(), $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
