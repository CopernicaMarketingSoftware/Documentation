Creating a login, logout or lost password form is done in a fews steps.
This article shows you how they are created.

You will need.

1.  A database with at least two fields containing unique values for
    each profile. For instance a field containing the e-mail address and
    a field to store the password (or a client number).
2.  A webpage to put the form on.
3.  A landing page for the web form.

Create a web form wherein at least two fields are included. For instance
the email field, and a field holding the password (or a customer code if
you like). Both fields must be set as a required key field.

-   Go to the web form settings and choose the following setting
-   Login as a profile from the database [database]
-   Choose a button text and the next page.

Go to the **Edit profiles**tab

-   The form applies to *… each profile that matches the key fields*
-   *The profile should be updated*
-   *An error should be displayed*(e.g., the e-mail address was not
    found in the database)
-   In the overview, click on **finish** to store the behaviour settings

Place the login form somewhere on your web page using the {webform
name=""} tag.

Lets make the web form landing page not accessible for people who are
not logged in.

-   Go to the webpage menu en choose ‘Set access’
-   Choose: This page is only available for logged in visitors

The web form is now ready to test.

**Log-out**
-----------

Create a new web form

-   Do not add any fields, just go to the web form settings
-   Choose ‘logout’ from the setting option and choose a button text.
    Click store and place the form (consisting of only a single button)
    somewhere on a web page.
-   If the button is pressed by a logged in user, he or she will be
    logged out immediately.

**Question:** is it possible to use a text link instead of the button?

Yes, you can do this with JavaScript and XSLT. For a JavaScript example
go
to [http://www.thesitewizard.com/archive/textsubmit.shtml](http://www.thesitewizard.com/archive/textsubmit.shtml)

You can also use CSS to manipulate the appearance of the form element
button.

**Forgot password??**
---------------------

Not a problem.

Create a new web form with and add one field: the e-mail address. Make
this field a required key field. Go to the web form settings and choose
for ‘No change’ in the general settings tab.

Go to the Edit profiles tab and choose the following settings:

-   The form applies to*...each profile that matches the key fields*
-   The profile should be*…updated*
-   What should be done if no profile is found.. *show an error
    message*(e.g, e-mail address not found)
-   In the overview, click on **finish** to store the new web form
    behaviour

Someone submitted the web form and wants to retrieve his password via
e-mail.

Link a follow-up action to the web form (you can do so via the Webform
menu \> follow-ups.

-   **Cause:**a profile or subprofile is found
-   **Action:**send an e-mail text message
-   **Choose** ‘the same profile or same subprofile’
-   **Edit**the content of the e-mail and personalize it with the field
    containing the password, for instance `{$password}`

Test the web form and follow-up. Did not receive the email? Make sure
that the database field that holds the email addresses is an email
field.
