# Followups using javascript

If you're writing the HTML code of your mailings yourself, you can add a piece
of javascript to each hyperlink. This javascript is executed by Copernica
when the link is clicked. This works more or less the same as the "onclick" 
attribute that you are probably already familiar with, with one big difference: 
the "onclick" script is executed on the client, while this script runs on
the Copernica servers.

There are a couple of ways how you can attach a script to hyperlinks:

* using the *data-script* attribute on &lt;a&gt; tags
* if you use the drag-and-drop editor in the follow-up form


## Available objects

Inside the script you can make use of a couple of global variables that identify 
the (sub)profile that clicked on the link, and other data that is relevant for 
the click. Each of these objects have readonly properties to get data, and some
writable properties to change them as well. The following variables are accessible:

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

The above example is a very simple one. The data-script is executed when the
link is clicked.

Before an email is delivered, the data-script is removed from the original code. Your
receivers therefore do not get to see the script when they open the source code of
the message. However, the script stays active because Copernica has stored the
script and runs it when a click is registered.
