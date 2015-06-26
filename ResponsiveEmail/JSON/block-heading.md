# Heading blocks

Heading blocks implement six levels of document headings, `<h1>` is the most
important and `<h6>` is the least. A heading block briefly describes the topic
of the section it introduces.


```json
    {
        "from" : "info@example.com",
        "subject" : "Email with only one heading block",
        "content" : {
            "blocks" : [ {
                "type" : "heading",
                "size" : 1,
                "content" : "My title"
            } ]
        }
    }
```


Inside the block you can use sub properties. The most obvious ones were
already demonstrated in the example, `size`, `content` and `type`, but there are
many more. The following tables lists all supported properties.

Please keep in mind that you can only use pure text in heading blocks.

| Heading block properties |
| --- |
| Property | Value | Description |
| type | "heading" | Identifies the block as a heading block. |
| [size](copernica-docs:ResponsiveEmail/json/property-link) | _integer_ | The level of the heading, supported range: 1 - 6\. Defaults to 1. |
| [content](copernica-docs:ResponsiveEmail/json/property-text-content) | _string_ | The textual content of the block. This may not include HTML. |
| [align](/support/json/property-align) | _string_ | To which side should the text be aligned? default is left. |
| [font](copernica-docs:ResponsiveEmail/json/property-font) | _object_ | Override the template wide default font properties. |
| [link](copernica-docs:ResponsiveEmail/json/property-link) | _object_ | Object with the link properties `url`, `title` and `params`. |
| [background](copernica-docs:ResponsiveEmail/json/property-background) | _object_ | The background of the text block. |
| [margin](copernica-docs:ResponsiveEmail/json/property-margin) | _mixed_ | Margins around the text. |
| [padding](copernica-docs:ResponsiveEmail/json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background |
| [visibility](copernica-docs:ResponsiveEmail/json/property-visibility) | _object_ | Visibility based on device, client and/or receiver. |
| [container](copernica-docs:ResponsiveEmail/json/property-container) | _object_ | Access to the surrounding container |

## Example

The following JSON input shows a more extensive example how to use all
the properties of a heading block.


```json
    {
        "from" : "info@example.com",
        "subject" : "Email with only one heading block",
        "content" : {
            "blocks" : [ {
                "type" : "heading",
                "content" : "Your title",
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
                "size": 1,
                "align": "center"
            } ]
        }
    }
```

