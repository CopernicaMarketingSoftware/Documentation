# Property `columns`

The property `columns` accepts a JSON array, with a comma seperated list with JSON objects,
containing the actual `blocks` inside the `columns`.


````json
    {
        "from" : "info@example.com",
        "subject" : "Email with a single link",
        "content" : {
            "blocks" : [ {
                "type": "columns",
                "columns" : [ {
                    "size" : 6,
                    "blocks" : [
                        {
                            "type" : "text",
                            "content" : "I'm just a text block within a column."
                        }
                    ]
                }, {
                    "size" : 6,
                    "blocks" : [
                        {
                            "type" : "text",
                            "content" : "I'm another text block within a column,
                                         I'm next to the other text block."
                        }
                    ]
                } ]
            } ]
        }
    }
````


The `columns` property has 2 mandatory properties: `size` and `blocks`. Because
the API is based on  <a href="http://zurb.com/ink/docs.php" title="visit docs of
the email boilerplate template">ZURB's INK boilerplate</a>, which is a 12 column
grid system, each row in your email, can contain up to 12 blocks.
