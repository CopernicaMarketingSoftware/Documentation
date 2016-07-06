#Database field structure

A database is built with fields to store pieces of information about the profiles inside the database. Typical fields in a database used for mailings are fields to store *email*, *first name*, *last name* and so forth. 

The way how a database is built with fields we call the Database Structure. To start adding fields to your database:

- In the overview of the database, go to the tab **Options**
- Click the button **Edit structure** to go to the Edit Structure tool.
- Click on **Create field** to create the first field. 

After storing the new field, it will appear in the main overview. You can add a second
field by clicking **Add field** under the newly created field in the overview.

Tip: To subsequently add fields, just hit the Enter button when the first is created. 

## Field types

The fields of a database are always of a specific type. Each field type are best suited, or constraint
to store specific kind of information.  

To store email addresses there is the field of type *email*.  To store a total amount of purchased 
products at a profile, a *numeric* field would be most suitable. 

Although it is perfectly allowed to store a numeric value inside a text field, it is best
practice to use the numeric field instead. This way you maintain a clean and fast database.

In the Marketing Suite you can use the following field types:

###Numeric

   Use the numeric field type to store numeric values. This field type has two 
    sub types:

* **full number**

Choose this subtype if the field may only contain full numbers [0-9]. 

* **decimal number**

Choose this subtype if the field may only contain full numbers and decimal numbers (e.g, 10.40) 

###Date field 
Date fields are used to store dates or dates and time. Date fields must contain a valid formatted date in the system format (yyyy-mm-dd). Fields with no date specified are automatically filled with zero’s (0000-00-00) if you have checked the option 'may not be empty'.  The date field has two subtypes. One for storing normal dates and the the other for storing date and time. 
Datetime field are normal date fields but extended with 24h time notation (hh:mm). Example: 1980-09-20 08:56

###Text field

Text fields, as the name suggests, are fields used for textual content. Text fields can contain all sorts characters including text, numbers, and special characters. The default length of a text field is 50 characters. You can enhance this number up to 255. If you want to use more than 255 characters rather use a ‘big field’ (see below).

### Big field

Big fields are basically the same as text fields, with the only difference that it has no limit in the number of characters it can hold.  Use this field only when a normal text field doesn't suffice. Selections based on big fields are significantly slower than other fields. 

### Email field
E-mail fields can only be used to store legitimate e-mail addresses. When sending an emailing to a database or selection, the application will use the addresses stored in this field to send the emails to.

It is important to know that only one field of the type **email** is allowed per database or collection.  

### Phone field

The phone field is used to store phone numbers. The phone field has 3 subtypes:

* SMS: Use this subtype for mobile numbers able to receive SMS messages. Note that SMS campaigns are not currently available in the Marketing Suite. 
* FAX: Use this subtype to store fax numbers. Note that fax campaigns are not supported in the Marketing Suite.
* Regular: for any type of phone number

As with email address fields, a database can only contain one field for mobile numbers and one field for fax numbers. 

### Select field

Use the select field to allow a limited number of values only. Add multiple values by entering each value on a new line. 

This field type is useful in situations if you want to allow predefined values only. For example, a field holding newsletter preference, that may only contain the values 'subscribed', 'unsubcribed' and 'not_set'.

###Interest field

An interest field is a special kind of field that allows only two values: 'yes' or 'no'. It is used mainly for listing interests and preferences of contacts, hence the name. For example an interest field could be 'newsletter'.

###Group name

An interest field is always tied to an interest group. For example an interest group 'sports' with the interest fields 'chess', 'poker', 'darts' and  'fierljeppen'

Note: interest fields are only available inside databases, NOT inside collections.

### Interest fields and email personalization

An interest field knows only two values: yes and no. You refer to an interest field with `$profile.interestname`

A smarty condition based on an interest field will look something like this:
    
    {if $profile.football=="yes"}You like football{/if}
    {if $profile.baseball=="no"}You dislike baseball{/if}
