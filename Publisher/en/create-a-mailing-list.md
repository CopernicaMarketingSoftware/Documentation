# Selections Tutorial: Newsletter Selection

According to the law and netiquette, your subscribers **must** be able
to remove themselves from your list. This tutorial shows you how you can
automatically exclude those unsubscribes from your active mailing list.

*For this tutorial you need a database. Create a [new database](./quick-database-guide) 
if you don't have one already*

A mailing list is created in three steps:

1.  Add a newsletter preference field to your database
2.  Set your [unsubscribe behaviour](./database-unsubscribe-behavior) and add unsubscribe links.
3.  Create a mailinglist, to which you will later target your mass
    mailings

## Add the newsletter preference field to your database

If someone no longer wishes to receive your emails, he or she must be
able to unsubscribe . You can choose to remove unsubscribes completely
from your database. Most marketeers however prefer to keep the profile
data, and only remove unsubscribes from the active mailinglist. 

To differentiate between profiles that like to receive emails from you 
we will add a field to your database to distinguish between them. Select 
your database and create a new field. 

* Give your field a nice descriptive name such as *newsletter*
* Make it a multiple choice field with values <empty\>, "Yes" and "No".
* Check '*Show field on overview pages*' (to show this field in the 
profile list) and ‘*The field is indexed*’ (to make the selection faster)
* Store the field

Your field is now created. Now you need to set all users in your database 
to yes. We recommend doing this in Publisher, where you can edit multiple 
profiles at once under **Current view** if you have your database selected. 
You can also [edit multiple profiles](./rest-put-database-profiles) with 
the REST API.

### Unsubscribing

If a user wants to unsubscribe they can do so by clicking an unsubscribe 
link, which you can add to your mail with the [unsubscribe function](./personalization-functions-unsubscribe) 
in the template editor. Please note that this only works if you have 
entered [unsubscribe settings](./database-unsubscribe-behavior)

### Excluding unsubscribes from future mailings

Only subscribers should receive your newsletter. Unsubscribes should
not, and this is the way how to accomplish that:

You are going to create a selection (this is an active filter on the
information in your database) and send your future mailings to this
selection. All contacts that have unsubscribed, will automatically be
omitted from the selection.

-   Create a new selection
-   Name it something (preferably descriptive)
-   Store it
-   Create a new condition with "Check on field"
-   Select the field holding the newsletter preference
-   Choose ‘*is equal to*’ –compare with value- ‘*Yes*’
-   Store the condition.

You can now use this selection to send email to only those who want 
to receive it.

## More information

* [Selections](./selections-introduction)
* [Unsubscribe function](./personalization-functions-unsubscribe)
* [Unsubscribe settings](./database-unsubscribe-behavior)
* [Tutorial: Create a double opt-in for new subscribers](./create-a-double-optin-for-new-subscribers)
* [Tutorial: Make a birthday selection](./how-to-create-a-birthday-selection)
* [Tutorial: Automatically process email bounces](./automatically-process-bounces)
