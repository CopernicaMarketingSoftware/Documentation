# Button block

The button block allows you to add buttons, optimized for HTML email,
to your email document. But unlike what you would expect, an email
button is not turned into a HTML `<button>` tag, but built using
a HTML `<table>` by the Responsive Email API, because it renders
better on different email clients.

| Button block properties |
| --- |
| Property | Value | Desc. |
| type | "button" | Property to identify block as button |
| [label](copernica-docs:ResponsiveEmail/json/property-button-label) | _string_ | Label of the button |
| [link](copernica-docs:ResponsiveEmail/json/property-link) | _mixed_ | Link that is opened when the button is clicked |
| [font](copernica-docs:ResponsiveEmail/json/property-font) | _object_ | Font properties for the button label |
| [color](copernica-docs:ResponsiveEmail/json/property-button-color) | string | Color of a button |
| [size](copernica-docs:ResponsiveEmail/json/property-button-size) | string | Size of a button |
| [corners](copernica-docs:ResponsiveEmail/json/property-button-corners) | string | Button (rounded) corners |
| [css](copernica-docs:ResponsiveEmail/json/property-css) | _object_ | Add custom css to the button |
| [attributes](copernica-docs:ResponsiveEmail/json/property-attributes) | _object_ | Add custom HTML attributes to the button |
| [visibility](copernica-docs:ResponsiveEmail/json/property-visibility) | _object_ | Visibility based on device, client and/or receiver |
| [container](copernica-docs:ResponsiveEmail/json/property-container) | _object_ | Get access to the table cell that houses this block |
| [margin](copernica-docs:ResponsiveEmail/json/property-margin) | _mixed_ | Whitespace around the block |
| [padding](copernica-docs:ResponsiveEmail/json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background |
| [background](copernica-docs:ResponsiveEmail/json/property-background) | _object_ | The background of the block |

## Example


````json
    {
        "from" : "info@example.com",
        "subject" : "Email with a single button",
        "content" : {
            "blocks" : [ {
                "type"      : "button",
                "size"      : "small",
                "corners"   : "round",
                "label"     : "Click me!",
                "color"     : "red",
                "link" : {
                    "url" : "http://example.com",
                    "title" : "Buy an example"
                }
            } ]
        }
    }
````

