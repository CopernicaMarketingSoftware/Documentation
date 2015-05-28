# Heading blocks

Heading blocks implement six levels of document headings, &lt;h1&gt; is the most
important and &lt;h6&gt; is the least. A heading block briefly describes the topic
of the section it introduces.
<pre><code>
    {
        "from" : "info@example.com",
        "subject" : "Email with only one heading block",
        "content" : {
            "blocks" : [ {
                "type" : "heading",
                "size" : 1,
                "content" : "My title"
            } ]
        }
    }
</code></pre>
Inside the block you can use sub properties. The most obvious ones were
already demonstrated in the example, `size`, `content` and `type`, but there are
many more. The following tables lists all supported properties.

Please keep in mind that you can only use pure text in heading blocks.

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Heading block properties</td>
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
            <td>"heading"</td>
            <td>Identifies the block as a heading block.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-link">size</a></td>
            <td><em>integer</em></td>
            <td>The level of the heading, supported range: 1 - 6. Defaults to 1.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-text-content">content</a></td>
            <td><em>string</em></td>
            <td>The textual content of the block. This may not include HTML.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-align">align</a></td>
            <td><em>string</em></td>
            <td>To which side should the text be aligned? default is left.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-font">font</a></td>
            <td><em>object</em></td>
            <td>Override the template wide default font properties.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-link">link</a></td>
            <td><em>object</em></td>
            <td>Object with the link properties <code>url</code>, <code>title</code> and   <code>params</code>.</td>
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
the properties of a heading block.
<pre><code>
    {
        "from" : "info@example.com",
        "subject" : "Email with only one heading block",
        "content" : {
            "blocks" : [ {
                "type" : "heading",
                "content" : "Your title",
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
                "size": 1,
                "align": "center"
            } ]
        }
    }
</code></pre>

