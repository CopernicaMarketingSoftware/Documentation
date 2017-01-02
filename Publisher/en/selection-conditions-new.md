# Conditions for selections
As stated before, selections filter profiles in a database based on selection rules. A rule can consist of multiple conditions. Copernica uses AND-, OR- and OR NOT-conditions, where profiles respectively need to comply to all or some  of the conditions. You can set up multiple rules, which relate to eachother through OR- and OR NOT-relations. It's possible to set up your selection in such a way that profiles need to comply to either all AND-conditions of rule 1, or (not) to those of rules 2, and so forth. Below, we'll describe the different conditions and illustrate them with an example.

## AND-conditions
Say, you've got a database of companies. You want create a selection that holds all companies that operate in IT and that are located in Seattle. To do this, you create a selection with one rule, consisting of two conditions:

Rule 1:
* Condition 1 - add all profiles where the field 'City' contains 'Seattle'.
    AND
* Condition 2 - add all profiles where the field 'Branch' contains 'IT'.

## OR-conditions
OR-conditions are used for selections where profiles need to comply to one of multiple conditions. This means you put all conditions in separate rules, as it's not possible to put multiple OR-conditions within one rule.

We take the same database we had in the previous example, only this time we want to select companies located in either Seattle or New York.

Create two selection rules:
* Rule 1 - select all profiles where the field 'City' contains 'Seattle'

    OR

* Rule 2 - select all profiles where the field 'City' contains 'New York'

This selection will now contain companies from Seattle and New York.

## OR NOT-condition
An OR NOT-condiion is like an OR-condition, only instead of including the selected profiles in the selection, it excludes them. So instead of saying "I want these profiles in my selection", you're saying "I want all profiles in my selection EXCEPT those that comply to the rules."

In most cases, AND- and OR-conditions will suffice. There are some situations in which it is useful to use OR NOT-conditions, such as a selection of people who haven't responded to your survey yet. In that case, you could use an OR NOT-condition that selects profiles that did respond, so all selected profiles are excluded.


## Combining OR and AND
Taking the same database, we now want a selection of companies located in Seattle OR New York AND that operate in IT.

The selection rules will look like this:
Rule 1:
* Condition 1 - select profiles where the field 'City' contains 'Seattle'

AND

* Condition 2 - select profiles where the field 'Branch' contains 'IT'

OR

Rule 2:
* Condition 1 - select profiles where the field 'City' contains 'New York'

AND

* Condition 2 - select profiles where the field 'Branch' contains 'IT'

## Frequently used selections
The possibilities for creating selections are really only limited by your own imagination. You can set them up in any way that works for your database. To give you some inspiration, we've created some tutorials on frequently used selections:

* [Birthday selection]()
* [Newsletter selection]()
* [Automatically processing email bounces]()