# REST API: Condition type doublefield

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). All of these properties together combine to a condition 
for which all properties should be satisfied to satisfy the condition as a whole.
Only one condition needs to be satisfied to satisfy a rule.

This article is about the properties of the doublefield condition.

## Individual properties

* **match-mode**: Match mode of doublefield condition. See the [match mode table](./rest-condition-type-doublefield#match-modes)
* **fields**: The combination of fields that should be checked.

## Match Modes

The following table contains the possible values for the match mode and 
their descriptions.

| Match mode                   | Description                                         |
|------------------------------|-----------------------------------------------------|
| match_unique_profiles        | Match all profiles that are unique                  |
| match_non_unique_profiles    | Match all profiles that are not unique              |
| match_repeated_profiles      | Match all profiles that occurred earlier            |
| match_non_repeated_profiles  | Match all profiles that did not occur earlier       |
| match_last_profiles          | Match all profiles that do not occur later          |
| match_toberepeated_profiles  | Match all profiles that also occur with a higher ID |

## Example

Let's say we want to make a selection of only people with unique names. This 
includes both the first name and the last name. In this case we could describe this 
selection by comparing the first name and the last name fields with the correct 
match-mode. The following values describe this set of people:

* **match-mode**: match_unique profiles
* **fields**: \[first_name, last_name\]

## More information
* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
* [Condition type field](rest-condition-type-field)
