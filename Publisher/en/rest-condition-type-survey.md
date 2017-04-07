# REST API: Condition type survey

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). All of these properties together combine to a condition 
for which all properties should be satisfied to satisfy the condition as a whole.
Only one condition needs to be satisfied to satisfy a rule.

This article is about the properties of the survey condition.

## Date properties
* **before-time**: Matches only profiles that received the document before this time
* **after-time**: Matches only profiles that received the document after this time
* **before-mutation**: Datemutation (time difference) for mails sent too early.
* **after-mutation**: Datemutation (time difference) for mails sent too late.

## Individual properties
* **submitter**: Required submitter of the survey. See the [required submitters table](rest-condition-type-survey#required-submitters)
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

## More information
* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
