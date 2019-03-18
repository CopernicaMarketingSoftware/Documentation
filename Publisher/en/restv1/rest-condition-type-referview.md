# REST conditions: Referview

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv2/rest-api.md) of the REST API.

Conditions are smaller parts of rules. Only one condition has to be 
satisfied to satisfy a rule. Every condition has a few specific properties.

This article is about the **referview** condition. If you're looking for 
any other condition you can find them in the **More information** section.

## Individual properties

The referview condition has the following parameters:

* **refer-view**: View that the condition refers to.
* **check-type**: Boolean value to indicate whether a profile should be 
present in the other view. Possible values: "yes", "no".

## Example

You can use this condition to check whether subprofiles have any overlap 
at all, inside or outside of the current view.

```php
// required code
require_once("copernica_rest_api.php");

// make a new api object with your access token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // select referview condition
    'type' => 'ReferView',

    // set check-type
    'check-type' => 'no'
);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
* [Condition type miniview](rest-condition-type-miniview)
