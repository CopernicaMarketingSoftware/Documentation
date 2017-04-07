# REST API: Condition type referview

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). All of these properties together combine to a condition 
for which all properties should be satisfied to satisfy the condition as a whole.
Only one condition needs to be satisfied to satisfy a rule.

This article is about the properties of the referview condition.

## Individual properties

* **refer-view**: View that the condition refers to.
* **check-type**: Boolean value to indicate whether a profile should be 
present in the other view. Possible values: "yes", "no".

## Example

If we want to have two views that are mutually inclusive we can use 
this condition to compare them. To prevent selection from a certain view 
we use the following values:

* **refer-view**: \<View we don't want to get profiles from>
* **check-type**: "no"

It's also possible to make an overarching view and include the profiles 
that do occur in the other view. This is possible by setting **check-type** 
to "yes" instead of "no". 

## More information

* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
* [Condition type miniview](rest-condition-type-miniview)
