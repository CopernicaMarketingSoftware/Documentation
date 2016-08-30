Emailings sent with the application have two distinct sender addresses:
the 'from' address and the envelope address.\
 The 'from' address is the address visible to your recipients as the
sender of the email. This is also the address that is used when someone
clicks on 'reply' in his or her email program. The 'from' address can be
set per document, or even per message in a mass mailing (if smarty
personalization is used in the 'from' field). To identify yourself as
the real sender, Sender ID can be configured for this domain.

The envelope domain is the address has a more technical meaning and is
not visible to recipients. If an email cannot be delivered, an error
message (bounce) is sent to the envelope address.

The application uses a default evelope domain. However, you may want to
use your own domain, for instance if you do not want to be affiliated
with a different company or the marketing software. Configuring the
envelope domain is done in the **delivery settings dialog**, which can
be found under \*Admin \> Account \> Delivery Settings \>\***tab
Envelope domain**.

You need to be an application admin to alter these settings.

If you enter the domain *example.companyname.com*, each message sent
with the application will be sent with a envelope address ending with
*@example.companyname.com*. Emails that cannot be delivered will be
bounced to this very address.

### DNS Settings for the envelope domain

Of course you do not want to be bothered with those error messages, and
let the application take care of these, so that they can be registered
in the statistics. To do so, you need to create an MX record on the
envelope domain, pointing to the application. The following record will
do:

example.companyname.com 86400 IN MX 0 receive.vicinity.nl

In this way it is ensured that all email sent to
*...@example.companyname.com* is recieved and processed by the marketing
software.

Please take note of the following when configuring the DNS
for the envelope domain: the email protocol that does allow you to use a
CNAME record for the envelope domain. Use an A record instead.

### SPF (Sender Policy Framework) {#spf-(sender-policy-framework)}

To optimize the delivery, it is advised to create an SPF record for the
envelope domain as well. An SPF record is a setting in the DNS to
prevent email spam by verifying the IP addresses used by the application
to send your messages. The SPF must therefore include these IP
addresses.

In normal practice the following SPF record will do the job:

example.companyname.com 86400 IN TXT "v=spf1 include:\_spf.vicinity.nl
-all"

Note: some DNS control panels require you to add the double quotes in
the TXT record, others don't. Please refer to the documentation provided
by your DNS host for more information.

This SPF record indicates that example.companyname.com should use the
same SPF as spf.vicinity.nl. This second SPF contains a list with all
the IP addresses used by the mailsender of the application.

Note that it may take up to 24 hours for DNS servers to synchonize
worldwide. It is not advised to send any mass mailings during this
period.
