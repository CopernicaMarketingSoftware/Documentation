# Property `alt`

The `alt` property is used inside [image blocks](../json/block-image)
and can be used to set a text that will be displayed when the image could
not be shown. This could for example happen when a user has configured his or email email
client in such a manner that images are not directly downloaded.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a single image",
    "content" : {
        "blocks" : [ {
            "type": "image",
            "src": "https://responsiveemail.com/example.png",
            "alt": "Example image"
        } ]
    }
}
```

For more information and more examples, please check the documentation
of [image blocks](../json/block-image)..
