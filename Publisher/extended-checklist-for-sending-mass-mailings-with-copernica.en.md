Before you send a mass mailing with Copernica, it is important to
properly set up and test your document and dubble check all your
settings. If you have gone through all these steps, you are ready to
send.

### Setting up a database

You manage your databases and relations in the **Profiles** section. All
functions related to databases (such as creating one) can be found in
the menu **Database management**.

A **profile** is one single record in your database. For example, a
profile contains all the information about a single relationship, such
as the e-mail address, gender and name.

1.  First you need to have a database and import contacts, if you
    haven't done this already.
2.  [](./setting-up-your-database-and-import-your-contacts.en.md) Create
    a database and import contacts
3.  **Create fields**. You can create database fields in multiple ways
4.  Through an import. When setting up an import, you can instantly
    create new database fields and edit their [data type and
    properties](./database-and-collection-field-types.en.md).
5.  Create fields manually. [Check our instruction video on creating
    database fields](./profiles-adding-database-fields.en.md)

### Storing email addresses

To send a mailing, the application needs to know in which database field
you have stored the email addresses. Go to the **field settings** and
check if the field with email addresses is of the type 'E-mail address'

### Configure unsubscribe behaviour

The unsubscribe behaviour is activated when a recipient clicks on the
{unsubscribe} link in your email, or marked your email as spam. The
ubsubscribe behaviour is set from the **Database management** menu under
**Profiles**.

### Selections

Within a database you use selections to segment data, for instance to
make target audiences

A bulkmailing is always sent to a selection. Which profiles are in a
selection is determined by the conditions of the selection. The
selection can for example have a condition added to filter out
unsubscribes.

[Watch the instruction video on making selections](./profiles-selections.en.md)

-   [Newsletter selection](./create-a-mailing-list.en.md)
    - create a selection that only contains profiles that opted in a
    your newsletter, and filters out all unsubscribes
-   Test group selection - usually you want to test a mailing before you
    send it definitively. To send a test mail to multiple persons at
    once, you need to make a selection. You can for example make a
    selection that checks if the value of the field 'TEST' is equal to
    'YES' (you might need to create an extra field for this).
-   [Bounce management](./automatically-process-bounces.en.md)
    - Create a selection to manage email bounces in a proper way. This
    will help you maintain a good sender reputation.

### Authorize your newsletter selection for mass mailings

To prevent that mailings are mistakenly being sent to the wrong
selection or miniselection, you first need to tell the application which
selection(s) may be used for mass mailings or mailings of other types. \
 To authorize a selection, go to **Database management** \> **Set
intentions**

Emailings
---------

Now we're done setting up our database, it is time to point your browser
to the Emailings section of the software. In this section, you create
and manage your mailings, and finaly send them. We assume that you
already have a document. If you do not have a document already, you can
[load our standard template and
document](https://www.copernica.com/en/support/video-tutorials/emailings-setting-a-test-destination)
to get started.

### Checking the document's settings and possible errors

Before you send a mailing, you check the document and the settings to be
sure it meets the appropriate requirements. Copernica offers various
tools for that.

Open your document. In the lower toolbar you'll find a button to check
your document for errors. Click on it to open the dialog box.

1.  Have you set up [Sender ID](./setup-sender-id.en.md) and
    [DKIM](./signing-your-emails-with-dkim.en.md)?
    Using these email authentication methods is not mandatory, but it
    surely is recommended. You only need to configure it once and it
    will help you maintain your sender reputation across all your future
    email marketing campaigns.
2.  **HTML Check**- [check your document and template for erroneous
    HTML](./reducing-html-errors.en.md).
    Errors in your HTML can give unexpected results in the display of
    your newsletter in various email programs
3.  **Spam Check.** In the same dialog box you can check a document for
    spam sensitive characteristics. The best score is 0, the worst score
    is 5. Make sure your spam score is as low as possible.
4.  **Valid sender address**? Always use a *from*address that actually
    exists (you can receive e-mails at this address). Receiving mail
    clients check on this and may block your emails if you use a
    'no-reply' address.
5.  How does your email look like in Gmail, and in Outlook?. The display
    of HTML e-mails may differ in various e-mail programs. Conduct a
    Litmus test receive screenshots of your e-mail document in many
    e-mail programs and browsers.

### Send Test e-mail

You can send a test email to the profile you have set as the default
destination, or send a test mailing to a group of people from your
database.

-   Watch the instruction video about [setting up a default
    destination.](https://www.copernica.com/en/ondersteuning/videos/e-mailings-standaardbestemming)
-   Or read our online manual on [sending test
    mails](https://www.copernica.com/en/support/video-tutorials/emailings-sending-a-test-mail)

Did your test mail not arrive? There might be a [reason for
that](https://www.copernica.com/en/support/did-your-test-mail-not-arrive).

Sending a mass mailing
----------------------

Finally you've reached the moment where you can actually send your mass
mailing.

-   [Check the instruction video on sending mass
    mailings](https://www.copernica.com/en/support/video-tutorials/emailings-sending-an-emailing)
-   [Check all articles related to sending mass mailings](./sending-mailings.en.md)

