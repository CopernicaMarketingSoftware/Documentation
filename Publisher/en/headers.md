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

You can also use the *list unsubscribe* header. This is used to display 
the unsubscribe link right on the top of the email in some email clients. 
We recommend always using at least an unsubscribe link. This will help your 
[sender reputation](./sender-reputation) and you can 
[set unsubscribe behaviour](./database-unsubscribe-behavior) yourself. 

## More information

* [Templates](./templates)
* [Templates in Marketing Suite](./templates-marketing-suite)
* [Templates in Publisher](./templates-publisher)
* [Tips, tricks and background](./tips-and-tricks)
