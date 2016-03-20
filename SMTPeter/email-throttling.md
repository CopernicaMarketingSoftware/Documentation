# Email throttling

Mail that you send via SMTPeter is preprocessed and forwarded to the
actual recipient. This normally happens in the blink of an eye, and
the mail passes through SMTPeter in a fraction of a second.

However, sometimes we delay your mail a little. If 
you send too much email in too little time, your address might get blocked.
SMTPeter prevents this. The big email receivers (Google, Microsoft, Yahoo,
et cetera) use special algorithms to detect strange behavior from senders. 
If such an algorithm notices that someone starts sending large volumes 
of email, they block further deliveries because this unexpected behavior
could just as well be a sign that a computer has been hijacked and 
that someone started sending spam from it.

For SMTPeter however, it is completely normal to send large volumes of 
email. Email receivers do not find it strange if they see large volumes
of email coming from us: there is nothing unusual about it. And on top 
of that, we have special throttling algorithms so that mail is always 
delivered at a steady rate. We know for each receiver how many emails 
can be processed, and if you send mail to SMTPeter at a higher rate than
the receiver can process, we use internal buffers to delay your
message a little.

