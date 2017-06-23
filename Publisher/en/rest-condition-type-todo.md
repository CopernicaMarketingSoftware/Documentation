# REST conditions: Todo

Conditions are smaller parts of rules. Only one condition has to be 
satisfied to satisfy a rule. Every condition has a few specific properties.

This article is about the **todo** condition. If you're looking for 
any other condition you can find them in the **More information** section.

## Individual properties

The todo condition has the following parameters:

* **match-type**: Match type of last contact. Possible values: 
"match_intelligent", "match_exact"
* **match-mode**: Matchmode of todocondition. Possible values: 
"match_contacted_profiles", "match_not_contacted_profiles".
* **contact-type**: Type of contact that should be open for matching profile. 
This can be any PxPomContactType or "false" if it does not matter.
* **min-closed**: Minimum number of items on the todo list.
* **max-closed**: Maximum number of items on the todo list.
* **user**: User of this condition (PxPomUser), or "false" when no selection 
is required.
* **priority**: Get priority of todo's.
* **contains**: Search string the todo should contain.

## Date properties

The date properties can be used to limit the selection to a specified 
time period. All of the variables below are required to be YYYY-MM-DD HH:MM:SS 
format.

* **before-time**: Matches only profiles that received the document before this time
* **after-time**: Matches only profiles that received the document after this time
* **before-mutation**: The beforemutation (time difference) for the todo condition.
* **after-mutation**: The beforemutation (time difference) for the todo condition.

## Example

Imagine that you just updated your software and some customers need to be 
informed about this. The document for the email was not ready however, 
but you did make todo's for the customers you wanted to contact. You can 
now send to a selection based on todo's. The example below shows the example 
of the condition to achieve this.

The match_intelligent value can be used to ignore potential typo's or 
different spellings of a word.

```php
// required code
require_once("copernica_rest_api.php");

// make a new api object with your access token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // select todo condition
    'type' => 'ToDo',

    // use matchtype 
    'match_type' => 'match_intelligent',
    
    // search 'document name'
    'contains' => 'document name'
);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

## More information

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
* [Condition type lastcontact](rest-condition-type-lastcontact)
