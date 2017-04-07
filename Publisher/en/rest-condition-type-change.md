# REST API: Condition type change

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). This article is about the properties of the 
change condition.

## Date properties
* **before-time**: Matches only profiles that received the document before this time
* **after-time**: Matches only profiles that received the document after this time
* **before-mutation**: Datemutation (time difference) for mails sent too early.
* **after-mutation**: Datemutation (time difference) for mails sent too late.

## Individual properties
* **change-type**: The changetype of the changecondition. See the [change types table](./rest-condition-type-change#change-types)
* **field**: Database field to be changed/not changed
* **interest**: Database interest to be changed/not changed

## Change types

The following table contains the possible values for the change type and 
their descriptions.

| Change type          | Description                               |
|----------------------|-------------------------------------------|
| any                  | Any change                                |
| none                 | No change                                 |
| field                | Field value changed                       |
| nofield              | Field value not changed                   |
| new                  | Profile was created                       |
| notnew               | Profile was not created                   |
| edit                 | Profile was edited                        |
| noedit               | Profile was not edited                    |
| newsubprofile        | New subprofile added                      |
| nonewsubprofile      | No new subprofile added                   |
| editsubprofile       | Subprofile was edited                     |
| noeditsubprofile     | Subprofile was not edited                 |
| removesubprofile     | Subprofile was removed                    |
| noremovesubprofile   | Subprofile was not removed                |
| interest             | Interest setting changed                  |
| gotinterest          | Interest added that was not there before  |
| lostinterest         | Interest lost that was there before       |

## Example

Emails can be personalized in many ways. Therefore it is important to keep 
track of the information about the user and use it in a smart way.
With the change condition we can use changes in the database to change a 
selection or miniselection. If we know that a user likes "football" for 
example, we can show them "football" related items to buy. However, if a 
user loses this interest the items that were previously useful are not anymore.
To remove the user from the selection that contains football fanatics and 
place them into the non-football fans we would use the following condition:

* **change-type**: lostinterest
* **interest**: "football"

## More information
* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
