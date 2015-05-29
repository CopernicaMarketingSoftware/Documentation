# Property `color`

The `color` property is a simple property inside
<a href="/support/json/block-separator">separator blocks</a> used to set the color of
the separator. You can use hex notation of colors here, direct color names as supported
by HTML etc. If omitted this will default to #cccccc.

## Example use


````json
    {
        "from" : "info@example.com",
        "subject" : "Email with a red separator",
        "content" : {
            "blocks" : [ {
                "type" : "text",
                "content" : "First paragraph"
            }, {
                "type" : "separator",
                "color" : "red"
            }, {
                "type" : "text",
                "content" : "Second paragraph"
            } ]
        }
    }
````
