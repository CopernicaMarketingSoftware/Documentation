# Container blocks

Container blocks are - you might have guessed it - a block that contains other
blocks. The blocks inside the container block are displayed below eachother in
a vertical fashion. It is thus best compared to a
<a href="/support/json/block-columns">columns block</a> with only a single column.

````json
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
````
Inside the block you can use sub properties. The following tables lists all supported properties.

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Container block properties</td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Value</td>
            <td>Description</td>
        </tr>
        <tr>
            <td>type</td>
            <td>"container"</td>
            <td>Identifies the block as a container block.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-blocks">blocks</a></td>
            <td><em>array</em></td>
            <td>
                An array with objects, each one representing any other block type,
                such as <a href="/support/json/block-button">button blocks</a> and
                <a href="/support/json/block-text">text blocks</a>.
            </td>
        </tr>
    </tbody>
</table>
