# DMARC

DMARC (Domain-based Message Authentication, Reporting and Conformance) is a
technology that is used to prevent email abuse, like phishing and spam. To get
a good understanding of DMARC it is best to look at email from the eyes of
a professional email receiver. Imagine that you were Gmail, Hotmail or Yahoo,
how would you handle incoming email?

Before DMARC was invented, we had two important technologies to identify email:
[SPF](spf) and [DKIM](dkim). SPF allows you, receiver, to check whether the 
email was sent from an expected IP address. DKIM can be used, to put it simply, 
to check whether the message was indeed written by the claimed sender. Receivers 
can check every incoming with these two technologies: was the message indeed 
sent from an IP address that belongs to the company that claims to send the 
message (and not by an obscure IP address from someone else), and was the 
message indeed written by the claimed sender (and not by someone else)? It is
of course best if the message passes both of these tests.

Passing both tests is preferred, but if only one of the tests succeeds receivers 
normally consider messages valid too.
For example if a message does have a valid DKIM signature, but came from
an unexpected IP address. This happens if a mail was forwarded or retransmitted.
In such a scenario the DKIM signature stays valid, but the sending IP is 
different. Because of the valid signature however, a receiver still knows for 
sure that the message came from the claimed sender, and will accept the message.

Things get complex if both checks fail: the IP address from which the
message came in does not match SPF, and the message has no or an invalid DKIM 
signature. Should a receiver treat this as an abuse message, because someone
appears to be sending out of someone else's name? Or is this still a legitimate 
message that was just written by someone who had not set up the correct DKIM 
and SPF records? Should such a message be rejected or thrown away (because it's 
abuse), or should it be placed in the inbox (because it came from grandma who
did not understand SPF and DKIM)? It's a big challenge for receivers to make
this choice. Customers do not appreciate it when legitimate messages are thrown away.

For receivers it would be so helpful if they somehow could get in contact with the sender
when an invalid message comes in. "Hey, I just got a message from one of
your employees, but SPF and DKIM are wrong. Is this because of a mistake on
your side? What do you want me to do with this wrong message? Put it in
the inbox anyway? Or should I get rid of it?" This is, in a nutshell, exactly
what DMARC does. DMARC allows a receiver to run a DNS query to
find out the answers to the above questions, and to notify senders when they
get messages that do not pass the SPF or DKIM checks.


## DMARC and DNS

DMARC makes use of DNS and email. As a domain owner you can add a DMARC record 
to your DNS settings, and inside this record you can specify how you
would like receivers to handle messages that do not match DKIM and SPF. Do 
you want receivers to throw these messages away, or should they be placed in
the inbox anyway? Or do you want receivers to quarantine the messages and put
them in a special folder (like the junk folder). It even is possible to
include a percentage in your settings: 10% of the non-matching messages should
be thrown away, while the other 90% should be accepted.

Of course, in reality the settings in your DMARC record are mainly guidelines 
for receivers. A receiver can decide to ignore the settings, and handle your mail
differently than you have specified.

Besided the delivery policy and the percentage, you can also add email addresses 
to your DMARC record. Receivers use this address to notify you when they get 
invalid messages. This could be an indication that your domain
name is being abused, or that one of your employees does not have its settings
up to date or that one of your servers is not set up correctly. If you include
your own email address in the DMARC record, you will suddenly start to receive
these notifications and reports.

Copernica's [sender domain technology](sender-domains) takes all the complicated
DNS settings out of your hands, including setting up the DMARC records. If
you configure a sender domain, you can also let Copernica take care of handling 
the DMARC reports that are sent back. All these reports are logged and displayed
in fancy charts and tables on the Marketing Suite dashboard.


## Main domain vs subdomain

