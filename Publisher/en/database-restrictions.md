# Database Restrictions

The Copernica software is equipped with a couple of safety systems to prevent
invalid data from ending up in your database and to prevent users from
accidentally sending out a mailing to an incorrect target. The
*database restrictions* feature allows you to create rules to filter
input data to prevent that invalid data is inserted into the database.
With *database intentions* you can prevent that a database or selection
is accidentally used to send out a mailing. These systems can be found in the
*profile management* section of the Marketing Suite.

## Database intentions

After creating a new database or selection you have to explicitly allow that
target to be used in a mailing. This is a security measure to prevent you
from emailing the wrong selection, for exampling sending mailings out to
your entire database when some users have been unsubscribed. With the
*intention settings* dialog you can enable mailing for your database or
selection. You can allow email, sms, fax and pdf separately for each selection.

## Database restrictions

The database restriction form inside the "edit database fields" dialog can be
used to add rules to a database or collection. When someone tries to add or
edit a profile (either via the application or a webform), the submitted data is
first matched with these restriction rules. If the data does not match the
restriction settings an error message will be shown and the form will not be
submitted. These restrictions may include a minimum age, or may enforce
users needing unique usernames. There is also the option "block doubles"
which prevents fields being stored twice to help you keep your database clean.

Restrictions apply only to new additions and edits to the database. Existing
profiles will keep their existing values, but will have to satisfy your
restrictions on their next edit. You can also choose to remove the
existing data with the "Edit multiple profiles" function.

## Regular expressions

Regular expressions (often abbreviated to *regex*) are very powerful patterns to
validate text. You can use them to add restrictions for data entering
your database. Regular expressions can do things like "check whether the value
begins with a capital", "the telephone number must contain exact 10 digits" or
"the sentence must have two comma's and a single capital Q". You can make
these as complicated as you want.

The following regex can be used to check whether a value is a dutch postal code,
which contains four digits and two letters (for example 1244XK):

`**/^[1-9][0-9]{3}[a-z|A-Z]{2}$/**`

Regex is fairly standard and a lot more information can be found on the
internet about it.

## More information

To add restrictions you need a database with some fields. If you don't
have those yet you can find out how to create them in the articles below.

* [Database management](./database-introduction)
* [Database fields](./database-fields)
* [Database collections](./database-collections)
* [Database unsubscribe behaviour](./database-unsubscribe-behavior)
