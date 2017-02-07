# Database restrictions and intentions

The Copernica software is equiped with a couple of safety systems to prevent
that invalid data ends up in the database, and to prevent that you accidentally
send out a mailing to a wrong address list. The *database restrictions* feature
allows you to create rules to filter input data to prevent that invalid are
inserted into the database. With *database intentions* you can prevent that
a database or selection is wrongly used to send out a mailing.

Both systems van be found in the profile management section of Copernica Publisher.
The intentions can be found in the database managent menu of the profiles
section. To edit the restrictions you first have to open the form to edit
the database fields. In this form you find the link to set the restrictions.
 

## Database intentions

When you create a new database or selection, you will notice that you can not 
immediately use it for mailings. This is a security measurement to prevent 
that people accidentally send out mailings to their entire database, instead 
of sending it to just the newsletter subscribers. Before you can send a mailing
to a database or selection you therefore first have to enable the mailing intention
for the database of selection. You can do that with the intention settings dialog.

The intentions window shows the database and a full list of all available 
selections. For the database and for every selection you can set its intentions: 
email, fax or mobile. Only after you've set the intention, the database or
selection will appear in the list of available targets when you try to schedule
a mailing.


## Database restrictions

The database restriction form inside the "edit database fields" dialog can be 
used to add rules to a database or collection. When someone tries to add or 
edit a profile (either via the application or a webform), the submitted data is 
first matched with these restriction rules. If the data does not match the
restriction settings, an error message will be shown and the form will not be 
submitted. Nothing gets stored in the datbase. The restriction rules allow you 
to for example set up a database that does not allow the field "age" to be 
lower than 18, or that does not permit empty values in the "email" field. You 
can also create restriction rules that prevent that double profiles from getting
into the database.

If you change the restriction rules while the database already contains profiles, 
you run the risk that one or more profiles in the database suddenly no longer 
meet the new restriction criteria. This can happen and Copernica allows this.
The "invalid" profiles are kept in the database and keep their old, illegal, 
state. However, the next time you try to edit one these invalid profiles, you 
will be forced to update the profile so that it matches the restriction rules. 

Selections rules can be very advanced. A single restriction may consist
of multiple rules that are combined with "AND" and "OR" operators: if you make 
a restruction with multiple "AND" rules, a profile must match all the rules to
be allowed in the database. If you use the operator "OR" to combine rules, a 
profile only has to match a single rule. 

You can also use the restrictions to prevent that identical profiles get into
the database. The option "block doubles" should be used for that. Before a new
profile is added to the database, the database is first checked to see if it 
already contains a profile with the same combination of fields. Only unique 
profiles will be allowed in.


### Regular expressions

When you create a field value restriction, you can choose from a list of operators
to check the value. It is possible to require that a field equals a specific value,
or that it should contain a certain *substring*. The most powerful field value
check that you can use is the regular expression.

Regular expression (often abbreviated to *regex*) are very powerful patters to
validate texts. Regular expressions can do things like "check whether the word
begins with a capital", "the telephone number should contain exact 10 digits" or
"the sentence should have two comma's and a single capital Q". If you spend some
time on it you can even make a regular expression that recognizes prime numbers.

The following regex can be used to check whether a value is a dutch postal code,
which contains four digits and two letters (for example 1244XK):

**/\^[0-9]4[a-z|A-Z]2\$/**

If you want to learn more about regular expression, you best check the internet. 
It is full of tutorials and websites that teach you to write regular expressions.

-   [http://regexlib.com/](http://regexlib.com/)
-   [http://www.regular-expressions.info/](http://www.regular-expressions.info/)

Watch out: a regular expression always starts and ends with a slash (/).

