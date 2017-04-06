# REST API: Condition type export

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). This article is about the properties of the 
export condition.

## Navigation
* [Date properties](rest-condition-type-export#date-properties)
* [Individual properties](rest-condition-type-export#individual-properties)
* [More information](rest-condition-type-export#more-information)

## Date properties
* **before-time**: Matches only profiles that received the document before this time
* **after-time**: Matches only profiles that received the document after this time
* **before-mutation**: Datemutation (time difference) for mails sent too early.
* **after-mutation**: Datemutation (time difference) for mails sent too late.

## Individual properties
* **include-never-exported-profiles**: Boolean value to indicate whether 
profiles not exported before should be included.

## More information
* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
