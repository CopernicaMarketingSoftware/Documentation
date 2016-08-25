Certain types of web forms are often used by our customers. This article
lists which settings are required for a **subscribe form**. A
subscription form creates a new profile in your database. It is meant to
gather new contacts. A subscription form therefore is offered to the
reader blank (instead of prefilled).

If the new contact should also be logged in once the form is completed,
set 'Login...' under Current settings. The profile will be created and
logged in when the form is submitted.

### Create the form\

Create a new form and add at least 2 fields to the form.

1.  **Email field:** Link it to the database field that you use to store
    the email addresses. The field is no key field.
2.  **Permission field:** Link it to the field in which you store the
    newsletter preference. Make the field invisible (hidden), and its
    default value 'yes' \

### The behaviour of the form\

Go to Webform \> Settings… to modify the web form settings

Use the setting '*Login as profile from database [database]*'

Choose the text for the form submit button and the landing page of the
form.

![](Documentation/webformssettings1.png)

Open the tab *Edit profiles*to edit the web form behaviour, and use the
following settings:

![](Documentation/formssettings2x.png)

continue

![](Documentation/formssettings3x.png)

continue x 2

![](Documentation/formssettings4x.png)

You have reached the end of the webform behaviour wizard. Click finish
to save changes.

You can now publish the form on a webpage using the tag {webform
name="yourform"}
