It is advisable to set a DKIM record for your account. DKIM is Domain
Key Identified Mail, a method for e-mail authentication that allows you
to take responsibility for a message in a way that can be validated by a
recipient. In other words, it allows the mail recipient to see that the
message comes from you and not from us. Amongst others, Yahoo and Gmail
check DKIM to filter out spam messages for their users.

Setting up DKIM keys requires domain access and system knowledge!

### Step 1. Generate the DKIM key

The DKIM key is created in the Publisher

-   Under E-mailings, go to \*Extra \> \***DKIM Keys**.
-   In the dialog window, choose **New DKIM key**.
-   **Enter your domain name** (*yourdomain.com*) in the domain field.
-   In the subdomain field **enter the name of the selector** which will
    hold the DKIM key later on, without the *.\_domainkey* part. In this
    example we use 'dkim' but you are completely free to use something
    else.
-   Choose the desired key strength. Note that large (e.g., 4096 bit)
    keys may not fit within a 512-byte DNS entry.
-   **Store**these settings.

Your key is now generated. The next step is to paste this key into the
TXT record subdomain. You may close the DKIM dialog. The key remains
available in the software.

![Enter the information](generatekey.png)

### Step 2. Paste the key into the TXT record on your subdomain

In step one, you have generated the key. The next step is to paste the
key into the TXT record on your subdomain.

-   Sign in to the administrator console provided by your domain
    provider.
-   Locate the page from which you can update the DNS records.
-   Create a TXT record with the name *dkim.\_domainkey*. This includes
    the underscore. Underscores are allowed in certain DNS entries and
    actually required to make the DKIM work.
-   Paste the key provided in the marketing software value into the TXT
    record.
-   Save your changes. Once the DNS has been updated, the DKIM key can
    be sent along with your e-mails. **This updating may take several
    hours.**

The marketing software provides an extended DKIM validator to see if the
DKIM is set up correctly. In the software, go to E-mailings \> Extra \>
DKIM keys to validate the DKIM. You will find the validator in the tab
DNS.

### Step 3. Validate the DKIM key

You have followed the first two steps precisely. Let’s validate if the
DKIM has been configured correctly and can be sent along with your
mailings.

-   Go to E-mailings \> Extra \> **DKIM keys.**
-   Select your DKIM record.
-   Click to the **DNS tab**.

Here you will find a list of checks and their results. If there are any
errors, solve them before you start sending mails signed with the DKIM.

**Warning:**Using a wrongly configured DKIM key may harm your sender
reputation.

### Step 4. Set up a DMARC record

The next step is to set up a [DMARC
record](https://www.dmarc.org "DMARC website"). DMARC is monitors if an
email is signed correctly with DKIM and also checks the SPF record. If
these authentications fail it will report this. This is an important
check and if it fails it can affect your deliverability.

-   Sign in to the administrator console provided by your domain
    provider.
-   Locate the page from which you can update the DNS records.
-   Create a TXT record with the name \_dmarc.yourdomain.com. (including
    the underscore) -Paste the following value into the TXT record:

    v=DMARC1;p=none

-   Under E-mailings, go to \*Extra \> \***DKIM Keys** and check the
    DKIM settings. **It can take several hours for it to update**

It is also possible to set the DMARC record to the following setting:

    v=DMARC1;p=reject

However, this means that all email messages from your domain that are
not signed with DKIM will be rejected by the receiving mail server. This
includes your Outlook or other mail clients emails. So unless you sign
all email message with DKIM, it is not recommended to set DMARC to
reject all non-signed messages.

Frequently asked questions
--------------------------

### My ISP claims that dots and underscores are not allowed in domain names

This is partly true. The use of dots and underscores are forbidden in A
and MX records only. There's no problem with using such characters in a
TXT record.

### Can I create multiple DKIMs under one domain?

Yes, selectors allows a domain to have more than one public key in the
DNS. The selector is the first part of the DKIM subdomain. You can for
instance have a *amsterdam*.\_domainkey.yourdomain.com key and a
*london*.\_domainkey.yourdomain.com key to distinguish between two
affiliates of your organization. If you send bulk mails from different
applications, it is highly recommended to use different DKIMs. 
