# REST API: Condition type sms

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). All of these properties together combine to a condition 
for which all properties should be satisfied to satisfy the condition as a whole.
Only one condition needs to be satisfied to satisfy a rule.

This article is about the properties of the sms condition.

## Date properties

The date properties can be used to limit the selection to a specified 
time period. All of the variables below are required to be YYYY-MM-DD HH:MM:SS 
format.

* **before-time**: Matches only profiles that received the document before this time
* **after-time**: Matches only profiles that received the document after this time
* **before-mutation**: The beforemutation (time difference) for the smscondition.
* **after-mutation**: The aftermutation (time difference) for the smscondition.

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

## Example

Let's say we have accidentally send a wrong document to several of our 
customers and we want to send another mail to apologize (and we don't 
have the original selection anymore, you could use that as well). We 
could then select using the sms condition with the following values:

* **document**: Name of wrong document
* **match-mode**: "match_profiles_that_received_document"

## More information

* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
* [Condition type email](rest-condition-type-email)
* [Condition type fax](rest-condition-type-fax)
