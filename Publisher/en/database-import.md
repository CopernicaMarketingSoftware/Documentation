# Import profiles
There are a couple of ways to get your profile data into a Copernica database.
You can manually enter the profiles one at a time or you can use
our API to synchronize profiles automatically. It is also possible to import
profiles from a CSV or tab separated file (the type of files that you can
edit with spreadsheet software).

Imports from CSV files are very flexible and can even be used for layered
databases that contain collections and subprofiles. It also is possible to
schedule automatically repeating imports that download a file from your
server. The import module can be found in the Marketing Suite within
the *database & profiles* section.

## The import file
Your import file has to be formatted in a specific manner to be suitable
for an import. It must be a tab or comma delimited file and the first line
should hold the names of the database fields into which you are going to import.
The file must be UTF-8 encoded and we recommend all users to put quotes around
their field values. It should look similar to this:

    Firstname, Lastname, City, Phone
    'John', 'Doe', 'Denver', '555-343-32'
    'Peter', 'Smith', 'Nashville', '555-341-66'

Almost all spreadsheet software will have the functionality to generate these
files.

## Linking columns
After you've uploaded a field you must link the columns in the file to fields
in the database. This is normally a very straightforward job: the column
"firstname" gets linked to the field "firstname" in the database. If the database
does not (yet) have a "firstname" field, you can link the column to a different
field or you can directly use the import module to add a new field to the database.

When you're linking the columns you can also assign the *key* fields. These
keys fields will allow you to use imports to update profiles. For each line in
the import file, Copernica searches for matching profiles based on the
selected keys and updates these matching profiles. You can also configure
what should be done when no matching profile is found:
you can ignore these lines or create new profiles.

## Importing subprofiles
To import a layered database with profiles and subprofiles you need a
special notation for the field names in the import header. For each of the
fields in the collection you use the "collectionname.fieldname" notation. If
you're running a pet shop and you have a customer database with for each
customer a collection of its pets you can import the following file:

    'Firstname', Lastname, City, Pets. Name, Pets. Type
    'John', 'Doe', 'Denver', 'Blacky', 'Dog'
    'John', 'Doe', 'Denver', 'Princess', 'Cat'

Notice that "John Doe" is mentioned twice. This is the same customer "John Doe"
that happens to have two pets: Blacky the dog and Princess the cat. Because each
subprofile (the pets) has to be entered on a separate line, the profile data
("John Doe") is repeated. Do make sure that you have assigned the right
key fields (for example the combination Firstname, Lastname and City) to allow
Copernica to recognize that the two "John Doe" lines refer to one profile, instead
of handling the lines as two separate profiles: one with a dog and one with a cat.

When using an import to update profiles, you will always need to assign a key
field to match the profile with.

## Periodic imports
Instead of uploading a file, you can also enter the URL to an import file that
is hosted somewhere on the internet. By assigning a URL you can schedule repeating
imports. Copernica downloads the file and can repeat this at regular intervals.
The import can be performed over FTP, but also the secure protocols sFTP and
FTPS are supported.

All the settings for periodic imports are the same as for uploaded imports. For
periodic imports you also have to link columns to fields and you also can assign
the key columns. The only difference is that the import dialog has an extra tab
that you can use to set the import interval.

## Date notation
Dates in Copernica normally use the YYYY-MM-DD hh:mm:ss notation. This is a
useful notation because such dates can easily be sorted. However, in some
languages dates are displayed in a different order (like DD-MM-YYYY) which
could confuse the import algorithm. It is therefore best to include only
dates in the recommended YYYY-MM-DD format in input files.

But if you do use a different format, you can use the option to automatically
convert these wrong dates. Dates in other formats are automatically recognized
and converted to our notation. However, this is not a 100% safe conversion. The
date 03-09-1980 can be read as 3 September or as 9 March. So it is better not
to rely on this conversion and always upload files that use the Copernica format.

Invalid dates are ignored and are converted into 0000-00-00 dates.

## Rollback incorrect imports
If you make a mistake with your import, you may overwrite your entire database
with wrong data. This makes it very important to stay concentrated! There are
some tricks to rollback some of the effects of a wrong import, but prevention
is always better than a cure.

If your wrong import created profiles that you now want to remove, you can
create a selection with just these new profiles. For this you can make a selection
with a single "check for changes" condition based on the "profile was created"
event. After you've created this selection use the "edit/remove multiple profiles"
dialog window to remove all profiles from this selection.

Did the import modify profiles that you want to bring back to their
original state? Individual profiles have a rollback feature, but this feature
can only be used one profile at a time. You can also ask Copernica to install
a backup of your database, however we charge an extra fee for rolling back a
database.

## Creating an import in the Publisher
Importing data is performed under the **Profiles** section. The menu
**Current view** provides you the option **Import/export profiles...**.

## Creating an import in the Marketing Suite
To create a new import in the Marketing Suite, first select the database or
collection that you want to import data into. Then, you will need to click on
the **gear** to access the settings window. Here you can select the option
**manage imports**.

## More information
Your database should be safely in the system now. Now it might be the
time to add some restrictions to protect it, or to add some more fields.
Find out more in the articles below.

* [Database management](./database-introduction)
* [Exporting a database](./database-export)
* [Fields and collections](./database-fields-and-collections)
* [Restrictions and capabilities](./database-restrictions-and-capabilities)
