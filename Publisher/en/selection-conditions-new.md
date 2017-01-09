## Selection rules
As you may know, Copernica determines which profiles are added to a selection based on certain properties. All profile data you store in Copernica can be used for selection rules. There are many different filter options:

* **Field value**. Example: make a selection to check whether the field 'city' matches 'Amsterdam'. If it does, the profile will apear in the selection.
* **Interest**. Example: make a selection and check whether the profile has the interest 'Apple'. Everyone who likes Apple products will appear in the selection.
* **Date**. Example: Make a selection of all profiles whose warranty is expiring by setting the date to x months from the purchase date.
* **Campaign results**. There are multiple options to filter on campaign results: e-mail, sms, fax and survey results. Example: make a selection of all profiles that clicked a hyperlink in your last mailing.
* **Contact history**. Example: filter profiles based on whether or not you've had contact with them in the past x amount of time. 
* **Contents of a different (mini)selection**. Example: make a selection of people you haven't had contact with in the past six months and set as a second condition that they exist in the collection of Apple-interested profiles. That way, you have a selection to send a special mailing offering them a discount on Apple products to win them back.
* **Profile changes**. There are many different options for profile changes. Example: Checking if the field 'city' changed in the past month gives you a selection of people who recently moved.
* **Previous exports**. Use this to select profiles that have been exported between two points in time.

It's also possible to use selections to alphanumerically sort a given amount of profiles. Read [here](sorting-and-selecting-profiles-in-a-database-or-collection) how to to this.
More on conditions and rules can be found [here](selection-conditions-new).

# Rules and conditions
Filtering profiles is done using selection rules and selection conditions. These are used to specify what properties the profile needs to have to be part of the selection. It's important to note that in this case, a rule and a condition are two different things. A condition is part of a rule; multiple conditions can make up a rule. A rule could be: a profile bust be female AND under 30. Females over 30 or men under 30 cannot be in this selection.

You can also choose to create an OR-relation. A rule can only consist of AND-conditions, so in order to achieve this, you'll need to create multiple rules. A profile then only needs to comply to one of the rules. So, if you want a selection of all females and all people under 30, you can say you want someone to be female OR under 30.

The last type of rule is OR NOT. This one does almost the same as OR, only it **excludes** the profiles that apply from the selection instead of including them.

You'll see that for every rule, even if you only have one, you'll need to specify whether it's an OR or an OR NOT-rule. This may seem confusing: why would you need an OR when there's only one part? The idea behind this is that an OR-rule **includes** the profiles that apply, where an OR NOT **excludes** them.

To summarize:
* If you want all profiles in a selection to comply to one or multiple conditions, use an OR-rule with AND-condition(s)
* If you don't want any of the profiles to comply to one or multiple conditions, use an OR NOT-rule with AND-condition(s)
* When using multiple rules, the ones that profiles to need to meet are OR-rules and the ones they don't need to meet are OR NOT-rules.

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

* [Birthday selection](how-to-create-a-birthday-selection)
* [Newsletter selection](create-a-mailing-list)
* [Automatically processing email bounces](automatically-process-bounces)
