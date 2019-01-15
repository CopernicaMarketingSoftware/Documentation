# REST conditions: Lastcontact

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv2/rest-api.md) of the REST API.

Conditions are smaller parts of rules. Only one condition has to be 
satisfied to satisfy a rule. Every condition has a few specific properties.

This article is about the **lastcontact** condition. If you're looking for 
any other condition you can find them in the **More information** section.

## Individual properties

The lastcontact condition has the following parameters:

* **match-type**: Match type of last contact. Possible values: 
"match_intelligent", "match_exact"
* **match-mode**: Matchmode of lastcontactcondition. Possible values: 
"match_contacted_profiles", "match_not_contacted_profiles".
* **contact-type**: Type of contact had or no contact. Possible values are 
a PxPomContactType or the value "false".
* **min-closed**: Minimum number of items that should be on the contact list.
* **max-closed**: Maximum number of items that should be on the contact list.
* **user**: User of this condition (PxPomUser), or "false" when no selection 
is required.
* **priority**: Get priority of selected contacts.
* **contains**: Search string for searching contact report contents.

## Date properties

The date properties can be used to limit the selection to a specified 
time period. All of the variables below are required to be YYYY-MM-DD HH:MM:SS 
format.

* **before-time**: Matches only profiles that were contacted before this time
* **after-time**: Matches only profiles that were contacted after this time
* **before-mutation**: beforemutation (time difference) for lastcontact condition.
* **after-mutation**: aftermutation (time difference) for lastcontact condition.

## Example

It's also possible to make selections based on the last contactmoment with 
your profiles. If you haven't contacted a customer in a while it might 
be a good idea to get in touch with them again. You can also check how 
often your employees are contacting your customers to see if they are doing 
well. The following example shows such a condition.

```php
// required code
require_once("copernica_rest_api.php");

// make a new api object with your access token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // select lastcontact condition
    'type' => 'LastContact',

    // use time interval
    'after-time' => '2016-12-11 00:34:56',
    
    // set minimum
    'min-closed' => '3',
    
    // search 'Bob' in reports
    'contains' => 'Bob' 
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
* [Condition type todo](rest-condition-type-todo)
