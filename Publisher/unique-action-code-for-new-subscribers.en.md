Win fresh souls through a stimulus. Anyone who signs up for your
newsletter will receive a unique code in their e-mail inbox. While
stocks last of course. With this action code new subscribers can for
example collect their price or get a discount.

Getting started
---------------

-   Create a database with at least a field included for the code (I
    named the field *uniquecodes*) and a field for the email address
    (You can also use an existing database, and only import the codes as
    new profiles into this database).
-   Upload the unique codes to the database. (Go to
    http://www.randomcodegenerator.nl/ to generate unique codes.)

Create a new webform, where you just add a field for the email address.
Make this field NOT a key field.

![](Documentation/code1.png)

Form will look something like this:

![](Documentation/code5.png)

Go to the webform settings to adjust its behaviour (Webform menu \>
**Settings...**):

Choose *'Login as a profile*', fill in a button text and define the next
page where you tell the subscriber that an e-mail will be sent to him or
her with this unique code.

![](Documentation/code6.png)

Adjust the behaviour of the form (*Edit profiles*tab at the web form
settings)

-   The form applies to: *... Each profile that matches the key fields*
-   Maximum limit of matches: *1*
-   Create a condition and use the JavaScript editor to enter the
    following line of code:\
     `  profile.email ==''`\
     (change the name of the field to the field name in which you want
    to store the email addresses).\
     ![](Documentation/code3.png)

\

-   The profile *Should be ... updated*
-   What should be done when no profile is found: *An error message
    should be displayed*\
     Use *This action is over, next time better, mate.*(or something
    similar)
-   Skip the section on restrictions.
-   Click **Finish**.

The form will now search for matching profiles in your database and
finds a match based on the condition that the e-mail field must be
empty. If there are no longer empty e-mail fields available, the key
field no longer matches a profile. The form cannot be processed and the
message 'The action is over' will be shown. The form now has the correct
settings.

### Add a follow up action to the webform

Choose '**Follow-ups...**' from the web form menu, and set it so that an
email is sent to the profile when the profile is changed.\
 Personalize this email with the unique code {\$uniquefield}.

Include a hyperlink to a web page with a login form in which both the
email address as the unique code act as a key field.

![](Documentation/code4.png)

On the landing page of this login form you can then indicate where the
subscriber can collect his or her brand new toaster.

That's it. Go test your campaign!
