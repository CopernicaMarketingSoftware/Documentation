# Data scripting/Data object

In Copernica software you can write your own Javascript code to embed in 
hyperlinks. If your Javascript is attached to a link the code is executed when the link is 
clicked. It's similar to the "onlick" attribute, but your script will run 
on Copernica servers. You can also write your own triggers and actions in the 
[Marketing Suite follow-up editor](./follow-up-manager-ms).

You can use your script by using:

* the *data-script* attribute on &lt;a&gt; tags
* the flowchart editor in the follow-up form

Warning: You need the new link tracking system to use data-scripts. If you're using 
Marketing Suite this is already enabled, but Publisher users have to enable the system 
manually in their account settings.

## Available objects

Inside the script you can make use of a couple of global variables that identify 
the (sub)profile that clicked on the link and other relevant data. 
Each of these objects have read-only properties to get data, others have 
write properties as well. The following variables are accessible:

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

A possibility of the data-script object is to change profile data when a link 
is clicked. This can be used to place an unsubscribe link that when clicked 
sets a profile setting to indicate this person doesn't want to receive newsletters 
anymore. Note that this functionality is also available in the 
[unsubscribe settings](./database-unsubscribe-behavior), 
but this is a simple example to get you started. 

```html
<a href="http://www.example.com" data-script="profile.fields.newsletter = 'no';">Click here to unsubscribe</a>
```

When the script is executed (on click) the profile will be updated. Now 
you can make your own [newsletter selection](./create-a-mailing-list) 
to make sure you only send mail to people who are subscribed to your newsletter.

Before an email is delivered, the data-script is removed from the original code. Your
receivers therefore do not get to see the script when they open the source code of
the message. However, the script stays active because Copernica has stored the
script and runs it when a click is registered.

## More information

* [Follow-ups](./followups)
