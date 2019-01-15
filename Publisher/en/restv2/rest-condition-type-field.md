# REST conditions: Field

Conditions are smaller parts of rules. Only one condition has to be 
satisfied to satisfy a rule. Every condition has a few specific properties.

This article is about the **field** condition. If you're looking for 
any other condition you can find them in the **More information** section.

## Individual properties

The field condition has the following parameters:

* **comparison**: Comparison type for fieldcondition. Possible values: 
"equals", "not equals", "contains", "not contains", "less", "more", "is_email", 
"regexp" and "is-numeric".
* **field**: Field to compare with value
* **value**: Value to compare with field (setting this resets **other-field**)
* **other-field**: Other field to compare **field** with. If this variable is set 
"value" will not be used.
* **numeric-comparison**: Boolean value to indicate whether value comparison is done numerically or not.

## Example

Imagine that you would have a "has_children" field, allowing you 
to group those that have children. In this case you can email a specific 
target group by making a selection that selects on this field. The following 
condition is validated if "has_children" is set to true.

```php
// required code
require_once("copernica_rest_api.php");

// make a new api object with your access token
$api = new CopernicaRestAPI("your-access-token", 2);

$data = array(
    // select field condition
    'type' => 'Field',

    // select field
    'field' => 'has_children',
    
    // set value
    'value' => 'yes',
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
* [Condition type interest](rest-condition-type-interest)
