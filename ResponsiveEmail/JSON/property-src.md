# Property `src`

The `src` property is used inside <a href="/support/json/block-image">image blocks</a>
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
of <a href="/support/json/block-image">image blocks</a>.
