# REST API: Condition type lastcontact

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). This article is about the properties of the 
lastcontact condition.

## Navigation
* [Date properties](rest-condition-type-lastcontact#date-properties)
* [Individual properties](rest-condition-type-lastcontact#individual-properties)
* [More information](rest-condition-type-lastcontact#more-information)

## Date properties
* **before-time**: Matches only profiles that received the document before this time
* **after-time**: Matches only profiles that received the document after this time
* **before-mutation**: Datemutation (time difference) for mails sent too early.
* **after-mutation**: Datemutation (time difference) for mails sent too late.

## Individual properties
* **match-type**: Match type of last contact. Possible values: 
"match_intelligent", "match_exact"
* **match-mode**: Matchmode of lastcontactcondition. Possible values: 
"match_contacted_profiles", "match_not_contacted_profiles".
* **contact-type**: Type of contact had or no contact. Possible values are 
a PxPomContactType or the value "false".
* **min-closed**: Minimum number of items that should be on the contact list.
* **max-closed**: Maximum number of items that should be on the contact list.
* **user**: User of this condition (PxPomUser), or "false" when no selection 
is required.
* **priority**: Get priority of selected contacts.
* **contains**: Search string for searching contact report contents.

## More information
* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
* [Condition type todo](rest-condition-type-todo)
