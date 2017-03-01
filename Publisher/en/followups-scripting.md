# Followups using javascript






All hyperlinks in a mailing support the *data-script* attribute. You can assign
a custom javascript to this attribute that is executed by Copernica when the
link is clicked. This script is more or less identical to a "onclick" attribute,
with one big difference: the "onclick" javascript is executed on the client,
while the script inside the "data-script" attribute runs on the Copernica servers.

## Available objects

Inside the script that you store inside the *data-script* attribute you can
make use of a couple of global variables that identify the (sub)profile that
clicked on the link, and other data that is relevant for the click. Each of
these objects have readonly properties to get data, and some writable properties
to change them as well. The following variables are accessible:

* [**copernica**](./followups-scripting-copernica.md)
* [**message**](./followups-scripting-message.md)
* [**mailing**](./followups-scripting-mailing.md)
* [**template**](./followups-scripting-template.md)
* [**profile**](./followups-scripting-profile.md)
* [**subprofile**](./followups-scripting-subprofile.md)
* [**destination**](./followups-scripting-destination.md)

## A very simple example

If you want to change a profile when a link is clicked, you can use the following code:

    <a href="http://www.example.com" data-script="profile.fields.newsletter = 'no';">click here to unsubscribe</a>

The above example is a very simple one. The data-script is executed with the v8
javascript engine that is also used by Google Chrome, so you can write very complex
scripts.

Before an email is delivered, the data-script is removed from the original code. Your
receivers therefore do not get to see the script when they open the source code of
the message. However, the script stays active because Copernica has stored the
script and runs it when a click is registered.
