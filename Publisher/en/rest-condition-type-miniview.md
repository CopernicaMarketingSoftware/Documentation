# REST conditions: Miniview

Conditions are smaller parts of rules. Only one condition has to be 
satisfied to satisfy a rule. Every condition has a few specific properties.

This article is about the **miniview** condition. If you're looking for 
any other condition you can find them in the **More information** section.

## Individual properties

The miniview condition has the following parameters:

* **mini-view**: Miniview associated with condition
* **min-subprofiles**: Minimum number of subprofiles in the miniview
* **max-subprofiles**: Maximum number of subprofiles in the miniview

## Example

It's possible to combine multiple miniviews if there are too many. Too check 
if the miniview is small enough to combine you can use the max-subprofiles 
property of the miniview condition, like this:

```php
// required code
require_once("copernica_rest_api.php");

// make a new api object with your access token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // select miniview condition
    'type' => 'MiniView',

    // set maximum
    'max-subprofiles' => '14'
);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

## More information

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
* [Condition type referview](rest-condition-type-referview)
