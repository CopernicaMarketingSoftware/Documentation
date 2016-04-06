# Property `color`

The `color` property is a simple property inside
[separator blocks](json/block-separator) used to 
set the color of the separator. You can use hex notation of colors here, direct 
color names as supported by HTML etc. If omitted this will default to #cccccc.

## Example use

```javascript
    {
        "from" : "info@example.com",
        "subject" : "Email with a red separator",
        "content" : {
            "blocks" : [ 
                {
                    "type" : "text",
                    "content" : "First paragraph"
                }, 
                {
                    "type" : "separator",
                    "color" : "red"
                }, 
                {
                    "type" : "text",
                    "content" : "Second paragraph"
                } 
            ]
        }
    }
```
