# Profile imports

There are a couple of ways to get your profile data into a Copernica database.
You can manually enter the profile them, one profile at a time, or you can use
our API to synchronize profiles automatically. It is also possible to import
profiles from a CSV or tab delimited file (the type of files that you can 
edit with spreadsheet software). 

Imports from CSV files are very flexiable and can even be used for layered
databases that contain collections and subprofiles. It also is possible to
schedule automatically repeating imports that download a file from your
server. The import module can be found in Publisher in the profile section,
in the "Current view" menu.


## The import file

Your import file has to be formatted in a specific manner to be suitable
for an import. It must be a tab or comma delimited file, and the first line
should hold the names of the database fields into which you are going to import.

    Firstname,Lastname,City,Phone
    John,Doe,Denver,555-343-32
    Peter,Smith,Nashville,555-341-66


## Linking columns

After you've uploaded a fiel, you must link the columns in the file to fields
in the database. This is normally a very straightforward job: the column
"firstname" gets linked to the field "firstname" in the database. If the database
does not (yet) have a "firstname" field, you can link the column to a different
field or you can directly use the import module to add a new field to the database.   

When you're linking the columns, you can also assign the *key* fields. With 
this keys fields you can use imports to update profiles. For each line in the 
import file, Copernica searches for matching profiles based on the selected keys,
and updates these matching profiles. You can also configure what you want to do
with lines for which no matching profiles are found: ignore these lines or 
you can create new profiles.


## Dealing with subprofiles

To import a layered database with profiles and subprofiles you need a 
special notation for the field names in the import header. For each of the
fields in the collection you use the "collectionname.fieldname" notation. If
you're running a pet shop and you have a customer database with for each 
customer a collection of its pets, you can import the following file:

    Firstname,Lastname,City,Pets.Name,Pets.Type
    John,Doe,Denver,Blacky,Dog
    John,Doe,Denver,Princess,Cat

You notice that "John Doe" is mentioned twice. This is the same customer "John Doe" 
that happens to have two pets: Blacky the dog and Princess the cat. Because each 
subprofile (the pets) have to be entered on a seperate line, the profile data
("John Doe") is repeated too. Do make sure that you have assigned the right
key fields (for example the combination Firstname, Lastname and City) to allow 
Copernica to recognize that the two "John Doe" lines refer to one profile, instead 
of handling the lines as two seperate profiles: one with a dog and one with a cat. 


## Periodic imports

Instead of uploading a file, you can also enter the URL to an import file that
is hosted somewhere on the internet. By assigning a URL you can schedule repeating
imports. Copernica downloads the file, and can repeat this at regular intervals.

All the settings for periodic imports are the same as for uploaded imports. For
periodic imports you also have to link columns to fields, and you also can assign
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
date 03-09-1980 can be read as 3 september or as 9 march. So it is better not
to rely on this conversion and always upload files that use the Copernica format.

Invalid dates are ignored and are converted into 0000-00-00 dates.

## Rollback invalid imports

If you make a mistake with your import, you may overwrite your entire database
with wrong data. This makes it very important to stay concentrated! There are
some trics to rollback some of the effects of a wrong import, but it is way
better to not make a mistake in the first place.

If your wrong import created profiles that you now want to remove, you can 
create a selection with just these new profiles. For this you can make a selection
with a single "check for changes" condition based on the "profile was created"
event. After you've created this selection use the "edit/remove multiple profiles"
dialog window to remove all profiles from this selection.

Did the import modify profiles that you now want to bring back to their
original state? Individual profiles have a rollback feature, but this feature
can only be used one profile at a time. You can also ask Copernica to install
a backup of your database, but you might be charged extra for that.