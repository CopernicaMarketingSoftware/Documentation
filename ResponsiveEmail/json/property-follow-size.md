# Property `size`

The `size` property is used inside a [follow block](copernica-docs:ResponsiveEmail/json/block-follow).
This is purely used to set the size that should be used for the displayed icons.
If you omit this property it will be set at 32.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a follow block",
    "content" : {
        "blocks" : [ {
            "type"      : "follow",
            "label"     : "Follow us!",
            "align"     : "left",
            "icon"      : {
                "type"      : "rounded",
                "size"      : 32
            },
            "platforms" : [ {
                "name"  :   "facebook",
                "link"      : {
                    "url"       : "https://facebook.com/copernica"
                }
            },
            {
                "name"  :   "twitter",
                "link"      : {
                    "url"       : "https://twitter.com/copernica"
                }
            } ]
        } ]
    }
}
```
