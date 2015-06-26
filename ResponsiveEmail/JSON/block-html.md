# HTML blocks

A HTML block is one of the many block types that you can use in a responsive
email. It is a very popular one and it is easy to use: it is just a piece of text, with 
simple HTML formatting.


````javascript
    {
        "from" : "info@example.com",
        "subject" : "Email with only one text block",
        "content" : {
            "blocks" : [ {
                "type" : "html",
                "content" : "Example <b>HTML</b> code"
            } ]
        }
    }
````


The example above demonstrates how to include a HTML block in your email. 
As you can see, you can use simple markup tags like 
```<p>```, ```<b>```, ```<i>```, ```<a>```, etc. We recommend to not really 
go beyond these tags, because it might cause compatibility issues across 
different email clients.

Inside the block you can use sub properties. The most obvious ones were
already demonstrated in the example, `content` and `type`, but there are
many more. The following tables lists all supported properties.

| Text block properties |
| --- |
| Property | Value | Description |
| type | "text" | Identifies the block as a text block. |
| [content](/support/json/property-html-content) | _string_ | The textual content of the block. This may include HTML. |
| [font](/support/json/property-font) | _object_ | Override the template wide default font properties. |
| [background](/support/json/property-background) | _object_ | The background of the text block. |
| [margin](/support/json/property-margin) | _mixed_ | Margins around the text. |
| [padding](/support/json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background |
| [visibility](/support/json/property-visibility) | _object_ | Visibility based on device, client and/or receiver. |
| [rewrite](/support/json/property-rewrite) | _object_ | Rewrite rules for urls. |
| [container](/support/json/property-container) | _object_ | Access to the surrounding container |

## Example

The following JSON input shows a more extensive example how to use all 
the properties of a text block.


````javascript
    {
        "from" : "info@example.com",
        "subject" : "Email with only one HTML block",
        "content" : {
            "blocks" : [ {
                "type" : "html",
                "content" : "Example <b>HTML</b> code",
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
````

