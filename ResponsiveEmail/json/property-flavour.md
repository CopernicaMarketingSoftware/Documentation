# Property `flavour`

The `flavour` property is used inside [follow blocks](copernica-docs:ResponsiveEmail/json/block-follow)
or [share blocks](copernica-docs:ResponsiveEmail/json/block-share)
and should hold the icon flavour/type of your follow buttons.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a follow block",
    "content" : {
        "blocks" : [ {
            "type"      : "follow",
            "label"     : "Follow us!",
            "flavour"   : "rounded",
            "platforms" : [ {
                "platform" : "twitter",
                "link"     : "https://twitter.com/copernica"
            } ]
        } ]
    }
}
```

For more information and more examples, please check the documentation
of [follow blocks](copernica-docs:ResponsiveEmail/json/block-follow)
or [share blocks](copernica-docs:ResponsiveEmail/json/block-share).
