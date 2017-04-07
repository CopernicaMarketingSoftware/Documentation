# REST API: Condition type email

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). All of these properties together combine to a condition 
for which all properties should be satisfied to satisfy the condition as a whole.
Only one condition needs to be satisfied to satisfy a rule.

This article is about the properties of the email condition.

## Date properties
* **before-time**: Matches only profiles that received the document before this time
* **after-time**: Matches only profiles that received the document after this time
* **before-mutation**: Datemutation (time difference) for mails sent too early.
* **after-mutation**: Datemutation (time difference) for mails sent too late.

## Mailing properties
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

## Individual properties
* **required-result**: The certain result of an email. See the [required result table](./rest-condition-type-email#required-results)
* **clicked-url**: The url that must be clicked (only for **required-result** set to "clickonurl").
* **required-errors**: Error code to use with "error" for **required-result**. 
Possible values: Error code, "mailmessage", "unreachable", "nocontent", "nohost", 
"nodata", "privateiprange", "other", "temp" for a temporary error and "final" for 
an unresolvable error.

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

## Example

If we don't want to send emails to people who have errors before we could 
set "noerror" as a **required-result** setting. This would result in a 
condition that only destinations that do not cause error satisfy.

Another example would be to make another selection using a condition for 
people who clicked on a specific URL. If they have seen an item then it might 
be a good idea to send them another mail about it! To do this **required-results** 
would have to be set to "clickonurl" and the **clicked-url** should be set to 
the item link.

## More information
* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
* [Condition type sms](rest-condition-type-sms)
* [Condition type fax](rest-condition-type-fax)
