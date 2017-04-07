# REST API: Condition type interest

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). All of these properties together combine to a condition 
for which all properties should be satisfied to satisfy the condition as a whole.
Only one condition needs to be satisfied to satisfy a rule.

This article is about the properties of the interest condition.

## Individual properties

* **match-mode**: Matchmode of interest condition. Possible values: 
"match_profiles_with_interest", "match_profiles_without_interest", 
"match_profiles_with_interest_group", "match_profiles_without_interestgroup".
* **interest**: Interest of the condition. This only returns a valid value 
if the matchmode is "match_profiles_with_interest" or "match_profiles_without_interest".
* **interest-group**: Interestgroup of the condition. This only returns a valid value 
if the matchmode is "match_profiles_with_interestgroup" or "match_profiles_without_interestgroup".

## Example

Let's assume, for the purpose of this example, that we have a sports store 
and we would like to send an email with our new range of tennis clothes to 
avid tennisplayers. Let's also assume that we have interests in our database 
profiles that contain "tennis" for people who like tennis. We can now market 
effectively by making a selection of tennisplayers by using the interestcondition. 
We use the following values:

* **interest**: "tennis"
* **match-mode**: "match_profiles_with_interest"

## More information

* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
* [Condition type field](rest-condition-type-field)
