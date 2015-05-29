# Property `columns`

The property `columns` is a nested property that is used inside a 
<a href="/support/json/block-columns">columns block</a>. It expects
a JSON array as value, with a list of JSON objects. Each object 
in this array describes the contents of a single column.
````json
    {
        "from" : "info@example.com",
        "subject" : "Email with two text blocks side by side",
        "content" : {
            "blocks" : [ {
                "type" : "columns",
                "columns" : [ {
                    "size" : 6
                    "blocks" : [
                        {
                            "type" : "text",
                            "content" : "I'm just a text block within a column."
                        }
                    ]
                }, {
                    "size" : 6
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

The above example holds an email with a single block. This block 
happens to be a `columns` block, that splits the mail in two columns.
Each column contains a single text block.

## Supported properties

The `columns` property itself holds an array of JSON objects, with every
object representing a single column. The following table shows the 
nested properties that can be set for each column.

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Columns [ { ... }, { ... } ] properties</td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Value</td>
            <td>Desc.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-blocks">blocks</a></td>
            <td><em>array</em></td>
            <td>
                An array with objects, each one representing any other block type, such as <code>button</code> and <code>text</code> blocks. 
            </td>
        </tr>
        <tr>
            <td><a href="/support/json/property-size">size</a></td>
            <td><em>integer</em></td>
            <td>
                The size of the column. Supported values are 1 up to 12.
            </td>
        </tr>
        <tr>
            <td><a href="/support/json/property-container">container</a></td>
            <td><em>object</em></td>
            <td>Get access to the container element</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-background">background</a></td>
            <td><em>object</em></td>
            <td>The background of the column.</td>
        </tr>
    </tbody>
</table>

The most important property is the <a href="/support/json/property-blocks">`blocks`</a>
property. You can use it to assign an array of other blocks that are placed 
inside the column. To keep the examples readable, we normally show this
property with only a single block in it (in the example on this page, we show
it twice with a single text block), but nothing forbids you
from using it for much longer arrays.

The other important property is the `size` property. All the columns together
are placed in a twelve columns wide fluid grid. You can assign each column
a size from 1 to 12, as long as the total of all sizes is 12. Thus, if 
you want to create a mail with two small side columns, and a wider column
in the middle, you could use column sizes 2-8-2.
````json
    {
        "from" : "info@example.com",
        "subject" : "Email with two small columns on the side",
        "content" : {
            "blocks" : [ {
                "type" : "columns",
                "columns" : [ {
                    "size" : 2
                    "blocks" : [
                    
                        /* array of small blocks in the left column */
                    
                    ]
                }, {
                    "size" : 8
                    "blocks" : [
                    
                        /* array of wide blocks in the center column */
                    ]
                }, {
                    "size" : 2
                    "blocks" : [
                    
                        /* array of small blocks in the right column */
                    ]
                } ]
            }, {
                "type" : "text",
                "source" : "text that spans all three columns"
            } ]
        }
    }
````
