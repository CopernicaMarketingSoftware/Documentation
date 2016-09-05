[Smarty](http://www.copernica.com/en/about-us/news/smarty-2-to-smarty-3-copernica-whiteboard)
is a template engine for PHP. It is a special code used for the
personalization of your marketing campaigns. Emailings, websites, text
messages and PDF documents can be personalized using Smarty tags.

Using Smarty
------------

Personalization within Copernica Marketing Software works with the help
of Smarty. Using this code you can include every database or collection
field within your campaigns. The Smarty tags will be replaced by the
correct contact data of the addressee or recipient. Smarty tags are
characterized by the use of braces, **{** and **}**, and the dollar sign
**\$**. Next to filling in contact data, Smarty tags can also be used to
include dynamic content in your marketing campaigns.

Using these Smarty tags within Copernica allows you to:

-   Include the recipient's data in emailings
-   Automatically include the webversion of an emailing
-   Set conditional content blocks (dynamic content)

Include contactdata in emailings
--------------------------------

When personalizing an emailing, you use Smarty tags. The correct data
will be retrieved from your existing contact database. All data within
the database (from profiles and subprofiles) can be used for
personalizing emailings. You only have to fill in the names of the
specific fields and the software will replace these with the correct
data when sending an emailing.

+--------------------------------------+--------------------------------------+
| ### For example:                     | ### Will be converted to:            |
+======================================+======================================+
| Dear                                 | Dear Mr. John Doe,\                  |
| {\$Salutation}{\$Name}{\$Surname},\  |  Thank you for registering.\         |
|  Thank you for registering.\         |  Kind regards,\                      |
|  Kind regards,\                      |  Pete Kramer\                        |
|  {\$Accountmanager}\                 | \                                    |
| \                                    |                                      |
+--------------------------------------+--------------------------------------+

Automatically including a webversion
------------------------------------

By including the variable {webversion} in the template of your emailing,
a webversion of your email is sent along automatically when sending an
emailing. Don't forget to add this variable to the text version of the
email document as well.

Next to the {webversion}, Copernica also allows you to add an
{unsubscribe} variable to the emailing. We strongly recommend you add
this variable to each emailing as this helps increase your email
reputation. For example, by adding a list-unsubscribe header or by
adding the unsubscribe-link to your template or email document.

These Smarty tags do not contain a \$-sign because these are system
variables (variables that are not filled in with data from your
database).

Set conditional content blocks
------------------------------

Thanks to the use of Smarty tags you can also use contact data as
conditions when displaying certain content. This can be done with the
help of the 'if-then'-statements: {if} and {else}. You always use { }
and \$, completed with some extra code.

*For example:*\
 {if \$fieldname==”thisvalue”}show this text{else}if not, show this
text{/if}\
 This states: IF field X contains the value Y, THEN, show this text,
ELSE, show this text, END of the command.

To use dynamic content, you can also use the variable {in\_selection
selection=x}. By using this code, your content will only be shown to
relations from a specific (mini)selection. You can select the specific
selection by:

-   Describing the entire path to the selection: \
    {in\_selection selection=Database:mySelection:mySubSelection}
-   Formulating the ID of the selection: {in\_selection selection=20}

