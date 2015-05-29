# Property `height`

The `height` property is used inside <a href="/support/json/block-spacer">spacer blocks</a>
to configure how much whitespace it should represent, this will default to 50px.
````json
    {
        "from" : "info@example.com",
        "subject" : "Email with a single spacer",
        "content" : {
            "blocks" : [ {
                "type": "spacer",
                "height": 50
            } ]
        }
    }
````
For more information and more examples, please check the documentation
of <a href="/support/json/block-spacer">spacer blocks</a>.
