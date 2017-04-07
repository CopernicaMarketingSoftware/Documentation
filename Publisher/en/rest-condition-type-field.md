# REST API: Condition type field

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). All of these properties together combine to a condition 
for which all properties should be satisfied to satisfy the condition as a whole.
Only one condition needs to be satisfied to satisfy a rule.

This article is about the properties of the field condition.

## Individual properties

* **comparison**: Comparison type for fieldcondition. Possible values: 
"equals", "not equals", "contains", "not contains", "less", "more", "is_email", 
"regexp" and "is-numeric".
* **field**: Field to compare with value
* **value**: Value to compare with field (setting this resets **other-field**)
* **other-field**: Other field to compare **field** with. If this variable is set 
"value" will not be used.
* **numeric-comparison**: Boolean value to indicate whether value comparison is done numerically or not.

## Example

Let's assume, for the purposes of the example, that we have a product only 
children like and that we know which of our customers have children. This is 
indicated in the field "has_children" in the fields of the database profiles. 
Now we can pick a specific target for marketing, namely parents, using the field 
condition. We use the following values:

* **field**: "has_children"
* **value**: "yes"

## More information

* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
* [Condition type interest](rest-condition-type-interest)