When you setup a sender domain, you have to decide whether you are going to
send out your mailings from your main domain (@yourcompany.com) or from a 
subdomain (like @newsletter.yourcompany.com). Using a (new) subdomain is easier, 
because you then do not have to take care of possible conflicts with existing 
DMARC settings for the mail stream from your main domain. If you use a subdomain, 
Copernica sets up a DMARC record that only applies to the messages sent from 
that subdomain. You can safely create a CNAME alias from your own DNS records
to this DMARC record on our servers.

If you want to send out mailings from your main domain, a little extra care 
is needed. The DMARC record that Copernica creates will then hold the settings 
for *all* mail that is sent from out of your domain. This includes the mail
that you send with Copernica, but also your regular mail stream from out of 
your office or from the mobile devices of you and your colleagues. If you 
instruct Copernica to use a very strict setting, this strict setting will
also apply to your regular mail, and might harm the deliverability.


## Using the main domain

If you want to use your main domain (@yourcompany.com) for your mailings and
set up a sender domain, Copernica will automatically create a DMARC record.
The list of recommended DNS settings in the Marketing Suite contains a CNAME
record that points to this DMARC record on our server. You can copy this
recommendation, and install it in your own DNS server. But watch out! Your
domain may already have a DMARC record, which makes it pointless to add a
CNAME record with the same name. In that case you can do two things: you could 
throw away your current DMARC record and replace it with the CNAME, or you
could ignore the recommendation, and keep your current DMARC record.

If you choose to create the CNAME record (and remove your current DMARC record),
you can use the Copernica dashboard to change your DMARC policy. All DMARC reports
will be collected and analyzed by Copernica and are accessible via the
dashboard. You can also use our DMARC analyzer to inspect the reports.

When you configure your sender domain, you can set the DMARC policy and
deployment percentage. We advise to initially use a very friendly policy: accept
all mail. By being tolerant, you prevent that a simple configuration mistake
will get your email blocked. After a couple of days, and when you see that
the DMARC analyzer tool in the dashboard does not report any issues, you can
slowly grow to a stricter policy.

If you choose to take care of hosting your own DMARD record (instead of setting
up a CNAME to Copernica's servers), the settings in the dashboard have no
effect. You must then set the policy and percentage manually in your DMARC
record. But if you still want Copernica to process your DMARC reports, you
can achieve this by adding the following statement to your DMARC record:

    rua=mailto:dmarc@smtpeter.com
    
By adding this to your DMARC record, you tell receivers that DMARC reports
are to be sent to Copernica. De smtpeter.com is a domain managed by Copernica.


## What is the best DMARC policy?

Many customers ask our advise in choosing the right DMARC policy. This is not
a simple question to answer, and it very much depends on the nature of your
organization. Are you looking for the best possible setting to prevent that
others can send out of your name? Or are you looking for a setting so that
your messages end up with as many receivers as possible? Are you idealistic
and do you want to make the internet a safer place? Or are you more pragmatic?

Copernica is a member of M3AAWG. This is an organisation that fights all sort
of internet messaging abuse. The general consensus over there is that the sooner
everyone is on the most strict DMARC setting (p=reject), the better it is. Some 
of the visitors even walk around in p=reject t-shirts. In practice life is 
however not that simple. For organisations that are very vulnerable for fishing
(like financial organisations, banks) it of course is recommended to switch
to p=reject. But this it not so crucial for other types of organisations. Many
big M3AAWG members still use the tolerant setting.

Our advise therefore normally is: roll out DMARC, but do it slowly. Start with
the most tolerant setting: all mail should be placed in the inbox. You can
then use the DMARC analyzer on the dashboard to monitor the incoming reports.
Is all your mail valid, or are errors reported? And what causes these errors? If
they are a result of wrong settings on your side, you can update these settings.
If the analyzer tells you that your domain is being abused, you can switch to
a very strict that prevents this abuse. If however all is ok (no errors but also
no indication of abuse) you are faces with a business decission: is the 
tolerant setting acceptible for you or do you want to move to a stricter setting.
A strict setting (p=reject) makes it much harder for others to abuse your mail,
but also more likely that you messages accidentally can not be delivered.
