# Webforms in Publisher

The Publisher makes it possibly to create powerful webforms with ease. 
You can use the wizard to make sign up and sign out forms, or to gather 
information about your customers. You can also [personalize](./personalization) 
webforms.

## Create webform

You can make a webform directly when creating a webpage or create one in 
the **Content** module.

After you have made a form you have to edit your settings. You can use 
these to link the information you gathered to your database. You can set 
the form to log in or out of a profile, or change nothing at all. After 
sending a webform and entering the settings you can receive reactions. If 
you have changed a field in the profile, such as the newsletter field this 
might influence your selections next time they are refreshed. It's also 
possible to send a confirmation mail or thank you mail using [followups](./follow-up-manager).

### Create a webform in website

When creating a webform while creating a website your options are limited 
to subscribe, unsubscribe and tell-a-friend forms. The advantage of this 
is that it's fast and will quickly produce a snippet of HTML code to paste 
to your source code. This is also easier to publish on an external website. 
The customizing choices are limited, however, so if you want to fully customize 
your web form you should make it in **Content**.

### Create a webform under content

The webform wizard is located under **Content**. You can use the default 
stylesheet or XSLT to customize the style to your own preferences.

### Field types

There are five different field types:

* **Field**: A normal field that can be linked to a field in the database 
or the collection.
* **Interest**: A field that is linked to activate or deactivate interests 
for the profile.
* **Text block**: The text block can be used to add extra text or images 
between the entry fields.
* **Upload file**: The upload field can be used to add files to a profile. 
You can find any files uploaded here under the profile information.
* **Captcha**: The captcha field is used to prevent robots from submitting 
the form.

The normal fields have a few subtypes that influences the way the fields 
are handled and displayed:

* **Text**: Standard field for entering text.
* **Password**: An entry field where the text is replaced by stars to 
mask a password.
* **Repeat password**: Can be used to set a password. This option creates 
two password fields. The form can not be submitted if these are not identical.
* **E-mail address**: Can be used to check the entered email address for validity.
* **Drop-down list**: Field with multiple answers that you can scroll 
through. You can also type the value you want in the database, followed by 
two colons (::) and the value you want to display.
* **Radio buttons**: Field with multiple answers where you can select one answer.
* **Checkboxes**: Field with multiple answers where you can select multiple 
answers.
* **Number**: Field that can only contain numerical values
* **Date**: Date in YYYY-MM-DD format. (Don't forget to inform your users 
of the format used!)
* **Date as drop-down menu**: This field uses a calendar that your users 
can select a date from.
* **Invisible**: Field that is synced to the database but not displayed 
in the form.
* **Multi-line text**: Field where multiple lines of text can be entered.

### Field options

Every field has several options as well:

* **Required**: Determines whether or not the field has to be filled in 
to submit.
* **Key field**: Before a form is entered all key fields should match 
a profile in the database. This is especially useful for login forms.
* **Case sensitive**: Determines whether or not the field is case 
sensitive.
* **Value from database**: Determines whether or not the value of a field 
should be pre-entered if known.
* **Default value**: Value to use if no answer is given.

## More information

* [Limit the number of submits](./limit-the-number-of-times-a-web-form-can-be-submitted)
