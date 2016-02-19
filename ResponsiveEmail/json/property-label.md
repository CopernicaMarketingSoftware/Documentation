# Property `label`

The `label` property is used inside [follow blocks](copernica-docs:ResponsiveEmail/json/block-follow)
or [share blocks](copernica-docs:ResponsiveEmail/json/block-share)
and should hold the text that is displayed above your follow or share buttons.

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
            "platforms" : {
                "twitter" : "https://twitter.com/copernica"
            }
        } ]
    }
}
```

For more information and more examples, please check the documentation
of [follow blocks](copernica-docs:ResponsiveEmail/json/block-follow)
or [share blocks](copernica-docs:ResponsiveEmail/json/block-share).
