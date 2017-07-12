# Management Console: Email throttling view

Setting up email throttling can be done in the MailerQ Management Console. 
All throttling settings can be adjusted in real-time, making it easy to 
improve your email delivery when needed. You can choose to set up 
throttling settings for a single domain for all IP addresses or for all 
IP addresses.

Read more about setting up global limits and other delivery settings in 
our [delivery throttling documentation](delivery-limits).

## Domain specific limits

To add domain-specific limits using the management console, all you have to do 
is go the the Email throttling view, and press the 'Add domain' button. Enter 
a domain name (e.g. `hotmail.com`) and press the 'Add domain' button again.
This will take you to a form where you can add limits for the domain. You can 
always remove or change throttling settings by clicking on the domain in the 
Email Throttling list. 

The Email Throttling form has the following options:

### Limits for the entire domain

* **Attempts per minute:** maximum number of messages sent to the domain per 
minute;
* **New connections per minute:** maximum number of newly created connections to 
the domain per minute;
* **Simultaneous SMTP connections:** maximum number of simultaneous SMTP 
connections to the domain.

### Limits per IP address

**Note:** these limits are per IP address on the RECEIVING domain. ISPs often have 
multiple IP addresses on which they receive email messages. These also have 
limits on the number of messages and connections they accept. 

* **Attempts per minute:** maximum number of message sent to an IP linked to 
the receiving domain per minute;
* **New connections per minute:** maximum number of new connections to an IP
linked to the receiving domain per minute;
* **Simultaneous SMTP connections:** maximum number of simultaneous connections 
to an IP linked to the receiving domain.

### Limits per active SMTP connection

* **Messages over a single connection:** maximum number of messages MailerQ 
will send over a connection before it is closed;
* **Seconds a connection may be idle:** maximum time a connection is kept 
idle. MailerQ can keep connections open whilst it is throttling deliveries. 
However, a connection is never kept open for a longer period than the set limit. 

### Memory limits

* **Maximum size of in-memory queue:** before MailerQ attempts to deliver an 
email they are loaded into MailerQ's memory; this setting ensures this queue 
doesn't grow indefinitely.

You can also insert these limits per domain and ip directly into your database. 
Our database access documentation shows exactly which tables and which fields 
and field types MailerQ creates.  
[Read more about database access](database-access).



# Flood patterns view

Flood patterns are rules that override the default throttling settings 
of MailerQ when the Mail Transfer Agent receives a specific error from a
receiving mail server.

Whilst email throttling can make sure you do not go over the limits set by 
receiving parties most of the time, they will not stop mail servers from 
greylisting you all of the time. However, when you do go over the limits, the 
receiving mail server often gives a specific response, such as "too many 
connections from your ip". MailerQ allows you to set Flood Patterns that 
activate when you get a specific response so you can temporarily pause or slow 
down your email delivery.


## Creating flood patterns

To set up a flood pattern you can either insert them directly into the 
[database](database-access) or add them using the management console. The 
database access documentation shows you all you need to know about which tables 
are available, to add them using the management console you have to go to the 
Flood Patterns tab and press 'Create new pattern'. This will take you to a form. 

The creation form has several fields you can set: 

### Name  

Here you can name your flood pattern. We recommend using a descriptive name to 
make it easy to recognize the pattern, like "Limit the number of messages per 
connection". 

### Pattern

Here you can add a pattern for MailerQ to check. If this pattern matches the 
answer that is received from a mail server, e.g. "Too many connections to this 
host". You can use three types of pattern matching methods:

* **Regular expression**: the input is treated as a [Perl-style regular expression](http://perldoc.perl.org/perlre.html); 
* **Wildcard:** In the pattern wildcards can be used similar to the ones used for file matching in the shell: 
For example:
    - Asterisk (`*`) matches everything: `*@mailerq.com` will match `foo@mailerq.com`, `bar@mailerq.com`, etc.;
    - Question mark (`?`) matches a single character: `mailerq.??` will match `mailerq.nl` and `mailerq.de` but not `mailerq.com`;
    - Brackets (`[]`) matches any character within the brackets: `[abc]` will match `a`, `b`, or `c` and `[!abc]` will match anything that isn't.
* **Substring:** The pattern must be a substring of the answer from the server: `'bar'` will match `'foobar'`.<!-- TODO does this require quotes? -->

### Pause Current sending 

The duration you want to pause the delivery to the domain. If you leave this 
blank or set it to 0, delivery will not be paused. 

### Reduced capacity duration

The duration of the reduced delivery. If this is set to 0 or left blank, it will 
not send with reduced capacity. You can set the reduced capacity in the reduced 
delivery capacity form. 

### Reduced delivery capacity

After matching a response and if you have set up reduced capacity, the delivery 
to the domain will be slowed for the duration as set in the duration and 
capacity settings. The reduced delivery capacity form is the same as the email 
throttling form we showed earlier. 
