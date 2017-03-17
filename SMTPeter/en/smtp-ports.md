# SMTP hostname and port numbers

The SMTP API is accessible through the "mail.smtpeter.com" domain name.
All mails must be submitted using secure connections using STARTTLS encryption.
Alternatively, you can make use of port 587. There is no difference in how
we handle port 25 versus port 587.

````
Host:       mail.smtpeter.com
Port:       25, 587, 2525
Encryption: STARTTLS
````

Only authenticated and encrypted connections using "STARTTLS" are supported.
Non-authenticed emails and messages that are not sent over a secure connection 
are rejected.

Note that we can reject mail during the "RCPT TO" phase of the SMTP
protocol, or until after you've sent all message data. Sometimes we process 
the entire mail message to find out who is trying to abuse our systems,
and reject the mail only after we've seen the full message.

## What is the difference between port 25, 587, and 2525?

You can use port 25, 587, and 2525 to send mail to SMTPeter. There is no
difference between these ports. We have opened ports 587 and 2525 because some 
providers block access to port 25. Port 2525 is especially useful for Google
Cloud users since Google Cloud does neither support 25 nor 587.


## Port 465

As an alternative to ports 25 and 587, you can also connect to port 465.
This opens up a TCP connection in a secure state right away, and skips
the STARTTLS handshake. Although sending mail over port 465 was never
standardized and is even deprecated in favor of the STARTTLS encryption
(in fact, port 465 has even been reassigned to a new service), communication
over port 465 is faster because the STARTTLS handshake is skipped. It
is also more secure because it is impossible to intercept the "EHLO/HELO"
handshake.

````
Host:       mail.smtpeter.com
Port:       465
Encryption: SMTPS
````

