# REST API: Condition type doublefield

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). This article is about the properties of the 
doublefield condition.

## Navigation
* [Individual properties](rest-condition-type-doublefield#individual-properties)
* [Match modes](rest-condition-type-doublefield#match-modes)
* [Example](rest-condition-type-doublefield#example)
* [More information](rest-condition-type-doublefield#more-information)

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

Let's say we want to select only people with a different first name. Then 
we could set **match-mode** to "match_unique_profiles" to only get unique profiles 
and **fields** to "first_name", to only match on first names. It is also possible to 
check a combination of fields by entering an array for fields.

## More information
* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
* [Condition type field](rest-condition-type-field)
