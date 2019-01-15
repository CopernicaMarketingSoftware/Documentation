# REST conditions: Interest

Conditions are smaller parts of rules. Only one condition has to be 
satisfied to satisfy a rule. Every condition has a few specific properties.

This article is about the **interest** condition. If you're looking for 
any other condition you can find them in the **More information** section.

## Individual properties

The interest condition has the following parameters:

* **match-mode**: Matchmode of interest condition. Possible values: 
"match_profiles_with_interest", "match_profiles_without_interest", 
"match_profiles_with_interest_group", "match_profiles_without_interestgroup".
* **interest**: Interest of the condition. This only returns a valid value 
if the matchmode is "match_profiles_with_interest" or "match_profiles_without_interest".
* **interest-group**: Interestgroup of the condition. This only returns a valid value 
if the matchmode is "match_profiles_with_interestgroup" or "match_profiles_without_interestgroup".

## Example

Imagine that you have a sports store and want to send an email showcasing 
your new tennis collection. This requires "tennis" to exist as an interest 
in the database. When this is the case you can easily write a condition, as 
shown below, to make a selection of tennis players and enthusiasts.

```php
// required code
require_once("copernica_rest_api.php");

// make a new api object with your access token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // select interest condition
    'type' => 'Interest',

    // use matchmode
    'match-mode' => 'match_profiles_with_interest'
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
* [Field condition](rest-condition-type-field)
