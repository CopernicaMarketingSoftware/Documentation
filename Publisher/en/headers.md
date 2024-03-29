# Headers

Headers are used to add information to an email. There are standardized 
headers such as "From" and "Subject", but you can also use so called "x-headers".

In Marketing Suite you can find all of these headers at the top 
of the Template Editor when creating an email. In Publisher you can find 
the headers at the top of the email when creating a new mailing under the 
**E-mailings** menu.

## BCC header

The BCC (Blind Carbon Copy) can be used to send copies of emails to one 
or multiple addresses, without showing the recipients the addresses of the 
others. This reduces the chances of addresses ending up in the hands of 
spammers, or receiving long chains of "Reply all" emails. Additionally it 
protects your users from viruses that spread by sending to other email 
adresses.

## X-headers

X-headers are additional headers that can be added next to the usual 
standardized headers such as the "From" address and the "Subject". The 
"X-" stands for eXperimental or eXtension. You can add your own values to 
add more information to the emails you send. You can name and use these 
X-headers however you want, for example to add the name of the selection 
and campaign to each email to use in your own statistics.

With Copernica you can also use Smarty [personalization](./personalization) 
in these headers. You can add a header named "X-PF-ID" for example 
and use it to store the ID of the profile from your own database for example, 
because you usually sync it to Copernica. You can then use this ID when 
your email bounces to look up the contact in your own database and contact 
them for the right email address.

## Unsubscribe

The list-unsubscribe header is additional information added to an email, 
containing instructions to display an unsubscribe button with the e-mail. When someone 
uses the button, a message goes back to Copernica so that the 
unsubscribe can be processed. This uses the set 
[unsubscribe-behavior](./database-unsubscribe-behavior) on the destination.

In the advanced headers of your template you will find the option 'Unsubscribe header'. 
This header is on by default because it is important for good 
[sender reputation](./sender-reputation). In addition, spam filters are positively 
affected if they see a list-unsubscribe header with your email, making it 
more easily pass your e-mail through to the inbox. It is a kind of guarantee that you are 
are a legitimate sender. And it makes it easier to monitor your reputation 
monitor for the watchdogs of e-mail traffic (Return Path, Lashback, Listbox
, et al).

The list-unsubscribe header is not a replacement for your own unsubscribe link in the
template or doument. 

## More information

* [Templates](./templates)
* [Templates in Marketing Suite](./templates-marketing-suite)
* [Templates in Publisher](./templates-publisher)
* [Tips, tricks and background](./tips-and-tricks)
