# Property `src`

The `src` property is used inside [image blocks](copernica-docs:ResponsiveEmail/json/block-image)
and should hold the location of the image you want to add to your email.


````json
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
````


For more information and more examples, please check the documentation
of [image blocks](copernica-docs:ResponsiveEmail/json/block-image).
