# REST conditions: Doublefield

Conditions are smaller parts of rules. Only one condition has to be 
satisfied to satisfy a rule. Every condition has a few specific properties.

This article is about the **doublefield** condition. If you're looking for 
any other condition you can find them in the **More information** section.

## Individual properties

The doublefield condition has the following parameters:

* **match-mode**: Match mode of doublefield condition. See the match mode table.
* **fields**: The combination of fields that should be checked.

## Match Modes

The following table contains the possible values for the match mode and 
their descriptions.

| Match mode                   | Description                                         |
|------------------------------|-----------------------------------------------------|
| match_unique_profiles        | Match all profiles that are unique                  |
| match_non_unique_profiles    | Match all profiles that are not unique              |
| match_repeated_profiles      | Match all profiles that occurred earlier            |
| match_non_repeated_profiles  | Match all profiles that did not occur earlier       |
| match_last_profiles          | Match all profiles that do not occur later          |
| match_toberepeated_profiles  | Match all profiles that also occur with a higher ID |

## Example

Let's say we want to make a selection of only people with unique names. This 
includes both the first name and the last name. In this case we could describe this 
selection by comparing the first name and the last name fields with the correct 
match-mode. The following values describe this set of people:

* **match-mode**: match_unique profiles
* **fields**: [first_name, last_name]

```php
// required code
require_once("copernica_rest_api.php");

// make a new api object with your access token
$api = new CopernicaRestAPI("your-access-token", 2);

$data = array(
    // select doublefield condition
    'type' => 'DoubleField',

    // use matchmode
    'match-mode' => 'match_unique_profiles',

    // select fields for matchmode
    'fields' => '[first_name, last_name]',
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
* [Condition type field](rest-condition-type-field)
