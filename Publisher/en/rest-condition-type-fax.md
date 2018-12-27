# REST conditions: Fax

Conditions are smaller parts of rules. Only one condition has to be 
satisfied to satisfy a rule. Every condition has a few specific properties.

This article is about the **fax** condition. If you're looking for 
any other condition you can find them in the **More information** section.

## Mailing properties

The mailing properties are properties related to a mass mailing sent by 
mail, SMS or fax. The following properties can be used for this condition:

* **match-mode**: Matchmode of the mailing condition. Possible values: 
"match_profiles_that_received_something", "match_profiles_that_received_document", 
"match_profiles_that_received_nothing", "match_profiles_that_received_not_document"
* **required-destination**: The destination of the mailing. Possible values: 
"profile", "subprofile", anything"
* **document**: Name of the document used for matchmode (only if set to 
"match_profiles_that_received_document", "match_profiles_that_received_not_document")
* **template**: The name of the template of the condition.
* **number**: The required number of messages that are received by the recipient.
* **operator**: The operator to compare the number of messages with the number 
of received messages by the profile/subprofile. Possible values: 
= (equal), \!= (not equal), <\> (between), < (less than), \> (greater than).

## Date properties

The date properties can be used to limit the selection to a specified 
time period. All of the variables below are required to be YYYY-MM-DD HH:MM:SS 
format.

* **before-time**: Matches only profiles that received the document before this time
* **after-time**: Matches only profiles that received the document after this time
* **before-mutation**: The beforemutation (time difference) of the faxcondition.
* **after-mutation**: The aftermutation (time difference) of the faxcondition.

## Example

With the fax condition you can make a selection of people who have received 
more than 10 messages in the last two months, so they don't get too many 
emails from you. This way you prevent your receivers from marking your 
email as spam. The following condition is validated if this is the case.

```php
// required code
require_once("copernica_rest_api.php");

// make a new api object with your access token
$api = new CopernicaRestAPI("your-access-token", 2);

$data = array(
    // select fax condition
    'type' => 'Fax',

    // use time interval
    'after-time' => '2017-01-01 00:00:00',

    // set number
    'number' => '10',

    // set operator
    'operator' => '>'

    // use matchmode
    'match-mode' => 'match_profiles_that_received_nothing',
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
* [Condition type email](rest-condition-type-email)
* [Condition type sms](rest-condition-type-sms)
