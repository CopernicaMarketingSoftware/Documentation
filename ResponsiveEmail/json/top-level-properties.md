#Top level properties

The ResponsiveEmail API takes a JSON object as its input, and turns that
object into a responsive email. At the root level of this JSON input object,
you can set many different properties to exactly specify what your
email should look like, and what content it should have.

#### There are three 'basic' top level properties:

* META properties
* MIME properties
* Content and style properties

The API also offers some advanced properties, such as the `rewrite` property.

## Top level meta properties

| Property | Type | Description                                                                                            |
|:---------|------|--------------------------------------------------------------------------------------------------------|
| [name](json/property-name) | _string_ | User readable template name.                      |
| [description](json/property-description) | _string_ | User readable template description. |
| [version](json/property-version) | _integer_ | Version number of the JSON input.          |

## Top level MIME properties

| Property | Value | Description                                                                                                                       |
|:---------|-------|-----------------------------------------------------------------------------------------------------------------------------------|
| [subject](json/property-subject) | _string_ | Subject line of the email.                                              |
| [from](json/property-from) | _object_ | Email address and name of the sender.                                         |
| [replyTo](json/property-reply-to) | _object_ | Optional email address and name of the user to which replies are sent. |
| [to](json/property-to) | _array_ | List of receivers.                                                                 |
| [cc](json/property-cc) | _array_ | List of CC addresses.                                                              |
| [bcc](json/property-bcc) | _array_ | List of BCC addresses.                                                           |
| [headers](json/property-headers) | _object_ | Additional custom headers to be added to the mail header.               |
| [attachments](json/property-attachments) | _array_ | Attachments to download and add to the email.                    |
| [dkim](json/property-dkim) | _object_ | Private key for DKIM signature.                                               |

## Top level content and style properties

| Property | Value | Description                                                                                                                                      |
|:---------|-------|--------------------------------------------------------------------------------------------------------------------------------------------------|
| [text](json/property-text) | _string_ | Supply text version for clients that do not support HTML emails                              |
| [font](json/property-font) | _object_ | Template wide font and text settings.                                                        |
| [background](json/property-background) | _object_ | Background settings for the entire template.                                     |
| [content](json/property-content) | _object_ | The main block that holds all of the other blocks and content of the responsive email. |
| [css](json/property-css) | _object_ | Custom CSS settings to be added to the `<body>` tag.                                           |
| [attributes](json/property-attributes) | _object_ | Custom attributes to be added to the `<body>` tag.                               |

## Top level advanced properties

| Property | Value | Description                                                                                                                     |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------|
| [rewrite](json/property-rewrite) | _object_ | Define specific rules to overwrite information specified in the JSON. |
| [tracking](json/property-tracking) | _object_ | Supply email tracking information.                                  |

## Example input

Just an idea of how a JSON document could look like.

```javascript
{
    "name": "My template",
    "from": "info@example.com",
    "subject": "Example email",
    "background": {
        "color": "#f3f3f3"
    },
    "content": {
        "blocks": [
            {
                "type": "text",
                "content": "This is an example email"
            }, 
            {
                "type": "image",
                "src": "http://placekitten.com/200/140"
            }
        ]
    }
}
```

## Output

![](json/example-output.png)
