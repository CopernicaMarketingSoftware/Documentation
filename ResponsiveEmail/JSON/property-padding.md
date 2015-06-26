# Property `padding`

You may change the amount of whitespace that is reserved around a block.
The `padding` property can be used for that. The padding can either be
a numeric value, if you want to use the same padding for all four sides
around the block, or an object if you want to set the top, left, right
and bottom padding seperately. This difference between `padding` and
[`margin`](copernica-docs:ResponsiveEmail/json/property-margin) is that padding will
get the background color of said block, unlike margin.


````json
    {
        "from" : "info@example.com",
        "subject" : "This email shows how to use margins",
        "content" : {
            "blocks" : [ {
                "type" : "image",
                "src" : "http://www.example.com/image1.png",
                "padding" : 10
            }, {
                "type" : "image",
                "src" : "http://www.example.com/image2.png",
                "padding" : {
                    "left" : 10,
                    "right" : 20,
                    "top" : 0,
                    "bottom" : 5
                }
            } ]
        }
    }
````


Above example shows how you can use the `padding` property to set the padding
for all four sides around a block at once, and how to use the property
to set different padding for all four sides.


## Where to use?

The `padding` property can be used for every type of block, whether it is
a [text block](copernica-docs:ResponsiveEmail/json/block-text), an [image block](copernica-docs:ResponsiveEmail/json/block-image) or any other block: they all have padding.