# REST API: Condition type date

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). All of these properties together combine to a condition 
for which all properties should be satisfied to satisfy the condition as a whole.
Only one condition needs to be satisfied to satisfy a rule.

This article is about the properties of the date condition.

## Date properties

The date properties can be used to limit the selection to a specified 
time period. All of the variables below are required to be YYYY-MM-DD HH:MM:SS 
format.

* **before-time**: Matches only if the value was in the field before given time
* **after-time**: Matches only if the value was in the field after given time
* **before-mutation**: The variable time after which the chosen field must be.
* **after-mutation**: The variable time before which the chosen field must be.

## Individual properties
* **field**: The databasefield of the datecondition.
* **compare-mode**: Compare mode of the datecondition. Possible values: 
"full" when the full data must match, "ignoreyear" if the year may not match.

## More information
* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
* [Condition type change](rest-condition-type-change)
