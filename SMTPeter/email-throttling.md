# Email throttling

Mail that you send via SMTPeter is preprocessed and then forwarded to the
actual recipient. This normally happens in the blink of an eye, and
the mail passes through SMTPeter in a fraction of a second.

However, sometimes SMTPeter deliberately delays your mail a little. If 
you send too many emails in too little time, receiving email clients might
block your address. 
SMTPeter prevents this. The big email receivers (Google, Microsoft, Yahoo,
et cetera) use special algorithms to detect strange behavior from senders. 
If such an algorithm notices that someone starts sending large volumes 
of email, they block further deliveries because this unexpected behavior
could just as well be a sign that a computer has been hijacked and 
that someone started sending spam from it.

For SMTPeter however, it is completely normal to send large volumes of 
email. Email receivers do not find it strange if they see large volumes
of email coming from us: there is nothing unusual about it. And on top 
of that, SMTPeter has special throttling algorithms to ensure that mail is always 
delivered at a steady rate. We know of each receiver how many emails 
they can process. If you send mail to SMTPeter at a higher rate than
the receiver can process, we use internal buffers to delay your
message a little.

