Having troubles configuring your Content web form? Here are some
possible causes and solutions.

**Important**: To test the working of a web form, it must be published
on a web page hosted within Copernica. You can only test workgin of the
webform by actually visiting the page with the web form in the browser.

To test your web page in your internet browser, it must be linked to a
domain or subdomain first. See how you can link a domain.

Content web forms can only be published within Copernica hosted websites
(created under Websites).

-   **To edit the behaviour of the web form**\
     Go to Content \> Select the web form \> In the web form menu,
    choose Settings \> Go to **Edit profiles**tab
-   **To edit the settings for the fields of the web form**\
     Go to Content \> Select the web form \> Click the field that you
    would like to edit \> Click **Edit field**from the lower toolbar.

![Webform behave yourself!](Documentation/webform-behaviour-wizard.png)

### Your web form does not redirect to landing page. When the form is submitted, the form is reloaded.

When the web form reloads itself after it is submitted, instead of
redirecting to the designated landing page, usually the profile or
subprofile is not known. Thus the form cannot be processed.

Solution: have you already tried to open the page with the webform as a
logged on user? Normally, when you link to a webform (that does not work
with key fields) you would add login code to the link:

http://www.yourpage.com/mypage**?profile={\$profile.id}&code={\$profile.code}**

To test the web form you can send yourself a test mail with the link to
the form. From test mail, click to the web form, to see the web form
personalized with your data. Submit the form.

### The web form should be prefilled with data, however it is not

The web form can only be prefilled with user data, if the user is logged
in. See previous solution.

### The webform seems to work, however, the database is not updated with the new data.

Your form might be not linked to a database or to the wrong database. A
web form is linked to one database at a time. Make sure that the web
form is linked to the database it should interact with (your [test
destination](http://www.copernica.com/en/support/send-a-test-mail-or-test-mailing)
should be in this database, and you target your mailing to this
database).

To see to which database the web form has been linked, go to the web
form **Settings**dialog.

### The data could not be stored

Are there database restrictions configured on the database? This may
obstruct the web form from being processed. In the web form behaviour
wizard, you can enter the warning text that is shown when invalid data
is entered by the submitter.

### When processing the form, [database] is searched for key fields, but no key fields have been set yet in the web form itself

You have no key fields designated in the web form. The web form
behaviour is configured to search profiles based on the key fields, but
the web form never had key fields, or those fields have been
accidentally removed.

To designate the key fields, click on the field that you would like to
use (most users prefer the email address field) and then click **Edit
field**. Add key field choose the desired setting (strict key field or
loose key field). You can designate multiple key fields (needed in login
forms, to check for instance both on username and password).

![Key field](Documentation/webforms-make-form-key-field.png)

### Key fields have been made in the web form, but these are not being used to search with in database 'yourdatabase'.

You have designated one or more fields in the web form as key fields.
However the webform behaviour is not configured to search for the
profile using these key fields. To solve the issue, go to **Edit
form**(in the web form menu), go to the **Edit profiles tab**and click
**Change behaviour** to start through the wizard.

When the wizard asks *'The form applies to*...', choose *'each profile
that matches the key fields'*if the web form should only work with
profiles that already exist in your database.

Or choose '*...a newly created profile*' [continue] '*yes check the key
fields*' to only create a new profile when the profile is not known. If
the profile is known, the profile should be updated with the entered
data.

![](Documentation/webform-set-behaviour-key-fields.png)

### You get the warning 'All rules have been set to ignore the profile. The form will not perform any action.'

In the web form behaviour wizard you can choose the option to ignore the
profile. This option is only relevant if the web form also works with
one or more collections. If the web form has no collections, choose one
of the other options.

 
