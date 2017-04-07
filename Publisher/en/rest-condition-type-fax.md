# REST API: Condition type fax

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). All of these properties together combine to a condition 
for which all properties should be satisfied to satisfy the condition as a whole.
Only one condition needs to be satisfied to satisfy a rule.

This article is about the properties of the fax condition.

## Date properties

The date properties can be used to limit the selection to a specified 
time period. All of the variables below are required to be YYYY-MM-DD HH:MM:SS 
format.

* **before-time**: Matches only profiles that received the document before this time
* **after-time**: Matches only profiles that received the document after this time
* **before-mutation**: The beforemutation (time difference) of the faxcondition.
* **after-mutation**: The aftermutation (time difference) of the faxcondition.

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

Using the fax condition we can make a selection of people who have received 
over 10 messages in the last two months, to prevent us from sending too 
many messages to the same user. We don't want them to unsubscribe, after all.
To do this we can use the following values:

* **after-time**: Current day - 2 months in YYYY-MM-DD HH:MM:SS format
* **number**: 10
* **operator**: >

## More information

* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
* [Condition type email](rest-condition-type-email)
* [Condition type sms](rest-condition-type-sms)
