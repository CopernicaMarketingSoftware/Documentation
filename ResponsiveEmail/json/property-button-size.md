# Property `size`

The `size` property is a simple property inside
[button blocks](copernica-docs:ResponsiveEmail/json/block-button) used to set
the size of the button. This works just like the [`padding`](copernica-docs:ResponsiveEmail/json/property-padding)
and [`margin`](copernica-docs:ResponsiveEmail/json/property-margin) blocks. As
in you can specify the top, bottom, left and right size.

## Example use

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a single button",
    "content" : {
        "blocks" : [ {
            "type" : "button",
            "label" : "Button",
            "size" : {
                "top": 5,
                "bottom": 15,
                "right": 10,
                "left": 10
            },
            "link" : "http://www.example.com"
        } ]
    }
}
```
