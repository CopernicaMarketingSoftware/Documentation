# Button block

The button block allows you to add buttons, optimized for HTML email, to your 
email document. But unlike what you would expect, an email button is not turned 
into a HTML `<button>` tag, but built using a HTML `<table>` by the Responsive 
Email API, because it renders better on different email clients.

## Button block properties
| Property | Value | Desc.                                                                                                                        |
|:---------|-------|--------------------------------------------------------------------------------------------------------------------------------|
| type | "button" | Property to identify block as button                                                                                          |
| [label](json/property-button-label) | _string_ | Label of the button                                             |
| [link](json/property-link) | _mixed_ | Link that is opened when the button is clicked                            |
| [font](json/property-font) | _object_ | Font properties for the button label                                     |
| [color](json/property-button-color) | _string_ | Color of a button                                               |
| [size](json/property-button-size) | _mixed_ | Size of a button                                                   |
| [corners](json/property-button-corners) | _string_ | Button (rounded) corners                                    |
| [css](json/property-css) | _object_ | Add custom css to the button                                               |
| [attributes](json/property-attributes) | _object_ | Add custom HTML attributes to the button                     |
| [visibility](json/property-visibility) | _object_ | Visibility based on device, client and/or receiver           |
| [container](json/property-container) | _object_ | Get access to the table cell that houses this block            |
| [margin](json/property-margin) | _mixed_ | Whitespace around the block                                           |
| [padding](json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background |
| [background](json/property-background) | _object_ | The background of the block                                  |

## Example

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a single button",
    "content" : {
        "blocks" : [ {
            "type"      : "button",
            "size"      : 10,
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
```
