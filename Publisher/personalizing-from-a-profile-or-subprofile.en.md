Personalization added to publications have to be focused on the group
it’ll be sent to. Simply put: you can only use data from the database
and/or collection you’re sending the mailing to. If you want to use data
from another database and/or collection, you can use [Loadprofile and/or
subprofile](http://www.copernica.com/en/support/loadprofile-and-loadsubprofile).

When personalizing from a collection, the [test
destination](http://www.copernica.com/en/support/what-is-the-test-destination)
should be a subprofile in this collection as well to be able to test the
personalization in the application.

### Using profile information to personalize from the profile

You have the option to extract data from the profile, by using Smarty
code to refer to the corresponding field.

If you have a database field *firstname*.

*Hello {\$firstname},*

### Personalizing from the subprofile using the subprofile data

Just like when using profiles, you are able to extract data from the
subprofile by referring to the corresponding code with Smarty code.

*Hello {\$firstname},*

### Get data from the profile, when targeting the subprofile

When sending a mailing to subprofiles, you also have access to data from
the profile. If you want to send an email to contacts (collection) of a
company, you have the option to include company name (profile).

If you want to include information from both the profile and the sub
profile, you have to specify the destination in the personalization.

-   **Data from the subprofile:**{\$subprofile.fieldname}
-   **Data from the profile:**{\$profile.fieldname}

### The document is sent to profiles and subprofiles

If the destination of the document varies, and you want the application
to decide where the data should be loaded from, use another
prefix:*destination*

Load data from the profile or from the subprofile:
**{\$destination.fieldname}**

When the email is being sent to profiles, the system will first check
the profile for the data. If the mailing is sent to a collection, the
system will check the subprofiles first.

### Personalizing with subprofile data, destination is profile

If the destination of a document is a profile, and you want to load the
data from the subprofiles belonging to this profile (purchased items
from a customer, for example), use the Smarty *foreach*function.
Possibly in combination with the
[loadsubprofile](http://www.copernica.com/en/support/loadprofile-and-loadsubprofile)
function.

You can loop through subprofiles using the smarty foreach function:

`{foreach $Contacts as $contact}        {$contact.id},  {/foreach}`

With the code above, you loop through the collection *Contacts* and
assign this to the variable *contact*.

The variable {\$contact.id} will then return all IDs of the subprofiles.

**Note:** the foreach example mentioned above can only be used in
templates that are rendered with smarty 3. Older smarty versions have a
different syntax, but we advise to use [smarty
3](http://www.copernica.com/en/support/smarty-2-vs-smarty-3) anyway.

**Note 2:** If you want to print somekind of hyperlink from the
(sub)profiles within the foreach-loop, it is necessary to use
\<code\>-tags around the print statement. E.g.:
\<code\>{\$contact.hyperlink}\</code\>

Read more about the foreach function here:
[http://www.smarty.net/docs/en/language.function.foreach.tpl](http://www.smarty.net/docs/en/language.function.foreach.tpl)

### Retreive data from another database

If the destination is in database A, you are also able to retrieve
information from Database B. To get access to this data, you use the
function **loadprofile**.

-   [Read more about the load(sub)profile
    function](http://www.copernica.com/en/support/loadprofile-and-loadsubprofile)

### Retrieve data from any data collection in your account

If the destination from your publication is Database A, it’s possible to
load information from a collection in the same database A and any other
collection. To achieve this, use the function **loadsubprofile**.

-   [Read more about the loadsubprofile
    function](http://www.copernica.com/en/support/loadprofile-and-loadsubprofile)

