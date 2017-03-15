# Followups: data variable

The **data** variable can be used to store information for your data-scripts 
and is empty until used. It works similar to the fields parameters for a 
profile and can store strings and numbers, but no arrays or objects.

## Simple example

Let's say you have written an email to the user containing ten sale items 
and you want to keep track of which items they clicked. In the following example 
we'll show you a script (that you can put in the data-script environment) 
to store a click on a specific item.

    profile.data.clickedSaleItem1 = "yes"

By embedding this script in every link we can now see which items have been 
clicked. In our next data-script we can use this value to perform certain 
actions.

    if (profile.data.clickedSaleItem1 = "yes") {
        // Your action
    }

## More information

* [The data-script object](./followups-scripting)
* [Copernica/Account variable](./followups-scripting-copernica)
* [Database variable](./followups-scripting-database)
* [Collection variable](./followups-scripting-collection)
* [Profile variable](./followups-scripting-profile)
* [Subprofile variable](./followups-scripting-subprofile)
* [Destination variable](./followups-scripting-profile)
* [Mailing variable](./followups-scripting-mailing)
* [Template variable](./followups-scripting-template)
* [Message variable](./followups-scripting-message)
