# REST conditions: Export

Conditions are smaller parts of rules. Only one condition has to be 
satisfied to satisfy a rule. Every condition has a few specific properties.

This article is about the **export** condition. If you're looking for 
any other condition you can find them in the **More information** section.

## Individual properties

The export condition has the following parameters:

* **include-never-exported-profiles**: Boolean value to indicate whether 
profiles not exported before should be included.

## Date properties

The date properties can be used to limit the selection to a specified 
time period. All of the variables below are required to be YYYY-MM-DD HH:MM:SS 
format.

* **before-time**: The timestamp before which the export must have occurred.
* **after-time**: The timestamp after which the export must have occurred.
* **before-mutation**: The beforemutation (time difference) of the exportcondition.
* **after-mutation**: The aftermutation (time difference) of the exportcondition.

## Example

If you wanted to only export profiles you have exported before after a 
certain date, you could make that selection using this condition. The 
following values should be used:

* **after-time**: Timestamp you want the exports after
* **include-never-exported-profiles**: false

```php
// required code
require_once("copernica_rest_api.php");

// make a new api object with your access token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // select export condition
    'type' => 'Export',

    // use desired properties
    'include-never-exported-profiles' => true,
);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

## More information

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
