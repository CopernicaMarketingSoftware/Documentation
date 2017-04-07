# Followups tutorial: White Paper marketing campaign

This article describes how you create a whitepaper marketing campaign.

In a white paper marketing program you offer educational or interesting
articles (the White Papers) about your field, with the aim of gaining
new leads or to expand your client database.

The process is as follows:

-   On your website you offer interesting articles
-   To receive the articles you ask the visitor to fill out a
    (registration) form in which the articles are listed as checkboxes.
-   The recipient will receive an email containing a hyperlink to a
    secure web page from where the selected articles can be downloaded.
-   Your sales department is automatically informed when a whitepaper
    download has been requested. There's your lead!

## Step 1. Prepare your database

In the database where your relationships are stored create a new
[interest group](./working-with-interest-fields-and-groups.md)
. Give this group a descriptive name, e.g., *whitepapers*, and make an
interest field for each whitepaper that can be downloaded.

Although interest fields are eminently suitable you can of course use
normal database fields if you prefer so.

## Step 2. Make the web form

-   In *Content*, create a new [web form](./introduction-to-web-forms.md)
-   Add the required fields (at least name, email, phone)
-   Include the interest fields
-   It is nice to inform the submitter that he may be called by your
    sales dept. later
-   You could ask the submitter if he would like to receive your
    newsletter as well
-   The form is a normal registration form.

## Step 3. Create a new e-mail document

This document will be sent to the profile as a follow-up action on the
web form. In the e-mail document place a hyperlink that points to the
web page from which the white papers can be downloaded. The link must be
expanded to [include personalization code](./linking-to-your-website-from-an-emailing.md)
, to ensure that the profile is automatically logged in when he visits
the secure download page (see step 5).

## Step 4. A follow-up action linked to the webform

-   Go to the Webform menu and choose **Follow-ups...**
-   Make a follow-up action that results in the sending of a formatted
    email document to the newly created profile (the lead).
-   Create a second follow-up action, with the action to send an email
    to the sales department to let them know that a new lead is
    received. The document can be personalized with details about the
    new lead, including his or her phone number.

## Step 5. Make the download page

Create a new web page. On these pages you link to the document being
requested. This can be done with a simple smarty code. The code takes
care that only the documents that are requested will show up.

`{if $profile.artikelA=="yes"}Download artikel A{/if}`

`{if $profile.artikelB=="yes"}Download artikel B{/if}`

`{if $profile.artikelC=="yes"}Download artikel C{/if}`

`{if $profile.artikelD=="yes"}Download artikel D{/if}`

### Additional settings for the web page

The web page with the download links should be made a secure page.

Go to **Websites**, open the download page and then choose *Set
access*from the web page menu. Tick ​​the option in the dialog box which
says *This page is only available for logged in visitors*

[Back to followups in Publisher.](./followups-publisher)
