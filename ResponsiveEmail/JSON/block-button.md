# Button block

The button block allows you to add buttons, optimized for HTML email,
to your email document. But unlike what you would expect, an email
button is not turned into a HTML ```<button>``` tag, but built using
a HTML ```<table>``` by the Responsive Email API, because it renders
better on different email clients.

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Button block properties</td>
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
            <td>"button"</td>
            <td>Property to identify block as button</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-button-label">label</a></td>
            <td><em>string</em></td>
            <td>Label of the button</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-link">link</a></td>
            <td><em>mixed</em></td>
            <td>Link that is opened when the button is clicked</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-font">font</a></td>
            <td><em>object</em></td>
            <td>Font properties for the button label</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-button-color">color</a></td>
            <td>string</td>
            <td>Color of a button</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-button-size">size</a></td>
            <td>string</td>
            <td>Size of a button</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-button-corners">corners</a></td>
            <td>string</td>
            <td>Button (rounded) corners</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-css">css</a></td>
            <td><em>object</em></td>
            <td>Add custom css to the button</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-attributes">attributes</a></td>
            <td><em>object</em></td>
            <td>Add custom HTML attributes to the button</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-visibility">visibility</a></td>
            <td><em>object</em></td>
            <td>Visibility based on device, client and/or receiver</td>
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
            <td>The background of the block</td>
        </tr>
    </tbody>
</table>

## Example


````json
    {
        "from" : "info@example.com",
        "subject" : "Email with a single button",
        "content" : {
            "blocks" : [ {
                "type"      : "button",
                "size"      : "small",
                "corners"   : "round",
                "label"     : "Click me!",
                "color"     : "red",
                "link" : {
                    "url" : "http://example.com",
                    "title" : "Buy an example"
                }
            } ]
        }
    }
````
