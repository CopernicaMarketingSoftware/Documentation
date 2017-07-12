# Follow-ups: Types

There are several different types of followups to use in your campaign. 
We'll discuss several causes as well as actions to help you create useful 
followups. All of these followups can be used in the [Publisher](./follow-up-manager-publisher), 
[Marketing Suite](./follow-up-manager-ms) and [follow-up scripting](./followups-scripting).

## Causes

The cause is the event that triggers the action. You can add a delay 
to specify the time between the trigger and the execution of the action. 
If the delay is set to 0 minutes the action is executed immediately after 
being triggered.

### A profile has been created/A new profile or subprofile was created

This cause can be added to a database or webform. You can add an extra 
check for the value of selected fields against a specified value, but this 
is optional. You can use this to welcome new customers for example.

### A profile has been modified

This cause can be added to a database. You can add an extra 
check for the value of selected fields against a specified value, but this 
is optional. You can, for example, use this to notify the profile that 
the change was successful.

### The sending of the document

This cause can be added to a document. When this document is sent the 
action is triggered. You can use this to send mails that follow up on 
the subject matter in the current document, for example.

### The registration of an impression

This cause can be added to a document. When this document is opened the 
action is triggered. You can use this to update a profile to reflect that 
they have received this information, for example.

### The registration of a click

This cause can be added to a document. You have to add a specific link to 
use this, which can trigger an action upon being clicked. A way to use 
this would be to register which articles a customer is interested in based 
on which links they click.

### The registration of an error

This cause can be added to a document. You have the option to select a 
specific error or use all errors. Errors can be fatal to your reputation 
as a sender, so it's wise to save these errors to their corresponding profile 
and make selections of only people who actually receive your emails.

### The survey has been sent/The form has been submitted

This cause can be added to a survey or webform. You can use this to send 
a "Thank You" mail to users who have completed the survey, for example.

### A specific answer is given

This cause can be added to a survey. You can select a question and an 
answer to link the action to. If you have a question regarding an interest, 
for example, you can immediately send an email informing them about this 
interest.

### A profile or subprofile was found

This cause can be added to a webform. You can use it to check whether 
the form was completed by someone from your database. You can also add 
an extra check to see if the interests or fields in the profile contain 
a certain value. You can use this, for example, to save profile data 
based on the fields or the completion of the form.

## Actions

The cause triggers the action, or what happens after the trigger. 
Some actions allow documents to be mailed to a set destination. This is 
useful for testing or informing yourself, but please note that the 
amount of messages can quickly overflow your inbox.

### Send a formatted document by e-mail

This action sends a document to the profile that triggered the action 
or a set destination. You can choose in the settings what you send along, 
what is registered and how the mailing is saved.

### Send a drag and drop template by e-mail

This action send a drag and drop template. You can choose the template, 
sender name, sender address and the subject. You can send the template 
to the profile that triggered the action or to a set destination.

### Send a formatted document by fax

This action sends a PDF document by fax. You can specify the document and 
send it to the profile that triggered the action or a set destination. 
In "Settings" you can choose whether or not it is a test mailing and 
whether errors are registered.

### Send a formatted document to mobile device

This actions sends a mobile message to the profile that triggered the action 
or to a set destination. In "Settings" you can enable and disable personalization, 
choose whether or not to split longer messages en whether the message should 
be sent as a test mailing.

### Send a text e-mail

This action sends a textual e-mail message to the profile that triggered 
the action or to a set destination. You can add the sender name, sender addresss, 
the subject and the message itself.

### Send text message

This action send a mobile message to the profile that triggered the action 
or to a set destination. You can specify the phone number, write the message 
and choose whether or not to split a long message.

### Contact the addressee

This action can be used to create a task for the adressee. You can 
set the priority, the type and which colleague should execute the task. 
This can be used to tell your colleagues to call someone about the 
cause.

### Change (sub)profile data

This action can be used to update one or more fields of a (sub)profile. 

### Remove data of addressee

This action deletes all the data available about the profile triggering 
the action. This is permanent, so please be careful when deleting this 
data.

## More information

* [Followups](./followups)
* [Follow-Up Manager Publisher](./follow-up-manager-publisher)
* [Follow-Up Manager Marketing Suite](./follow-up-manager-ms)
* [Followup conditions](./conditions-for-follow-ups)
