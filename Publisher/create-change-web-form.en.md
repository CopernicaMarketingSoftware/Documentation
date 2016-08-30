The web form explained in this article enables visitors of your website
to sign up for you newsletter, and existing subscribers to edit their
data. In this tutorial you need a database, a web page to publish the
web form, and a webpage used as the landing page for your web form.

In order to create such a web form, you designate use [key
fields](http://www.copernica.com/en/support/what-are-key-fields) in your
web form. A key field is a unique field used to link the data of the
submitter with his profile in your database. Fields containing the email
address or a client number are ideal for this. A key field is not set in
the database, but in the web form itself.

Create the webform
------------------

Go to the Content section in the application to create a new web form
and link it to the database containing your subscribers.

-   Go to add fields (to add a field, or two)
-   Create a new field and link this to the database field containing
    the e-mail addresses.
-   Make this web form field a required loose key field
-   Click on store and add some extra fields if you like. For example
    you can add a dropdown list with newsletter preference (this is
    obviously not a key field).

**Tip.** You can write a value to the database that is different from
the value that is shown in the web form by placing two colons (::)
in-between the two values, as follows: \
Yes::Yeah, I would like to receive your news letter!

![](images/1.png)

-   **Hit the store button.**

### Adjusting the webform behaviour

Now you are going to add the right behaviour to the web form. Go to Web
form menu \> **Settings**

-   Choose: login as a profile from the database [database].
-   Choose the next page and the button text.
-   Go to the Edit profiles tab.

Run through the wizard and choose the following settings (steps not
mentioned here can be ignored in the wizard).

-   The form applies to… each profile that matches the key fields.
-   The profile should be… updated.
-   What should be done if no profile is found… the profile must be
    added.
-   In the overview, click on finish to store the new web form
    behaviour.

![](images/2.png)

The web form is now ready to do the job. [Publish the web form on a
webpage](#) and [test it in your browser](#).Your new web form will look
something like this (probably not in Dutch and with those ugly grey
Windows XP design form elements, but you get the idea).

![](images/3.png)

You may also add a web form follow up to send a confirmation via e-mail.

Always test your web forms properly!
