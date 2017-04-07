# REST API: Condition type todo

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). All of these properties together combine to a condition 
for which all properties should be satisfied to satisfy the condition as a whole.
Only one condition needs to be satisfied to satisfy a rule.

This article is about the properties of the todo condition.

## Date properties

The date properties can be used to limit the selection to a specified 
time period. All of the variables below are required to be YYYY-MM-DD HH:MM:SS 
format.

* **before-time**: Matches only profiles that received the document before this time
* **after-time**: Matches only profiles that received the document after this time
* **before-mutation**: The beforemutation (time difference) for the todocondition.
* **after-mutation**: The beforemutation (time difference) for the todocondition.

## Individual properties

* **match-type**: Match type of last contact. Possible values: 
"match_intelligent", "match_exact"
* **match-mode**: Matchmode of todocondition. Possible values: 
"match_contacted_profiles", "match_not_contacted_profiles".
* **contact-type**: Type of contact that should be open for matching profile. 
This can be any PxPomContactType or "false" if it does not matter.
* **min-closed**: Minimum number of items on the todo list.
* **max-closed**: Maximum number of items on the todo list.
* **user**: User of this condition (PxPomUser), or "false" when no selection 
is required.
* **priority**: Get priority of todo's.
* **contains**: Search string the todo should contain.

## Example

Let's say there is an update to your software you want to inform the users 
about. You put this in the todo's some time ago, but the document is only 
finished now. You want to use the todo's you made previously to select the 
customers you needed to email. You can do this with the todo condition with 
the following values:

* **match_type**: "match_intelligent"
* **contains**: < Name of document >

By using "match_intelligent" you ensure that typos or spread out words don't 
cause you to miss any of the todo's.

## More information

* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
* [Condition type lastcontact](rest-condition-lastcontact)
