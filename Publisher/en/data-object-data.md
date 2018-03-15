# Data object: data variable

The **data** variable is present on all [data-script objects](./data-object) and can be used to store scalar information for your 
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

* [The data-script object](./data-object)
* [Copernica/Account variable](./data-object-copernica)
* [Database variable](./data-object-database)
* [Collection variable](./data-object-collection)
* [Profile variable](./data-object-profile)
* [Subprofile variable](./data-object-subprofile)
* [Destination variable](./data-object-profile)
* [Mailing variable](./data-object-mailing)
* [Template variable](./data-object-template)
* [Message variable](./data-object-message)
