#Property `link`

The are various block types that have the `link` property, such as the
`button` and `link` block. The `link` property accepts either
a string holding a URL, or a full JSON object,
containing the properties of the links. See table below.

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Link properties</td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Value</td>
            <td>Desc.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-link-url">url</a></td>
            <td><em>string</em></td>
            <td>The online location where user is redirected to.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-link-title">title</a></td>
            <td><em>string</em></td>
            <td>The link title / description.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-link-params">params</a></td>
            <td><em>object</em></td>
            <td>Add or overwrite URL query strings, presented as a key-value pair</td>
        </tr>
    </tbody>
</table>

## Example

The JSON below represents a link with all available properties, used in a 
button block.  When the link is clicked, the user will be directed to the URL
"http://thegiantteapot.com?a=b&type=nonbelieber". The second button in the
email has exactly the same link, but here the `link` property is
given a string value.


````javascript
    {
        "from" : "info@example.com",
        "subject" : "Two identical buttons",
        "content" : {
            "blocks" : [ {
                "type" : "button",
                "label" : "Buy large teapot",
                "link" : {
                    "url" : "http://thegiantteapot.com?a=b",
                    "title" : "Proof that it doesn't exist",
                    "params" : {
                        "type" : "nonbelieber"
                    }
                }
            }, {
                "type" : "button",
                "label" : "Buy large teapot",
                "link" : "http://thegiantteapot.com?a=b&type=nonbelieber"
            } ]
        }
    }
````
