# Property `size`

The `size` property is used inside a column inside a
[columns block](ResponsiveEmail/json/block-columns). Because 
the API uses a 12 columns wide fluid grid system for lay-out, the sum of the all 
the column sizes that reside in a block should be 12.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with three equally sized columns",
    "content" : {
        "blocks" : [ {
            "type": "columns",
            "columns" : [ 
                {
                    "size" : 3,
                    "blocks" : [ /* blocks inside the left column */ ]
                }, 
                {
                    "size" : 6,
                    "blocks" : [ /* blocks inside the center column */ ]
                }, 
                {
                    "size" : 3,
                    "blocks" : [ /* blocks inside the right column */ ]
                } 
            ]
        } ]
    }
}
```
