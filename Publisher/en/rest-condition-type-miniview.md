# REST API: Condition type miniview

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). All of these properties together combine to a condition 
for which all properties should be satisfied to satisfy the condition as a whole.
Only one condition needs to be satisfied to satisfy a rule.

This article is about the properties of the miniview condition.

## Individual properties
* **mini-view**: Miniview associated with condition
* **min-subprofiles**: Minimum number of subprofiles in the miniview
* **max-subprofiles**: Maximum number of subprofiles in the miniview

## More information
* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
* [Condition type referview](rest-condition-type-referview)
