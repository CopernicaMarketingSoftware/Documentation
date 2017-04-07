# REST API: Condition type date

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). All of these properties together combine to a condition 
for which all properties should be satisfied to satisfy the condition as a whole.
Only one condition needs to be satisfied to satisfy a rule.

This article is about the properties of the 
date condition.

## Date properties
* **before-time**: Matches only profiles that received the document before this time
* **after-time**: Matches only profiles that received the document after this time
* **before-mutation**: Datemutation (time difference) for mails sent too early.
* **after-mutation**: Datemutation (time difference) for mails sent too late.

## Individual properties
* **field**: The databasefield of the datecondition.
* **compare-mode**: Compare mode of the datecondition. Possible values: 
"full" when the full data must match, "ignoreyear" if the year may not match.

## More information
* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
* [Condition type change](rest-condition-type-change)
