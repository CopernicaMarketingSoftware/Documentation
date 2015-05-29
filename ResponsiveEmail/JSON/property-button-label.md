# Property `label`

The `label` property is used inside <a href="/support/json/block-button">button blocks</a>
and should hold the visible text for the button.


````json
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
````


For more information and more examples, please check the documentation
of <a href="/support/json/block-button">button blocks</a>.
