## Setup a Sender ID on your domain

Sender ID is a method major Internet service providers (ISPs), 
such as Microsoft, Yahoo and Google use to confirm whether emails 
are actually coming from the company they say they are coming from. 
This is accomplished by checking the address of the server sending 
the mail against a registered list of servers that the domain owner 
has authorized to send e-mail. It is one of the many methods email 
clients use to distinguish spam from not spam.

> Setting up a Sender ID requires access to your domain DNS settings. 
If you use the from address *info@mydomain.com* for your email, 
you need access to the DNS settings of mydomain.com.

If you utilise SPF for a domain you would like to send mail
through SMTPeter, you should include the SMTPeter
IP-addresses to make sure the mail is not regarded as spam.

To make this easier (and since the IP-addresses that SMTPeter
sends from can change), we have set up a SPF record that can
be included, so you automatically keep the latest - and correct -
version.

To include all the SMTPeter IP-addresses, add the following
TXT - and if possible SPF - record on your domain.

` "v=spf1 include:_senderspf.smtpeter.com a mx ~all" `

Of course, you can also allow your own IP addresses. For more
information, view the [OpenSPF website](http://www.openspf.org/).
