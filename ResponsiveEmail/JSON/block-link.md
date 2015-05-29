Link block
==========

A block with the type link represents a single link. 

In this block you can set `label`, `title` and `link` properties. 

<table class="info">
        <thead>
            <tr>
                <td colspan="3">Link block properties</td>
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
                <td>"link"</td>
                <td>Identifies the block as a link block</td>
            </tr>
            <tr>
                <td><a href="/support/json/property-link-label">label</a></td>
                <td><em>string</em></td>
                <td>The link text of the link</td>
            </tr>
            <tr>
                <td><a href="/support/json/property-link">link</a></td>
                <td><em>object</em></td>
                <td>Same as `url` except that the link property accepts another JSON block
                    with extra options: `title`, `params`. 
                </td>
            </tr>
            <tr>
                <td><a href="/support/json/property-font">font</a></td>
                <td><em>object</em></td>
                <td>Font properties for the hyperlink</td>
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
            <tr>
                <td><a href="/support/json/property-align">align</a></td>
                <td><em>string</em></td>
                <td>The alignment of the link.</td>
            </tr>
            <tr>
                <td><a href="/support/json/property-css">css</a></td>
                <td><em>object</em></td>
                <td>Add custom css to the link</td>
            </tr>
            <tr>
                <td><a href="/support/json/property-attributes">attributes</a></td>
                <td><em>object</em></td>
                <td>Add custom HTML attributes to the link</td>
            </tr>
            <tr>
                <td><a href="/support/json/property-rewrite">rewrite</a></td>
                <td><em>object</em></td>
                <td>Rewrite rules for the link</td>
            </tr>
            <tr>
                <td><a href="/support/json/property-container">container</a></td>
                <td><em>object</em></td>
                <td>Get access to the table cell in which this block is wrapped</td>
            </tr>
        </tbody>
</table>

## Example

The following fragment of JSON would render into a fully functional hyperlink
````json
    {
        "from" : "info@example.com",
        "subject" : "Email with a single link",
        "content" : {
            "blocks" : [ {
                "type" : "link",
                "label" : "Responsive email",
                "link" : {
                    "label" : "Responsive email",
                    "url" : "https://responsiveemail.com"
                }
            } ]
        }
    }
````
**An important remark**: instead of adding a `link` property, the system is
able to interpret correctly a string containing the url.
