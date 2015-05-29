# Text blocks

A text block is one of the many block types that you can use in a responsive
email. It is a very popular one (we do not often see mails
without text), and it is easy to use: it is just a piece of text.
````json
    {
        "from" : "info@example.com",
        "subject" : "Email with only one text block",
        "content" : {
            "blocks" : [ {
                "type" : "text",
                "content" : "Example textual content"
            } ]
        }
    }
````
Inside the block you can use sub properties. The most obvious ones were
already demonstrated in the example, `content` and `type`, but there are
many more. The following tables lists all supported properties.

Please keep in mind that you can only use pure text in text blocks. If
you want some sort of formatting, you can use a 
<a href="/support/json/block-html">HTML block</a> instead.

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Text block properties</td>
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
            <td>"text"</td>
            <td>Identifies the block as a text block.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-text-content">content</a></td>
            <td><em>string</em></td>
            <td>The textual content of the block. This may include HTML.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-font">font</a></td>
            <td><em>object</em></td>
            <td>Override the template wide default font properties.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-background">background</a></td>
            <td><em>object</em></td>
            <td>The background of the text block.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-margin">margin</a></td>
            <td><em>mixed</em></td>
            <td>Margins around the text.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-padding">padding</a></td>
            <td><em>mixed</em></td>
            <td>Whitespace around the block, this whitespace will have a background</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-visibility">visibility</a></td>
            <td><em>object</em></td>
            <td>Visibility based on device, client and/or receiver.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-container">container</a></td>
            <td><em>object</em></td>
            <td>Access to the surrounding container</td>
        </tr>
    </tbody>
</table>

## Example

The following JSON input shows a more extensive example how to use all 
the properties of a text block.
````json
    {
        "from" : "info@example.com",
        "subject" : "Email with only one text block",
        "content" : {
            "blocks" : [ {
                "type" : "text",
                "content" : "Example text",
                "font" : {
                    "family" : "verdana,arial,helvetica",
                    "size" : "14px",
                    "color" : "black"
                },
                "background" : {
                    "color" : "#eee"
                },
                "margin" : {
                    "top" : 10,
                    "bottom" : 20
                },
                "container" : {
                    "css" : {
                        "border": "solid 1px red"
                    }
                }
            } ]
        }
    }
````

