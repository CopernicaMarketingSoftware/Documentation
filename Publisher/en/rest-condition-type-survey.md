# REST API: Condition type survey

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). All of these properties together combine to a condition 
for which all properties should be satisfied to satisfy the condition as a whole.
Only one condition needs to be satisfied to satisfy a rule.

This article is about the properties of the survey condition.

## Date properties

The date properties can be used to limit the selection to a specified 
time period. All of the variables below are required to be YYYY-MM-DD HH:MM:SS 
format.

* **before-time**: Matches only profiles that received the document before this time
* **after-time**: Matches only profiles that received the document after this time
* **before-mutation**: The beforemutation (time difference) for the surveycondition.
* **after-mutation**: The aftermutation (time difference) for the surveycondition.

## Individual properties

* **submitter**: Required submitter of the survey. See the required submitters table.
* **survey-name**: Name of survey to check submission for.

## Required submitters

The following table contains the possible values for required submitters 
and their description.

| Required submitter | Description                                  |
|--------------------|----------------------------------------------|
| profile            | Survey must be submitted by the profile.     |
| subprofile         | Survey must be submitted by the subprofile.  |
| anything           | Survey can be submitted by any profile.      |
| none               | Survey was not submitted.                    |
| noprofile          | Survey was not submitted by profile.         |
| nosubprofile       | Survey was not submitted by subprofile.      |

## Example

Let's say you have sent an important survey for the profiles in your database 
to fill out, but some of them have not sent a reaction yet. Using the survey 
condition you can select everyone that did not submit your survey yet, by 
using the following values:

* **survey-name**: <Survey you want to send a reminder for>
* **submitter**: "none"

## More information

* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
