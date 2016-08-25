According to the law and netiquette, your subscribers **must** be able
to remove themselves from your list. This tutorial shows you how you can
automatically exclude those unsubscribes from your active mailing list. 

*For this tutorial you need a database. [Create a new database if you
don't have one
already](http://www.copernica.com/en/support/setting-up-your-database-and-import-your-contacts)*

A mailing list is created in two steps:

1.  Add a newsletter preference field to your database
2.  Create a mailinglist, to which you will later target your mass
    mailings

### Add the newsletter preference field to your database

If someone no longer wishes to receive your emails, he or she must be
able to unsubscribe . You can choose to remove unsubscribes completely
from your database. Most marketeers however prefer to keep the profile
data, and only remove unsubscribes from the active mailinglist. To
differentiate between profiles that like to receive emails from you, and
those who don't, you need to store their newsletter preferences in your
database, more precisely, in a field specially created for that.

To make such a field, go to *Database Management* \> *Edit database
fields* and choose **Add field**. \
![](Documentation/newsletter-preference-field.png "Documentation/newsletter-preference-field.png")

-   Select your database from the list, choose a name for the field
    (e.g., Mailinglist)
-   At type choose ‘*Multiple choice field*’ and enter the values
    '\<empty\>' ‘*Yes*’ and ‘*No*’ (see image above)
-   Check ‘*Show field on overview pages*’ (to show this field in the
    profile list) and ‘*The field is indexed*’ (to make the selection
    faster)
-   Hit the **store** button.

Your field is now created. Now lets add the proper value (YES) to your
newly imported subscribers.

-   Under profiles, go to *Current view*and choose ‘*Edit/Remove
    (sub)profiles*’
-   Select the multiple choice field holding the newsletter preference.
-   At ‘*Value*’ enter ‘*YES*’
-   Click **edit** to add the value ‘*YES*’ to all imported profiles.

![](Documentation/edit-multiple-profiles.png "Documentation/edit-multiple-profiles.png") \
You’re done. All profiles now have the value ‘Yes’ in the field
‘newsletter’ (it may take a few minutes for the application to update
your database)

### Create a selection to exclude unsubscribes from future mailings

Only subscribers should receive your newsletter. Unsubscribes should
not, and this is the way how to accomplish that:

You are going to create a selection (this is an active filter on the
information in your database) and send your future mailings to this
selection. All contacts that have unsubscribed, will automatically be
omitted from the selection.

-   Go to Database management \> *Edit selections*
-   Choose ‘*Create new selection*’
-   Choose a name for the selection (for example ‘Mailing list’)
-   Click «store»
-   Create the condition by clicking ‘*Add a new 'AND' condition to the
    current 'OR' rule*’\
    ![](Documentation/add-new-and-to-new-or.png "Documentation/add-new-and-to-new-or.png")
-   From the list choose type ‘*Check on field*’ and then ‘*Continue*’
-   Select the field holding the newsletter preference
-   Choose ‘*is equal to*’ –compare with value- ‘*YES*’
-   Click on **store**.

![](Documentation/newsletter-preference-selection-condition.png "Documentation/newsletter-preference-selection-condition.png") \
Your selection is now created. Only profiles with the value ‘*YES*’ in
the newsletter field will be included in the selection.

### View the profiles from the selection

You can find the selection as a child of the database in the overview.
Click on the selection to view the included profiles.

Great, you have now your created a database, filled it with your
subscribers, added a field to differentiate between subscribers and
unsubscribes, and based on this data you created a selection to filter
unsubscribes from your active mailinglist.

How about sending your first emailing, huh? Not so fast. We need a
document to send in the first place.

-   [Import the Copernica default
    template](http://www.copernica.com/en/support/using-the-copernica-default-template)

