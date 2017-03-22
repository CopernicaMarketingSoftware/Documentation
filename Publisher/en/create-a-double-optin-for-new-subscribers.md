You are interested in creating a double opt in for new subscribers.
Excellent choice! But what is a double optin?

A new subscriber asks to be subscribed to the mailing list, but unlike
single opt-in, a confirmation email is sent to verify it was really
them. Also known as the *Confirmed Opt in*.

The double optin has some important advantages compared to the single
opt in.

-   The person who subscribes always is the same person who will receive
    your emails.
-   The email address that is used for the subscription is always
    validated.
-   You will keep a clean database with real people who are interested
    in your product or info.
-   You will get significantly less errors when sending out emails.
-   As a result it is less likely that your emails get trapped in spam
    filters.

#### This is how it works:

1.  A new subscriber asks to be subscribed to the mailing list and uses
    a web form to fill out his or her email address.
2.  When the subscriber submits the web form, a confirmation email with
    a verification link will be sent to the email address.
3.  Only after the subscriber clicked on this link, the subscription is
    completed.
4.  Optionally you can send a confirmation after completion, offering
    helpful information where the subscriber can change his or her
    details or end the subscription.

Now let’s create a double opt in.

#### You will need the following:

-   A database with a multiple choice field about newsletter preferences
    and a field holding the email address.
-   Three web pages: one to place the subscription form on, plus a
    second page as landing page of the webform and a third page used as
    a landing page after confirmation.
-   One email document with the confirmation link.

### **First step: setting up the database**

Start with setting up the database. This database should at least
contain a field to store the subscribers email address and a field to
store newsletter opt in information. Go to Edit fields from the Database
management menu to create a new field or to edit an existing one.

Create a field of the type multiple choice field, and prefill (default
value) it with the following options:

-   No
-   Yes, not confirmed
-   Yes, confirmed

### **Second step: create webpages**

-   Create three web pages.
-   The first one will hold the subscription form
-   The second one will be the landing page of the subscription form and
    say something like: Thank you for your subscription. A confirmation
    email will be sent to {\$emailadress}. Click on the link in the
    email  to complete the subscription.
-   The third webpage is the final landing page, and is loaded after the
    subscriber clicks on the confirmation page.

### **Third step - Creating the subscription web form**

    Now head to the Content section to create the subscription form.

-   Choose ‘**New web form**’ from the web form menu and link it to your
    database.
-   Add (at least) two fields.
-   Link the first field to the database colom with emailaddresses, make
    it a **Loose key field**and make this a **required field** (user
    cannot submit form without filling out this field).

The second field will be an invisible field:

-   Enter some value at 'label' (this will not be visible to
    subscribers).
-   Make this field **no keyfield**.
-   Link it to the field to the database colom which holds the
    newsletter preferences. .
-   Set the type of the field to invisible.
-   Enter **Yes, not confirmed** in the textbox for default value.
-   Click on **store**.

    You are free to add more fields to ask for more information, such as
    gender. But be aware that asking too many details can seriously
    discourage people from subscribing. You can always ask for more
    details later. \#\#\# Change the web form behavior

Go to the webform menu, and click on **Settings…** to open the web form
settings dialog.

In the dialog that appears, choose the following settings:

-   Login as profile from database [your database].
-   Choose a **button text**.
-   Choose the landing page. This is the page the subscribers will be
    redirected to after they have submitted the webform. Call this page
    ‘thankyou’ for example.
-   Click on **store**, but do not close the dialog screen yet. Go to
    the **Edit profiles** tab instead to start the webform settings
    wizard.

Choose the following options:

-   The form applies to **...each profile that matches the key fields.**
-   Choose that when a matching profile was found based on the key field
    an error should be returned.
-   Choose the error text (e.g., You are already receiving our emails).
-   In the end of the wizard **click on finish**.

### **Fourth step – Create the document with confirmation link**

In the Emailings section create a new document (if you haven't got one
already). This is the document new subscribers will receive after they
submitted the webform.

In this document, include a hyperlink, which points to the second
landing page.

-   Go to document follow-ups in the document menu. **Create a new
    follow-up.**
-   **Cause**: the registration of a click.
-   Link: paste the confirmation link into this field.
-   Delay: 0 minutes (the confirmation will be sent immediately).
-   Effect: change (sub)profile data.

Choose the same field you used for the hidden field in your webform (the
one with Newsletter preference) and enter the default value **Yes,
confirmed**.

Store the follow-up. When the subscriber clicks on the link, the
follow-up will be triggered and tthe value of the newsletter field will
update itself to **Yes, confirmed**.

### **Fifth step – send the confirmation mail**

You are now nearly finished. Go back to the section Content and select
the webform that you created in the third step.

After the new subscriber has submitted the webform, you want to send him
or her an email to confirm the subscription. We are going to use a
[follow up action](./automate-campaigns-with-follow-up-actions.md) for that.

-   Go to Webform menu \> **Follow-ups…**
-   Create a new follow up.
-   At cause choose **'The form has been submitted**'
-   At action choose 'Send a formatted document by e-mail' and select
    the document that you want to send as a confirmation.

    Good.

### Latest step: test your double opt in.

Add the web form to the first web page and test if it all works!

Ow, and don't forget to make a [Newsletter database selection](./selections-and-miniselections.md)
(check on field, the field newsletter must be equal to Yes, confirmed)
and use this selection to send your newsletters to.
