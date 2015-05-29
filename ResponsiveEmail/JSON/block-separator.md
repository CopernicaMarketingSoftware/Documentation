# Separator block

The separator is presented as a horizontal rule, equivalent to the HTML ```<hr>``` tag. 
However, since the HTML ```<hr>``` is difficult to consistently style across
different browsers and email clients, we do not actually output a ```<hr>```
tag in the responsive email, but a HTML ```<div>``` appropriately 
styled in order to look like an ```<hr>``` tag. 

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Seperator block properties</td>
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
            <td>"separator"</td>
            <td>Identifies the block as a separator</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-separator-color">color</a></td>
            <td><em>string</em></td>
            <td>The color of the seperator. Default #cccccc</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-separator-style">style</a></td>
            <td><em>string</em></td>
            <td>The style of the seperator.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-separator-height">height</a></td>
            <td><em>integer</em></td>
            <td>The height of the seperator in pixels. Defaults to 4.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-css">css</a></td>
            <td><em>object</em></td>
            <td>Add custom css to the generated HTML element</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-attributes">attributes</a></td>
            <td><em>object</em></td>
            <td>Add custom HTML attributes to HTML element</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-visibility">visibility</a></td>
            <td><em>object</em></td>
            <td>Visibility based on device, client and/or receiver.</td>
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

The following JSON can be used to generate an email with two paragraphs,
seperated by a dotted, red, 10 pixels high separator.
<pre><code>
    {
        "from" : "info@example.com",
        "subject" : "Email with a red, dotted separator",
        "content" : {
            "blocks" : [ {
                "type" : "text",
                "content" : "First paragraph"
            }, {
                "type" : "separator",
                "color" : "red",
                "style" : "dotted",
                "height" : 10
            }, {
                "type" : "text",
                "content" : "Second paragraph"
            } ]
        }
    }
</code></pre>
