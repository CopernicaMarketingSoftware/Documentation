# Property `label`

The `label` property is used inside <a href="/support/json/block-link">link blocks</a>
and should hold the text you have to click to be redirected to the configured link.

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

For more information and more examples, please check the documentation
of <a href="/support/json/block-link">link blocks</a>.
