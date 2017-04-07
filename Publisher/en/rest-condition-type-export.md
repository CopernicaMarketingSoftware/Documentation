# REST API: Condition type export

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). All of these properties together combine to a condition 
for which all properties should be satisfied to satisfy the condition as a whole.
Only one condition needs to be satisfied to satisfy a rule.

This article is about the properties of the export condition.

## Date properties

The date properties can be used to limit the selection to a specified 
time period. All of the variables below are required to be YYYY-MM-DD HH:MM:SS 
format.

* **before-time**: The timestamp before which the export must have occurred.
* **after-time**: The timestamp after which the export must have occurred.
* **before-mutation**: The beforemutation (time difference) of the exportcondition.
* **after-mutation**: The aftermutation (time difference) of the exportcondition.

## Individual properties

* **include-never-exported-profiles**: Boolean value to indicate whether 
profiles not exported before should be included.

## Example

If you wanted to only export profiles you have exported before after a 
certain date, you could make that selection using this condition. The 
following values should be used:

* **after-time**: Timestamp you want the exports after
* **include-never-exported-profiles**: false

## More information

* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
