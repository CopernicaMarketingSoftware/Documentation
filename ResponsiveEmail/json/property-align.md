# Property `align`

The `align` property is used inside [image blocks](/copernica-docs:ResponsiveEmail/json/block-image), [video blocks](/copernica-docs:ResponsiveEmail/json/block-video) and [link blocks](/copernica-docs:ResponsiveEmail/json/block-link). With this property you can align the
image, video or link to the left (this is the default), to the center or to the right.

| Property values |
| --- |
| Value | Description |
| left | Align element to the left |
| center | Align element to the center |
| right | Align element to the right |


````json
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
````
