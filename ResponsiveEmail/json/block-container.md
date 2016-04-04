# Container blocks

Container blocks are - you might have guessed it - a block that contains other
blocks. The blocks inside the container block are displayed below eachother in
a vertical fashion. It is thus best compared to a [columns block](ResponsiveEmail/json/block-columns) 
with only a single column.


```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a container block",
    "content" : {
        "blocks" : [ {
            "type" : "container",
            "blocks" : [{
                "type": "heading",
                "content": "First block inside the container"
            },{
                "type": "text",
                "content": "And this is the second"
            }]
        } ]
    }
}
```

Inside the block you can use sub properties. The following tables lists all 
supported properties.

## Container block properties

| Property | Value | Description |
| -------- | ----- | ----------- |
| type | "container" | Identifies the block as a container block. |
| [blocks](ResponsiveEmail/json/property-blocks) | _array_ | An array with objects, each one representing any other block type, such as [button blocks](ResponsiveEmail/json/block-button) and [text blocks](ResponsiveEmail/json/block-text). |
