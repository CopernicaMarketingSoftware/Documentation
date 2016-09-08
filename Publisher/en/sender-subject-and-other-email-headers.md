The e-mail header is the information that is sent with every e-mail,
containing details about the sender, route and receiver. Most of this
information is not visible to recipients. The most common email headers
are the sender address, sender name and the email subject line

You can enter the header information directly above the template or
document. Smarty personalization is allowed in all headers.

![](../images/edit-email-headers.png "Documentation/edit-email-headers.png")

The most common and known headers are:
--------------------------------------

**The sender name and address (From name or address)**\
 This is the name and the address that is visible to your subscribers as
the sender of the e-mail. In some accounts the Sender is set by the
Admin to only allow certain addresses. In that case you will see a list
to choose from.

**The e-mail subject**
A brief summary of the topic of the message. You are of course
completely free to use whatever you want as the subject line. The
subject has a 255 character maximum. However the advice is to stick
around 45 characters for best visibility in the e-mail inbox (short and
catchy). If you use personalization in the subject, make sure it does
not exceed the character limit.

**The reply-to address**
Optional. All replies to your email will go to this address. Use this
header if you want to receive email replies on a different address than
the 'from' address.

**The blind carbon copy (often abbreviated Bcc:)**
This will send a copy of the email to the specified email address. The
BCC address remains invisible to your subscribers. Be careful with using
a BCC in your email campaign: for each destination your e-mail document
is sent to, a copy will be sent to the BCC address.

**The priority header**
Some email clients (e.g., Outlook) can show a priority indicator - a
small flag - next to emails. This can be activated by including a
priority header in the mail. Do not use a priority header if not
absolutely needed. Using a high priority flag may cause annoyance to
your subscribers and e-mail clients and spam filters may indicate
e-mails with priority headers as spam. Rather use a catchy subject line
to draw attention.

**X-mailer -**
The X-Mailer mail header field is used to describe the
software used in sending the e-mail. If you send an email using the
marketing software, you can add an X-Mailer header in your outgoing
email that indicates that you sent it, or something totally different
(e.g., outlook).

**List-unsubscribe headers**
The list-unsubscribe header is used to enable an Unsubscribe button in
Windows Live and Outlook.com which replaces the spam button. If history
is any guide, we'll see a similar feature in other email programs soon.
Including the List-Unsubscribe header in your emails will reduce spam
complaints, improve deliverability and improve the experience for your
subscribers. 

Activating this header is also necessary to make the {unsubscribe} link
work. Therefore, this header is activated by default. 

Read more about adding the list unsubscribe header and the necessary
unsubscribe options that should be set on the target database or
collection.

![unsubscribe header](../images/unsubscribe.png)

set the priority header. To the right of it a similar menu to configure
the unsubscribe header.

### **Custom headers**

You may also add custom headers to your mailing

### Headers and smarty personalization

Smarty personalization can be used in all of the headers summarized
above.
