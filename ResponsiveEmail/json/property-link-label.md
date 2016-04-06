# Property `label`

The `label` property is used inside [link blocks](json/block-link)
and should hold the text you have to click to be redirected to the configured link.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a single link",
    "content" : {
        "blocks" : [ {
            "type": "link",
            "label" : "Responsive email",
            "link" : "https://responsiveemail.com/"
        } ]
    }
}
```

For more information and more examples, please check the documentation
of [link blocks](json/block-link).
