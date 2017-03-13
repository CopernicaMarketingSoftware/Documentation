# Fields and collections
The structure of a database consists of fields, interests and collections. Fields are single-data containers for things like text, a date or a number. Interests are fields that can only hold “yes” or “no”. By adding a collection to a database, you add an extra layer to it. A collection also consists of single-data fields.

There are many different types of available fields, used for specific types of data. Among these are text fields, numeric fields and date fields. When designing a database, most of the interface speaks for itself, but for good measure we’ll describe the different aspects of databases below anyway.

## Collections
As stated above, collections make your database multidimensional. Regular fields can only be used for single pieces of data, like text or numbers. If you want to incorporate nested data, you can do so by using collections. An example of this is a collection of all placed orders per customer. In this case, the database is filled with profiles of customers, all of which have their personal collection “orders”, containing the products they bought, their price, etc.

## Interest fields
An interest field is a regular field, only it can only contain binary data (on/off, yes/no, 0/1). In the case of a sports store, these interests could be “football”, “tennis” and “hockey”, for example. 

When adding an interest, you also have to specify the category it belongs to. This category name is not that relevant for campaigns, but Copernica uses it to make forms for editing profiles somewhat neater. Interests that belong to the same category are grouped together in such forms.

## Fields
Within Copernica, there are numerous options for saving data. Both databases and collections consist of fields. When adding a field to a database, you must therefore choose whether you want to add it to the database itself or to a collection in a deeper layer. You have to specify the type of field before adding it. So text goes into a text field, numbers into a numeric one, and so forth.

## Numeric fields
Numeric fields can only hold values of numbers [0-9]. Use it to store things like age or weight. They must contain something, so it’s a good idea to set the default value to 0 to prevent errors. Note that numeric fields cannot hold decimals. If you want to do so anyway, use a text field. SOAP API users can use the ‘float’ field type.

## Text field
Text fields are for textual values and can hold letters [A-Z], numbers [0-9] and underscores. They can be up to 5 lines (multiline). The default length of a text field is 50 characters, but it can be expanded to 255 characters if needed. If you want to store more text than that, use a large field (explained below).

It’s best to keep a text field as small as possible. Limiting fields only to what is needed increases the performance of your database. The number of lines used is only used in dialogue to edit a profile and in the profile overview. It does not affect web forms.

## Large fields
Large fields are the same as text fields, but for one difference: they can hold up to 16 million characters (enough to store a bestseller). It’s better not to use this type of field, especially not for making selections. The large field is the only type of field that cannot be indexed.

## Date fields
Date fields are (naturally) used for storing dates. They require a correctly formatted date (yyyy-mm-dd). A date field is automatically filled with zeroes if empty (0000-00-00). The format used is easy for computers to understand, because dates can easily be sorted this way.

## Date and time fields
These fields are the same as date fields, only extended with a timestamp consisting of hours, minutes and seconds. They look like this: “1980-09-03 08:56:36”.

## E-mail fields
An email field is a text field, but solely for email addresses. If you are using Copernica for mailings (as is usually the case), you need to incorporate at least an email field, or else you cannot send mailings to that database. A database can only contain one email field. If you add a second email field, the first email field will automatically be converted to a text field.

## Phone field
A phone field can be used for fax, mobile phone numbers and other phone numbers. If you’re using a database for fax, messages will be sent to these numbers. the GSM field is used for mobile campaigns.

As with the email field, a database can contain only one phone field and creating a second will result in the first one being converted to a text field.

## Multiple choice field
While editing profiles and in various other places in the application, a multiple choice field is represented as a foldout menu. Type the options in the ‘value’ field. The first value automatically becomes the default value. If you wish to use a different default value, you can do so by adding an asterisk (*) to it. This looks like this:
- Amsterdam
- Rotterdam
- The Hague
- Haarlem *
This asterisk is not shown in web forms or when editing profiles. If you want to add an empty option, simply add an empty line. 

## Country code
This field only accepts country codes according to the ISO 3166 standard. The Netherlands has the country code NL, Belgium has BE. A full list of country codes can be found at ISO.org

[View all country codes](https://www.iso.org/obp/ui/#search/)

## Extra options
While editing fields, it is possible to select various extra options, such as sorting a field by default or hiding it. We’ll give you an overview of all options.

### Editing hidden fields
Hidden fields cannot be seen in the profile editing interface. Use this option for fields you don’t want to see or edit in the interface. It is still possible to import and export the data in these fields.

### Showing a field on overview pages
On pages where a list of profiles is shown, only the fields that have this option activated are shown. Often times, a database has many more fields than the ones shown in such a list of profiles. This option allows you to set which values you find most important.

### Sorted fields
This option allows you to sort your list based on a field. It can only be activated for one field at a time.

### Indexed fields
Use this option for fields you often use to search for profiles and fields you’ve used to create selections with. Indexing a field increases the speed of search queries within your database, as well as building selections and miniselections. Don’t index too many fields, as it defeats the purpose. A maximum of 64 of all types of fields can be indexed, with the exeption of large fields, which cannot be indexed at all.
