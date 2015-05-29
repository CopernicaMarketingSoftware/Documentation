# HTML blocks

A HTML block is one of the many block types that you can use in a responsive
email. It is a very popular one and it is easy to use: it is just a piece of text, with 
simple HTML formatting.

<pre class="language-javascript"><code class="language-javascript">
    {
        "from" : "info@example.com",
        "subject" : "Email with only one text block",
        "content" : {
            "blocks" : [ {
                "type" : "html",
                "content" : "Example <b>HTML</b> code"
            } ]
        }
    }
</code></pre>

The example above demonstrates how to include a HTML block in your email. 
As you can see, you can use simple markup tags like 
```<p>```, ```<b>```, ```<i>```, ```<a>```, etc. We recommend to not really 
go beyond these tags, because it might cause compatibility issues across 
different email clients.

Inside the block you can use sub properties. The most obvious ones were
already demonstrated in the example, `content` and `type`, but there are
many more. The following tables lists all supported properties.

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
            <td><a href="/support/json/property-html-content">content</a></td>
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
            <td><a href="/support/json/property-rewrite">rewrite</a></td>
            <td><em>object</em></td>
            <td>Rewrite rules for urls.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-container">container</a></td>
            <td><em>object</em></td>
            <td>Access to the surrounding container </td>
        </tr>
    </tbody>
</table>

## Example

The following JSON input shows a more extensive example how to use all 
the properties of a text block.

````javascript
    {
        "from" : "info@example.com",
        "subject" : "Email with only one HTML block",
        "content" : {
            "blocks" : [ {
                "type" : "html",
                "content" : "Example <b>HTML</b> code",
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

