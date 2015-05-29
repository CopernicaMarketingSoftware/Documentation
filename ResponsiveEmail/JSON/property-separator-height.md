# Property `height`

The `height` property is used inside <a href="/support/json/block-separator">separator blocks</a>
to configure how much whitespace it should represent, this will default to 4px.
````json
    {
        "from" : "info@example.com",
        "subject" : "Email with a dashed separator",
        "content" : {
            "blocks" : [ {
                "type" : "text",
                "content" : "First paragraph"
            }, {
                "type" : "separator",
                "height" : 10
            }, {
                "type" : "text",
                "content" : "Second paragraph"
            } ]
        }
    }
````
For more information and more examples, please check the documentation
of <a href="/support/json/block-separator">separator blocks</a>.
