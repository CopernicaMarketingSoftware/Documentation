# Property `size`

The `size` property is a simple property inside
[button blocks](/support/json/block-button) used to set the size of
the button. Currently we have support for 4 sizes, where small is the default.

- small
- tiny
- medium
- large

## Example use


````json
    {
        "from" : "info@example.com",
        "subject" : "Email with a single button",
        "content" : {
            "blocks" : [ {
                "type" : "button",
                "label" : "Button",
                "size" : "medium",
                "link" : "http://www.example.com"
            } ]
        }
    }
````
