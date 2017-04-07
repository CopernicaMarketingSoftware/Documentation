# REST API: Condition type change

Conditions have different types of properties. Some concern the timeframe in 
which something happened (date properties), others concern mailing information 
(mailing properties) and others concern just the specific type of condition 
(individual properties). All of these properties together combine to a condition 
for which all properties should be satisfied to satisfy the condition as a whole.
Only one condition needs to be satisfied to satisfy a rule.

This article is about the properties of the change condition.

## Date properties

The date properties can be used to limit the selection to a specified 
time period. All of the variables below are required to be YYYY-MM-DD HH:MM:SS 
format.

* **before-time**: The timestamp before which the change must have occured. 
* **after-time**: The timestamp after which the change must have occured. 
* **before-mutation**: The beforemutation (time difference) of the changecondition.
* **after-mutation**: The aftermutation (time difference) of the changecondition.

## Individual properties

* **change-type**: The changetype of the changecondition. See the change types table.
* **field**: Database field to be changed/not changed.
* **interest**: Database interest to be changed/not changed.

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
selection or miniselection. If a user has just created a profile they might 
need some help navigating. You can send them an email to help by creating a 
selection. This selection can be made with the change condition by setting 
**change-type** to "new".

## More information
* [Fetch rule conditions](rest-get-rule-conditions)
* [Post rule conditions](rest-post-rule-conditions)
