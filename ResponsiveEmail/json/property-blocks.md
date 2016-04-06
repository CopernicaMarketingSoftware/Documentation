# Property `blocks`

The `blocks` property is used inside the [main content section](json/property-content) 
and holds an array of blocks that make up the mail. Every block in the array 
should at least have a [`type`](json/property-type)
property to identify the block type.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with 2 columns",
    "content" : {
        "blocks" : [
            {
                "type" : "text",
                "content" : "I'm the first text block"
            },
            {
                "type" : "button",
                "label" : "I'm a buton"
            }
        ]
    }
}
```

The example above shows the input for an email with a text, followed by a button.

## Use in columns

The `blocks` property is also used if make use of [columns](json/block-columns). 
Every [column](json/property-columns) also has a 
`blocks` property that describes the blocks that are placed in the column.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with 2 columns",
    "content" : {
        "blocks" : [ {
            "type" : "columns",
            "columns" : [
                {
                    "size" : 6,
                    "blocks" : [
                        {
                            "type" : "text",
                            "content" : "I'm inside the first column"
                        },
                        {
                            "type" : "button",
                            "label" : "I'm also in the first column"
                        }
                    ]
                },
                {
                    "size" : 6,
                    "blocks" : [
                        {
                            "type" : "text",
                            "content" : "Second column"
                        }
                    ]
                }
            ]
        } ]
    }
}
```

The above example shows the two uses of the `blocks` property. First you see it 
in action as a property inside the [main content section](json/property-content), 
and then twice when the blocks inside the columns are described.
