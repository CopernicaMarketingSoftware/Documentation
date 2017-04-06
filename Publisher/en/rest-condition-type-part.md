# REST API: Condition type part

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). This article is about the properties of the 
part condition.

## Navigation
* [Individual properties](rest-condition-type-part#individual-properties)
* [More information](rest-condition-type-part#more-information)

## Individual properties
* **begin**: The first selected profile as a number or percentage. By 
using a negative value the begin count begins at the end.
* **length**: Set number of selected profiles as a number or percentage. 
* **fields**: All fields used in the condition.

## More information
* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
