# Property `color`

The `color` property is a simple property inside
[button blocks](/copernica-docs:ResponsiveEmail/json/block-button) used to set the color of
the button. You can assign color names, as well as hexadecimal color values.

## Example use


````json
    {
        "from" : "info@example.com",
        "subject" : "Email with a single button",
        "content" : {
            "blocks" : [ {
                "type" : "button",
                "label" : "Button",
                "color" : "red",
                "link" : "http://www.example.com"
            } ]
        }
    }
````
