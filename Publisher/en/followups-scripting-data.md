# Followups: data variable

The **data** variable is present on all [data-script objects](./followups-scripting) and can be used to store scalar information for your 
scripts, which is not used by us. Therefore, it works similar to the fields parameters for a 
profile and can store strings and numbers, but no arrays or objects. Every 
data-script variable has a data object that can be used in all instances of 
the same variable over multiple scripts.

## Simple example

Let's say you have written an email to the user containing ten sale items 
and you want to keep track of which items they clicked. In the following example 
we'll show you a script (that you can put in the data-script environment) 
to store a click on a specific item.

    profile.data.clickedSaleItem1 = "yes";

By embedding this script in every link we can now see which items have been 
clicked. In our next data-script we can use this value to perform certain 
actions.

    if (profile.data.clickedSaleItem1 = "yes") {
        // Your action
    } else {
        // Some other action
    }

You are free to store all strings and numbers you want. You could for example 
also use the object to count the amount of times people have profited from 
your sale by saving the amount of clicks per message.

    message.timesClicked += 1;
    
You can make your scripts as complex as you want. In this case, for example, 
you could add a check to prevent people from clicking multiple times.

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
