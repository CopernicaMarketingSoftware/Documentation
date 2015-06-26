# Separator block

The separator is presented as a horizontal rule, equivalent to the HTML ```<hr>``` tag. 
However, since the HTML ```<hr>``` is difficult to consistently style across
different browsers and email clients, we do not actually output a ```<hr>```
tag in the responsive email, but a HTML ```<div>``` appropriately 
styled in order to look like an ```<hr>``` tag. 

| Seperator block properties |
| --- |
| Property | Value | Desc. |
| type | "separator" | Identifies the block as a separator |
| [color](/support/json/property-separator-color) | _string_ | The color of the seperator. Default #cccccc |
| [style](/support/json/property-separator-style) | _string_ | The style of the seperator. |
| [height](/support/json/property-separator-height) | _integer_ | The height of the seperator in pixels. Defaults to 4. |
| [css](/support/json/property-css) | _object_ | Add custom css to the generated HTML element |
| [attributes](/support/json/property-attributes) | _object_ | Add custom HTML attributes to HTML element |
| [visibility](/support/json/property-visibility) | _object_ | Visibility based on device, client and/or receiver. |
| [container](/support/json/property-container) | _object_ | Get access to the table cell that houses this block |
| [margin](/support/json/property-margin) | _mixed_ | Whitespace around the block |
| [padding](/support/json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background |
| [background](/support/json/property-background) | _object_ | The background of the block. |


## Example

The following JSON can be used to generate an email with two paragraphs,
seperated by a dotted, red, 10 pixels high separator.


````json
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
````
