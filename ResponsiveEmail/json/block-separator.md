# Separator block

The separator is presented as a horizontal rule, equivalent to the HTML `<hr>` 
tag. However, since the HTML `<hr>` is difficult to consistently style across
different browsers and email clients, we do not actually output a `<hr>` tag in 
the responsive email, but a HTML `<div>` appropriately styled in order to look 
like an `<hr>` tag. 

## Seperator block properties

| Property | Value | Desc.                                                                                                                        |
|:---------|-------|------------------------------------------------------------------------------------------------------------------------------|
| type | "separator" | Identifies the block as a separator                                                                                        |
| [color](ResponsiveEmail/json/property-separator-color) | _string_ | The color of the seperator. Default #cccccc                  |
| [style](ResponsiveEmail/json/property-separator-style) | _string_ | The style of the seperator.                                  |
| [height](ResponsiveEmail/json/property-separator-height) | _integer_ | The height of the seperator in pixels. Defaults to 4.     |
| [css](ResponsiveEmail/json/property-css) | _object_ | Add custom css to the generated HTML element                               |
| [attributes](ResponsiveEmail/json/property-attributes) | _object_ | Add custom HTML attributes to HTML element                   |
| [visibility](ResponsiveEmail/json/property-visibility) | _object_ | Visibility based on device, client and/or receiver.          |
| [container](ResponsiveEmail/json/property-container) | _object_ | Get access to the table cell that houses this block            |
| [margin](ResponsiveEmail/json/property-margin) | _mixed_ | Whitespace around the block                                           |
| [padding](ResponsiveEmail/json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background |
| [background](ResponsiveEmail/json/property-background) | _object_ | The background of the block.                                 |

## Example

The following JSON can be used to generate an email with two paragraphs, separated 
by a dotted, red, 10 pixels high separator.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a red, dotted separator",
    "content" : {
        "blocks" : [ {
            "type" : "text",
            "content" : "First paragraph"
        }, {
            "type" : "separator",
            "color" : "red",
            "style" : "dotted",
            "height" : 10
        }, {
            "type" : "text",
            "content" : "Second paragraph"
        } ]
    }
}
```
