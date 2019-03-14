# REST conditions: Email

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv2/rest-api.md) of the REST API.

Conditions are smaller parts of rules. Only one condition has to be 
satisfied to satisfy a rule. Every condition has a few specific properties.

This article is about the **email** condition. If you're looking for 
any other condition you can find them in the **More information** section.

## Individual properties

The email condition has the following parameters:

* **required-result**: The certain result of an email. See the required result table.
* **clicked-url**: The url that must be clicked (only for **required-result** set to "clickonurl").
* **required-errors**: Error code to use with "error" for **required-result**. 
Possible values: Error code, "mailmessage", "unreachable", "nocontent", "nohost", 
"nodata", "privateiprange", "other", "temp" for a temporary error and "final" for 
an unresolvable error.

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

## Required results

The following table contains the possible values for the required result 
of an email and their descriptions.

| Required result | Description                                 |
|-----------------|---------------------------------------------|
| nocheck         | Only check if doc was sent.                 |
| view            | Pageview must be registered.                |
| viewnoclick     | Pageview must be registered, but not click. |
| anyclick        | Click on URL must be registered.            |
| clickonurl      | Click on specific URL must be registered.   |
| noclick         | No click must be registered.                |
| error           | Error message must be received.             |
| noerror         | No error message must be received.          |
| abuse           | Abuse must be registered.                   |
| noabuse         | No abuse must be registered.                |
| nothing         | No result is registered.                    |
| anything        | Any result is registered.                   |

## Date properties

The date properties can be used to limit the selection to a specified 
time period. All of the variables below are required to be YYYY-MM-DD HH:MM:SS 
format.

* **before-time**: Matches only profiles that received the document before this time
* **after-time**: Matches only profiles that received the document after this time
* **before-mutation**: The beforemutation (time difference) for mails sent too early.
* **after-mutation**: The aftermutation (time difference) for mails sent too late.

## Example

With the properties above you can make selections in very advanced manners. Let's 
say you want to make a separate selection for people who want to receive 
your emails. An email might or might not be delivered, which is something 
you want to keep track of. You can do this by using the required-result 
with the values "error" or "noerror".

You can also make selections for people who click a specific URL. If the 
URL links to a product it would be start to send more information about 
the product later to convince people to buy it. This increases your chances 
of your customers buying your projects. The following condition determines 
whether a specific link was clicked.

```php
// required code
require_once("copernica_rest_api.php");

// make a new api object with your access token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // select email condition
    'type' => 'Email',
    
    // select desired properties
    'required-result' => 'clickonurl',
    
    // select (in this case) the needed URL
    'required-url' => 'wwww.example.com',

    // use matchmode
    'match-mode' => 'match_profiles_that_received_something'
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
* [Condition type sms](rest-condition-type-sms)
* [Condition type fax](rest-condition-type-fax)
