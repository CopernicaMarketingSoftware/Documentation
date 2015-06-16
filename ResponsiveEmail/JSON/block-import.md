# Import blocks

Import blocks provide the possibility to import a piece of json from an external source
and use this json as input for other new blocks, essentially allowing you to dynamically
generate blocks.

````json
    {
        "from" : "info@example.com",
        "subject" : "Email with an import block",
        "content" : {
            "blocks" : [ {
                "type" : "import",
                "source" : "https://www.responsiveemail.com//headers/heading1.json"
            } ]
        }
    }
````

The only - obviously - required option for this block is of course the `source` property.
This property must point to the URI of a valid JSON object.

The following properties are supported:

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Import block properties</td>
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
            <td>"import"</td>
            <td>Identifies the block as a import block.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-source">source</a></td>
            <td><em>string</em></td>
            <td>The source URI of the JSON to import</td>
        </tr>
    </tbody>
</table>
