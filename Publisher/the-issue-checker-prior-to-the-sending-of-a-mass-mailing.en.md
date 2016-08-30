Before we let you send your mass mailing definitely, we perform various
checks on the document, the target and the delivery settings for the
mailing. Some errors must be resolved, while others can be ignored. We
kindly ask you to consider all the warnings given in the Issue checker.
In this way you are assured of the best email delivery and help us
maintain a healthy sender reputation.

-   **Check on 'from' address and sender**
    -   [Check on the 'from' address](#afzender1)
    -   [The 'from' address does not exist](#afzender2)
    -   [The SPF is not correct](#afzender3)
    -   [Sender ID is not correctly configured](#afzender4)
-   **Blacklists**
    -   [The IP address has been blacklisted](#blacklists1)
-   **DKIM Check**
    -   [We check whether a DKIM key is configured correctly](#DKIM1)
-   **Server settings check**
    -   [MX record does not refer to a host that refers to the correct
        IP address](#server1)
    -   [The MX record does not refer to a host that refers to the IP
        address of the application](#server2)
    -   [The sender IP is not listed in the SPF record on your
        domain](#server3)
    -   [SPF record has syntax error](#server4)
    -   [SPF check resulted in a temporary DNS error](#server5)
    -   [There is no SPF record for the domain](#server6)
    -   [Picserver domain settings are not correct](#server7)
-   **Spamscore check**
    -   [Check on the spam score of the document](#spamscore1)
-   **Check on the target of the mailing**
    -   [No unsubscribe behaviour has been set on the target database or
        collection](#bestemming1)
    -   [Unsubscribe header not activated](#bestemming2)
-   **Check on the content of your document**
    -   [Unsupported content has been detected in your
        document](#inhoud1)
    -   [Document has no text version](#inhoud2)
    -   [Check on the size of your document](#inhoud3)
    -   [Check on the size of email attachments](#inhoud4)

'From' address check
--------------------

#### Check on the 'from' address

Each email message sent with Copernica Marketing Software must be
included with a valid *'from'* address. This is the address visible to
each recipient of the email as the sender of the message.

**Setting the *from* address**\
 You can configure the *'from'*address and other header values (such as
reply-to and BCC) directly above the document..

#### The 'from' address does not exist

A *'from'* address has been set for the document, however it seems that
the *from*address is not a valid (existing) address. Email clients and
spam filters check whether a *from* address exists or not. The advice is
thus to always use a valid address. Also when you use a noreply address
(no-reply@mydomain.com), make certain that emails can be delivered to
this address's mailbox.

**I get this warning, but I am sure that the address is valid. How
come?**

​1. If you have used Smarty personalization in the 'from' address field,
check if the[test
destination](https://www.copernica.com/en/support/what-is-the-test-destination)
has a valid 'from' address.

​2. The SMTP server connected to the email address is temporarily
unavailable or offline. Check if your own emails are actually delivered
to the address (use your Gmail or Outlook to send a test mail. Did it
arrive?)

​2. If the system keeps telling you that your from address does not
exist, and other emails are delivered normally, most likely greylisting
is used on your SMTP mail server. Some email servers make use of
greylisting to fight spam. When when greylisting is utilized, it will
refuse any incoming mail at a first attempt, and accept the mail at a
second or third attempt. Most spammers only do one attempt so it is a
technique that has proven its effectiveness (btw, we do 20 attempts to
deliver your emails untill we give up).\
 To check if an email address exists, we send a dummy email to the
address to see how it reponds. When greylisting is used, the dummy email
we send is bounced, resulting in the error message.

Keep in mind that spam filters use the same technique to validate the
'from' address and use this (among other things) to distinguish legit
mail from spam. It is therefore advised to not use greylisting on the
email ‘from’ address that is used for sending mass mailings.

[More info about greylisting](http://www.greylisting.org/)

#### The SPF is not correct

SPF (Sender Policy Framework) is a method used by major email clients
(ISP’s) to reject spam and phishing. It helps them to recognize you as
the actual sender of the email message (unlike a sketchy phishing
company). Messages sent with Copernica automatically have a correct
SPF-configuration. If you get the warning about the SPF not being
correct, it is most likely that you use a different envelope domain
(sometimes referred to as 'bounce domain'). *Go to Admin \> Account \>
Delivery settings \>***Envelope domain** to see your current settings,
and how the envelope domain should be configured. [Learn how the SPF
should be further configured if you use your own envelope
domain](https://www.copernica.com/en/support/envelope-address-mx-record-settings-and-spf).

#### Sender ID is not correctly configured

Sender ID is an email authentication method derived from the SPF.
However, the Sender ID is configured in the DNS of the domain that is
used as the 'from' address. Check whether the Sender ID settings are
correct on this domain.

[Learn how you can use Sender ID for your
mailings](https://www.copernica.com/en/support/setup-sender-id)

Blacklists
----------

#### The IP address has been blacklisted.

The IP address that is used to send your mailings can be blacklisted.
Spam filters and ISPs can block an IP (or an entire IP-range) when they
suspect that the IP address is used to send spam messages. This can be
rightfully or not. Nonetheless, it may not be your fault anyway, because
you share your IP address with other users of Copernica. If your IP is
blacklisted, we don’t expect any action from you. We are automatically
notified if one of our IP addresses has been blacklisted. Subsequently
we will contact the concerned party to get us removed from their list.
Blacklisted IP addresses will be put in quarantine and replaced by clean
IP's.

DKIM Check
----------

#### **We check whether a DKIM key is configured correctly**

DKIM (DomainKeys Identified Mail) is a method used by large ESPs (Email
service providers) to verify that you are responsible for a message, and
not Copernica BV.

If you get a warning about a wrongly set DKIM, please read the article
about DKIM. The software also provides a DKIM validation tool, which
will definitely help you set up the DKIM. You find this validator under
*Emailings \> Extra \>***DKIM keys**.

[Read how you set up DKIM for your
emailings](https://www.copernica.com/en/support/signing-your-emails-with-dkim)

If you cannot resolve this issue immediately, but you still want to send
the mailing, it is advised to entirely remove the DKIM.

This is done in the same dialog as mentioned earlier. Our rule of thumb
is: better send without DKIM, rather than using a faulty one.

Server settings check
---------------------

Please note that you need to be an application admin to be able to
configure the delivery and server settings in Copernica, and you may
also need access to the control panel of your domain.

Most of these settings apply only to users of the software that use
their own envelope (bounce) domain.

[More information on how you should configure your DNS with a custom
envelope
domain](https://www.copernica.com/en/support/envelope-address-mx-record-settings-and-spf)

#### MX record does not refer to a host that refers to the correct IP address.

You are using your own envelope domain, however, the MX records do not
point to the correct location.

The IP address that should be used is listed in the software. The
settings for the MX record can be found under *Admin \> Account \>
Delivery Settings \>* tab **Envelope domain**

#### The MX record does not refer to a host that refers to the IP address of the application

You are using your own envelope domain, however, the MX records do not
point to the correct location. The settings for the MX record can be
found under *Admin \> Account \> Delivery Settings \>* tab **Envelope
domain**

Here you will also find the correct location where it should point to.

#### The sender IP is not listed in the SPF record on your domain

You have configured an SPF record on your (envelope) domain, however,
Copernica's IP is not included. The IP address that should be used is
listed in the software. The settings for the MX record can be found
under *Admin \> Account \> Delivery Settings \>*tab **Envelope domain**

Tip: you can also see and edit your Envelope domain settings on
Copernica.com.

Go to your Dashboard, select your account (marketing environment), and
then go to the delivery settings (in the left panel).

#### SPF record has syntax error

Please check whether the SPF record contains typing errors. You may also
try to add or remove the quotes surrounding the record to avoid auto
escaping of special characters by the DNS provider.

#### **SPF check resulted in a temporary DNS error**

The DNS is temporarily not available. We cannot check the SPF. Please
try again later. If the problem persists, contact your hosting provider.

#### There is no SPF record for the domain

If you use your own envelope domain, you must include Copernica in the
SPF record. It's a setting in the DNS to prevent your emails getting
marked as spam. [Click here for more
info](https://www.copernica.com/en/support/envelope-address-mx-record-settings-and-spf).

#### **Pic-register domain settings are not correct**

The pic-register domain is responsible for recording clicks and
impressions, and hosting the images used in your emailings.

You see this message when your pic-register domain is not correctly
configured. As a result, no impressions can be recorded and images used
in your email document will not work. You can edit the pic-register
domain settings under *Admin \> Account \> Delivery Settings \>*tab
**Pic-register domain**. The application offers various pic-register
domains that you can choose as the default pic-register domain.

Spam score check
----------------

#### **We check whether the document has a high spam score**

It is advised to lower your spam score as much as possible. A spam score
lower than 1 is quite simple to accomplish. If your spam score is higher
than 3, we highly recommend to improve the document first. A spam score
higher than 5 will prevent you from sending the document. In this case,
you must first improve the content of your document. To see the results
of the spam check of your document, click on the warnings button in the
lower toolbar of the active document.

[This article provides some useful tips to help you lowering the spam
score.](https://www.copernica.com/en/support/some-tips-to-lower-your-email-spam-score)

Destination check
-----------------

#### **The target of the mailing**

It has happened too often that users sent their mass mailing to the
entire database, instead of the newsletter selection. Result, many
complaints from recipients who had received the email, while they never
registered for it or already unsubscribed. It is not forbidden to send a
mailing to a database or collection, as long as you make sure that
unsubscribes are immediately removed from the database (and thus no
longer receive future e-mails).

#### **No Unsubscribe behaviour has been set**

When you use the `{unsubscribe}` tag in your email template/document to
offer an unsubscribe link, then you also need to set the unsubscribe
behaviour for the target database or collection. This behaviour is
executed once the recipient has clicked on the unsubscribe link in your
email. For example, you can set that the value from the field
‘*Newsletter*’ is changed to ’*No*’.

Even if you use a different method to process unsubscribes (e.g.,
through an unsubscribe web form) we still advise you to set the
unsubscribe behaviour because it's also triggered when a subscriber
marks your email as spam.

To set the unsubscribe behaviour: *Go to Profiles \> Database management
\>* [Set unsubscribe
options…](https://www.copernica.com/en/support/setting-unsubscribe-behaviour-for-your-database-or-collection)

#### **Unsubscribe header not activated**

The list-unsubscribe header is a hidden line that can be sent with
e-mailings and that holds a link and/or an e-mail address that can be
notified when a user wants to unsubscribe from a mailing list. When this
header is present in e-mails, e-mail clients can show a link or button
to their users to unsubscribe from the mailing. This makes it easier for
them to unsubscribe, and it is less likely that mails get trapped in
spam filters.

The unsubscribe header can be activated right above the document or
template that you are editing.

[Read more about email
headers](Read%20more%20about%20email%20headers%20in%20Copernica)

Check on the content of your document
-------------------------------------

#### Unsupported content has been detected in your document

Usage of unsupported techniques in your emailings such as JavaScript is
highly discouraged. When creating an email template or document, you
should take into account that the email is very likely to be opened with
email clients, applications and devices that have (unlike modern web
browsers) very limited support for common techniques, such as frames,
iframes, flash, video, audio, html forms. Including these techniques
will make your document more vunerable for spam filters, apart from the
fact that recipients will see an email with broken functions.

#### **No text version**

Email clients and spam filters check if your HTML email also has a plain
text alternative. We therefore recommend to always send a text version
along with the HTML document. You can configure the text version in the
so-called tab, which is found directly above the active template of
document.

[Including a text version to your template or
document](https://www.copernica.com/en/support/add-email-text-version)

#### Document size checks

Keep your document as small as possible. If your document exceeds the
300kb, please resize or compress images with photo editing software
before uploading them to the template or document.

Images used in an image block can also be cropped and / or resized in
Copernica. You will find these features at the image block (two seperate
tabs).

#### The total size of the attachments is too big

Sending large attachments in large emailings will slow down the delivery
of your emails, overload our servers and may cause annoyance by the
recipients of the email (especially when they open your email on a
mobile device). We highly discourage sending attachments with your
email. Alternatively refer to an online download location. This way you
can also keep track on who downloaded the file and who didn’t. The total
size of your attachments is limited to 150 kb per destination in a
mailing with more than 100 destinations.
