# Property `align`

The `align` property is used inside [image blocks](json/block-image),
[video blocks](json/block-video) and various other blocks. With this
property you can align the image, video or link to the left (this is the default), to
the center or to the right.

## Property values

| Value | Description                  |
|:------|------------------------------|
| left   | Align element to the left   |
| center | Align element to the center |
| right  | Align element to the right  |

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a single image",
    "content" : {
        "blocks" : [ {
            "type" : "image",
            "src" : "https://responsiveemail.com/example.png",
            "alt" : "Example image",
            "align" : "center"
        } ]
    }
}
```
