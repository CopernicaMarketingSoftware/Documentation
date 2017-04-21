# Followups using javascript

If you're writing the HTML code of your mailings yourself, you can add a piece
of javascript to each hyperlink. This javascript is executed by Copernica
when the link is clicked. This works more or less the same as the "onclick" 
attribute that you are probably already familiar with, with one big difference: 
the "onclick" script is executed on the client, while this script runs on
the Copernica servers.

There are a couple of ways how you can attach a script to hyperlinks:

* using the *data-script* attribute on &lt;a&gt; tags
* using the drag-and-drop editor in the follow-up form

## Available objects

Inside the script you can make use of a couple of global variables that identify 
the (sub)profile that clicked on the link and other data that is relevant for 
the click. Each of these objects have readonly properties to get data and some
writable properties to change them as well. The following variables are accessible:

| Variable name                                         | Description
|-------------------------------------------------------|--------------------------------------|
| [**copernica**](./followups-scripting-copernica)      | Copernica account                    |
| [**mailing**](./followups-scripting-mailing)          | Previous mailing                     |
| [**message**](./followups-scripting-message)          | Personalized template                |
| [**template**](./followups-scripting-template)        | Standard template                    |
| [**database**](./followups-scripting-database)        | Database                             |
| [**collection**](./followups-scripting-collection)    | Collection (subset of database)      |
| [**profile**](./followups-scripting-profile)          | Profile                              |
| [**subprofile**](./followups-scripting-subprofile)    | Subprofile (profile from collection) |
| [**destination**](./followups-scripting-destination)  | Alias to profile/subprofile          |

A few of these objects also have [the data object](./followups-scripting-data), 
which you can use to store your own information regarding the object.

## A very simple example

A possibility of the data-script object is to change a profile when a link 
is clicked. This can be used to place an unsubscribe link that when clicked 
sets a profile setting such that no more newsletters are send. To place a 
link like this you can use the following code:
<a href="http://www.example.com" data-script="profile.fields.newsletter = 'no';">Click here to unsubscribe</a>

While the example above is very simple you can write a lot more complicated 
data-scripts. This data-script is executed when the link is clicked and 
sets the profile field "newsletter" to "no". Now the user will be in the system, 
but not receive any newsletters.

Before an email is delivered, the data-script is removed from the original code. Your
receivers therefore do not get to see the script when they open the source code of
the message. However, the script stays active because Copernica has stored the
script and runs it when a click is registered.

## More information

* [Followups general](./followups)
