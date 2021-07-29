# Data scripts and -objects

Data scripts allow you to link follow-up actions to various triggers. These scripts are executed by 
Copernica whenever a trigger is activated. This works in a similar way to scripts that are placed in a
hyperlink as an 'onclick' attribute, with one key difference: scripts are executed on Copernica
servers instead of in the browser.

You can add data scripts in the Marketing Suite by:

* Placing the data script attribute within an &lt;a&gt; tag;
* Adding them in the [Email editor](https://ms.copernica.com/#/design).

You can also create your own triggers and actions in the [Follow-up Manager](./follow-up-manager-ms).

__Note__: The use of data scripts requires the latest link tracking system, which is automatically
enabled within Marketing Suite. If you're using Publisher, you'll need to enable it manually in 
your account settings.

## Available objects

There are various objects available for use in data scripts. These objects allow you to retrieve
and edit data from your account. The following objects are available:

| Object name                                   | Description
|-----------------------------------------------|--------------------------------------|
| [**copernica**](./data-object-copernica)      | Copernica account                    |
| [**mailing**](./data-object-mailing)          | Previous mailing                     |
| [**message**](./data-object-message)          | Personalized template                |
| [**template**](./data-object-template)        | Standard template                    |
| [**document**](./data-object-document)        | Mailing document (Publisher only)    |
| [**database**](./data-object-database)        | Database                             |
| [**collection**](./data-object-collection)    | Collection                           |
| [**profile**](./data-object-profile)          | Profile                              |
| [**subprofile**](./data-object-subprofile)    | Subprofile                           |
| [**destination**](./data-object-destination)  | Profile/subprofile alias             |

Each of the above objects utilizes a [data object](./data-object-data), which can be used to store information
about the object.

## Example

You can use the data script object to modify profile data whenever a link is clicked:
  
```html
<a href="http://www.example.com/unsubscribe" data-script="profile.fields.newsletter = 'no';">Click here to unsubscribe</a>
```

In the above example, a click would result in the 'newsletter' field being set to 'no'. This is just a simple example: the
functionality also allows you to execute highly complex scripts.
  
Data scripts are never visible for inspection in the email's source code. Instead, the data script is removed from the source code
shortly prior to sending. It is therefore invisible to the recipient.

## More information

* [Follow-ups](./database-follow-ups)
