Spacer block
============

The spacer provides a simple way to create some empty vertical whitespace. 

Apart from all the default and common properties, 
this block only has the special property `height`,
which should be set to the height of your spacer in pixels.


<table class="info">
    <thead>
        <tr>
            <td colspan="3">Spacer block properties</td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Value</td>
            <td>Desc.</td>
        </tr>
        <tr>
            <td>type</td>
            <td>"spacer"</td>
            <td>Property to identify the spacer block</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-spacer-height">height</a></td>
            <td><em>integer</em></td>
            <td>The height of the spacer in pixels. Default is 50 pixels</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-container">container</a></td>
            <td><em>object</em></td>
            <td>Get access to the table cell that houses this block</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-margin">margin</a></td>
            <td><em>mixed</em></td>
            <td>Whitespace around the block</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-padding">padding</a></td>
            <td><em>mixed</em></td>
            <td>Whitespace around the block, this whitespace will have a background</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-background">background</a></td>
            <td><em>object</em></td>
            <td>The background of the block.</td>
        </tr>
    </tbody>
</table>

## Example

A complete example of a spacer block is shown below.


````json
    {
        "from" : "info@example.com",
        "subject" : "Email with two images",
        "content" : {
            "blocks" : [ {
                "type" : "spacer",
                "height" : 50
            } ]
        }
    }
````
