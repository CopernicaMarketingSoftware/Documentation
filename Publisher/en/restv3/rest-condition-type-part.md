# REST conditions: Part

Conditions are smaller parts of rules. Only one condition has to be 
satisfied to satisfy a rule. Every condition has a few specific properties.

This article is about the **part** condition. If you're looking for 
any other condition you can find them in the **More information** section.

## Individual properties

The part condition has the following parameters:

* **begin**: The first selected profile as a number or percentage. By 
using a negative value the begin count begins at the end.
* **length**: Set number of selected profiles as a number or percentage. 
* **fields**: All fields used in the condition.

## Example

With the part condition you can easily view part of a selection with 
a certain field value. Here we look at 20 dog owners from our selection.

```php
// required code
require_once("copernica_rest_api.php");

// make a new api object with your access token
$api = new CopernicaRestAPI("your-access-token", 3);

$data = array(
    // select part condition
    'type' => 'Part',

    // set begin
    'begin' => '54',
    
    // set length
    'length' => '20',
    
    // set field
    'fields' => 'dog_owner',
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
