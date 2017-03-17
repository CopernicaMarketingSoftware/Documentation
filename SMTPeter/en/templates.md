# Template support

SMTPeter comes with a full blown drag-and-drop editor to manage email 
templates. If you use this tool to create such templates, you do not have to
pass full messages to the SMTPeter API, but you can pass a single template ID 
instead. SMTPeter will create a personalized message based on the template 
and send it to the recipient.

This feature allows you to not only use SMTPeter as an email gateway, but
also as a centralized template store. Templates can be created
and modified using the drag-and-drop editor in SMTPeter's dashboard, and
via the REST API. The REST API has a range of methods to create, edit and 
modify templates, and to send messages based on these templates.

The templating feature if of course optional. If you want to use SMTPeter pure
for its forwarding features, you can of course send your own messages through
SMTPeter.


## Responsive email and JSON

SMTPeter's templates are internally stored as JSON objects. Inside these
JSON objects all sorts of properties define the layout of the mail and
the texts, images and other content that should appear in the messages. 

The drag-and-drop editor is a convenient tool that can be used to edit these 
templates. However, if you want to access the internal JSON data directly,
you can do too. The full specification of the JSON format can be found
on the [ResponsiveEmail.com website](https://www.responsiveemail.com).

When a message is sent that is based on a template, SMTPeter converts the 
JSON data into a fullblown MIME message that is sent to the recipient. The
generated MIME message is responsive, meaning that it displays well on 
various devices and screen sizes, and that the layout changes based on the
size of the screen on which the message is read.

