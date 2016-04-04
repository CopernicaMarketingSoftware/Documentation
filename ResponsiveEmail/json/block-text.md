# Text blocks

A text block is one of the many block types that you can use in a responsive
email. It is a very popular one (we do not often see mails without text), and 
it is easy to use: it is just a piece of text.

```json
    {
        "from" : "info@example.com",
        "subject" : "Email with only one text block",
        "content" : {
            "blocks" : [ {
                "type" : "text",
                "content" : "Example textual content"
            } ]
        }
    }
```

Inside the block you can use sub properties. The most obvious ones were already 
demonstrated in the example, `content` and `type`, but there are many more. 
The following tables lists all supported properties.

Please keep in mind that you can only use pure text in text blocks. If you want 
some sort of formatting, you can use a [HTML block](ResponsiveEmail/json/block-html) 
instead.

## Text block properties

| Property | Value | Description                                                                                                                  |
|:---------|-------|------------------------------------------------------------------------------------------------------------------------------|
| type | "text" | Identifies the block as a text block.                                                                                           |
| [content](ResponsiveEmail/json/property-text-content) | _string_ | The textual content of the block. This may include HTML.      |
| [url](ResponsiveEmail/json/property-url) | _string_ | A url to fetch the textual content from.                                   |
| [font](ResponsiveEmail/json/property-font) | _object_ | Override the template wide default font properties.                      |
| [background](ResponsiveEmail/json/property-background) | _object_ | The background of the text block.                            |
| [margin](ResponsiveEmail/json/property-margin) | _mixed_ | Margins around the text.                                              |
| [padding](ResponsiveEmail/json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background |
| [visibility](ResponsiveEmail/json/property-visibility) | _object_ | Visibility based on device, client and/or receiver.          |
| [container](ResponsiveEmail/json/property-container) | _object_ | Access to the surrounding container                            |

## Example

The following JSON input shows a more extensive example how to use all 
the properties of a text block.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with only one text block",
    "content" : {
        "blocks" : [ {
            "type" : "text",
            "content" : "Example text",
            "font" : {
                "family" : "verdana,arial,helvetica",
                "size" : "14px",
                "color" : "black"
            },
            "background" : {
                "color" : "#eee"
            },
            "margin" : {
                "top" : 10,
                "bottom" : 20
            },
            "container" : {
                "css" : {
                    "border": "solid 1px red"
                }
            }
        } ]
    }
}
```
