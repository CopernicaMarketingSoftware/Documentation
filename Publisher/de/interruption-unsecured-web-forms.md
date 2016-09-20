**Friday November 2, 4 PM (CET) - **Because of an erroneous setting, web
forms, that were filled in between 7 PM yesterday evening and 1 PM (CET)
this afternoon, were not processed by the application. This doesn’t
apply however to web forms that send information over secured https. \
\
**UPDATE: **This interruption also didn't apply to forms that were
created through the 'Content' tab in the application. Only other forms,
the ones that were generated through the form wizard in the 'Websites'
tab for example, that didn't send information over https were affected.\
\
**What happened?\
**Data that was sent between 7 PM yesterday evening and 1 PM (CET) this
afternoon, was not processed in the software. People that filled in a
webpage also weren’t redirected to a thank you page, but to the login
page of Copernica Marketing Software. \
\
**Did this problem occur with all web forms?\
**No. Users that send web form data over a secured https connection were
not impacted by this interruption.  Also, users that created their form
in the content tab in the application were not affected.\
\
**What caused this issue?\
**With the release of [version
12.43](http://www.copernica.com/en/about-us/news/coming-up-copernica-12-43),
Copernica switched from http to the[ secured
https](http://www.copernica.com/en/about-us/news/copernica-switches-to-https-and-advises-you-to-do-the-same).
The big difference between http and https is that https enables us to
send encrypted information and to keep this information from being
monitored or stolen by third parties. Before 12.43 a user had the choice
between using https and http. Now, we automatically redirect everyone to
https.\
\
Even when users set their web forms to send data over the unsecured
http, Copernica will now send it over https anyway. But because of an
erroneous setting in the application, these connections were not
redirected and the information entered in web forms was lost. \
\
**Was any already existing information lost? \
**No. All the information that was already in your database has been
kept, regardless if it was gathered over https or http. \
\
**How can I check if web form data is sent over https?\
**This requires some technical knowledge. You can check if web form data
is sent over https by opening a web form and check the HTML source
code. \
\
To do so, right click a web form in your web browser and select ‘View
source’. \
\
In the source code, search for the word form or action, until you find a
code like this:\
\
`<form name="subscribe" method="post" action="http://publisher.copernica.com/">`\
\
If you see an https address in the code, your form is sent over https
and this interruption had no effect on your forms.\
\
**Questions?\
**Need help with the above, or do you have any other questions about
this product update? Please don't hesitate to contact our support
department. 
