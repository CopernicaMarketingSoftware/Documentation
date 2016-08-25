In Copernica you can work with selections and miniselections. Selections
are used to filter profiles in databases. Miniselections are also
filters on data, but on subprofiles within a collection. This article
explains their differences

**Selections**are filters on profiles in a database

**Miniselections** are filters on subprofiles in a collection

![](Documentation/createselectionminiselection.png) \
*Both selections and miniselections are created from the Edit
selections dialog (Found under Database management menu)*

### Other differences

Actually there are no major differences between selections and
miniselections. They both work and function the same. They come with
more or less the same condition types, and they are created and managed
in the same way.

### Refer to miniselection from selection

It is possible to select profiles based on the result of a
miniselection.

Example, your customers are stored in profiles, and their purchased
products in a collection that you named *Products*. \
Say, you want to send a customer satisfaction survey to all customers
who purchased a product at your web store in the past two weeks. This is
accomplished by first making a miniselection (*HasProducts*) that
collects all products (subprofiles) bought in a specified period of
time. Then you can make a selection that refers to this miniselection.
In the selection create a new rule and choose condition type *Check on
miniselection content* and inicate that the profile must have at least 1
and max 999 suprofiles in the miniselection *HasProduct*.

You can now send a mail to the survey selection to ask your clients how
they experienced your web shop or to ask them to review the product on
your website.

![](Documentation/miniselection-referral.png)

The image below shows a database with both selections and a
miniselection

![](Documentation/selectionandminiselectionoverview.png)

### Show the subprofiles from a miniselection

Go to *Current view \> Show subprofiles \> Select the miniselection* or
a combination of selections and miniselection.