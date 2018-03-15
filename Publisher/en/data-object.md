# Data scripting/Data object

If you're writing the HTML code of your mailings yourself, you can add a piece
of JavaScript (data-scripting) to each hyperlink. This JavaScript is executed 
by Copernica when the link is clicked. This works more or less the same as the 
"onclick" attribute that you are probably already familiar with.
However, there is one big difference: the "onclick" script is executed on the client, 
while this script runs on the Copernica servers. You only have to add the data-scripts 
to the hyperlinks via:

* the *data-script* attribute on &lt;a&gt; tags
* the flowchart editor in the follow-up form

Warning: You need the new link tracking system to use data-scripts. If you're using 
Marketing Suite this is already enabled, but Publisher users have to enable the system 
manually in their account settings.

## Available objects

Inside the script you can make use of a couple of global variables that identify 
the (sub)profile that clicked on the link and other data that is relevant for 
the click. Each of these objects have readonly properties to get data and some
writable properties to change them as well. The following variables are accessible:

| Variable name                                 | Description
|-----------------------------------------------|--------------------------------------|
| [**copernica**](./data-object-copernica)      | Copernica account                    |
| [**mailing**](./data-object-mailing)          | Previous mailing                     |
| [**message**](./data-object-message)          | Personalized template                |
| [**template**](./data-object-template)        | Standard template                    |
| [**database**](./data-object-database)        | Database                             |
| [**collection**](./data-object-collection)    | Collection                           |
| [**profile**](./data-object-profile)          | Profile                              |
| [**subprofile**](./data-object-subprofile)    | Subprofile                           |
| [**destination**](./data-object-destination)  | Alias to profile/subprofile          |

A few of these objects also have [the data object](./data-object-data), 
which you can use to store your own information regarding the object.

## A very simple example

A possibility of the data-script object is to change a profile when a link 
is clicked. This can be used to place an unsubscribe link that when clicked 
sets a profile setting such that no more newsletters are send. To place a 
link like this you can use the following code:

```html
<a href="http://www.example.com" data-script="profile.fields.newsletter = 'no';">Click here to unsubscribe</a>
```

While the example above is very simple you can write a lot more complicated 
data-scripts. This data-script is executed when the link is clicked and 
sets the profile field "newsletter" to "no". Now the user will be in the system, 
but not receive any newsletters.

Before an email is delivered, the data-script is removed from the original code. Your
receivers therefore do not get to see the script when they open the source code of
the message. However, the script stays active because Copernica has stored the
script and runs it when a click is registered.

## More information

* [Follow-ups](./followups)
