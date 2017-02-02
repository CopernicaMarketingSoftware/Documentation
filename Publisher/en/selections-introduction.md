# Selections and miniselections
## What's a selection?
Apart from fields and collections, Copernica also has selections and miniselections. Selections are used to group parts of the profiles in your database, so you can use them as a destination for mailings or follow-up actions. These selections are made based on certain properties a profile has to have. Take for example a selection of everyone that has opted-in for your newsletter. You can set this selection as the destination of your newsletter, so you don't have to manually check who should receive it. 

Selections make it possible to create specific targets for mailings and give the user more insight in what's going on in their databases. The contents of selections are automatically updated as databases and selections are rebuilt multiple times a day.

## Miniselections
It's also possible to make selections within collections; we call them miniselections. A collection is a sub-database attached to a profile, such as all products someone has bought in your shop. In this example, you could create a miniselection that contains all orders of products of a certain brand. If you see that someone has bought multiple products of that brand (so if the miniselection contains multiple subprofiles), you could make that person a personal offer that has to do with the brand. That way you can make your mailings even more targeted and personal.

## Subselections
A subselection is a selection within a selection, for example, a selection of people under 30 in the selection of females. Profiles in a subselection need to comply to the rules of the subselection, as well as those of the parent selection. Not only does this help you maintain a clear overview of your database, it can also make it perform faster. If you create a subselection *people under 30* within the *females*-selection, Copernica only has to go through the females to search for people under 30. In the case of a *females under 30*-selection, the software would have to go through all profiles in the database twice: once to check for gender, and once to check for age.
Creating subselections is only possible on profile level; making "subminiselections" is not possible. 

## Creating selections, subselections and miniselections
Selections, subselections and miniselections can be added, deleted and managed under *Profiles* >*Database management* > *Manage selections* in Publisher. A subselection is created by clicking *Create selection* and then assigning it to exist under the selection you want it to. In MarketingSuite, you'll find the *Create a first selection* button on the left side of your database, if you haven't got any yet, and the *create (mini)selection* button on the top right if you do.

## Selection rules and conditions
As stated above, profiles in any kind of selection need to have certain properties in order to belong to a selection. These properties are set in Copernica using *selection rules* and *selection conditions*. There are many options for filtering, from a birthday to clicks in mailings during a certain period of time. It's quite a bit of information, so we've created a separate article explaining it all. You'll find it [here](selection-conditions-new).
