# Property `label`

The `label` property is used inside [button blocks](copernica-docs:ResponsiveEmail/json/block-button)
and should hold the visible text for the button.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a single button",
    "content" : {
        "blocks" : [ {
            "type": "button",
            "label" : "Button"
        } ]
    }
}
```

For more information and more examples, please check the documentation
of [button blocks](copernica-docs:ResponsiveEmail/json/block-button).
