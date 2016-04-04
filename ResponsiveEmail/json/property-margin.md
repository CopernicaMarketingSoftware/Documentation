# Property `margin`

You may change the amount of whitespace that is reserved around a block.
The `margin` property can be used for that. The margin can either be
a numeric value, if you want to use the same margin for all four sides
around the block, or an object if you want to set the top, left, right
and bottom margins seperately.

```javascript
{
    "from" : "info@example.com",
    "subject" : "This email shows how to use margins",
    "content" : {
        "blocks" : [ {
            "type" : "image",
            "src" : "http://www.example.com/image1.png",
            "margin" : 10
        }, {
            "type" : "image",
            "src" : "http://www.example.com/image2.png",
            "margin" : {
                "left" : 10,
                "right" : 20,
                "top" : 0,
                "bottom" : 5
            }
        } ]
    }
}
```

Above example shows how you can use the `margin` property to set the margins
for all four sides around a block at once, and how to use the property to set 
different margins for all four sides.

## Where to use?

The `margin` property can be used for every type of block, whether it is
a [text block](ResponsiveEmail/json/block-text), an 
[image block](ResponsiveEmail/json/block-image) or any other block: 
they all have margins.

## Negative values

Negative values are not allowed for both margins and paddings. If a negative value is set in the JSON, it will be converted to a zero by the parser. There is no limit on the maximum value of margins and paddings. 

