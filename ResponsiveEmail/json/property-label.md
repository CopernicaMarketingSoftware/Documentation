# Property `label`

The `label` property is used inside [follow blocks](json/block-follow)
or [share blocks](json/block-share)
and should hold the text that is displayed above your follow or share buttons.

## Example usage

The following input JSON shows how to show a label in a follow block. This is the basic usage, showing a follow button.

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
of [follow blocks](json/block-follow)
or [share blocks](json/block-share).
