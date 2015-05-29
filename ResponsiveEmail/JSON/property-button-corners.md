# Property `corners`   

The `corners` property is a property inside <a href="/support/json/block-button">button blocks</a> that adds
rounded corners to a button. Currently you can choose from 3 values.

<table class="info">
    <thead>
        <tr><td colspan="3">Property values</td></tr>
    </thead>
    <tbody>
        <tr>
            <td>Value</td>
            <td>Description</td>
        </tr>
        <tr>
            <td>default</td>
            <td>Default button without rounded corners</td>
        </tr>
        <tr>
            <td>radius</td>
            <td>Adds subtle rounded corners</td>
        </tr>
        <tr>
            <td>round</td>
            <td>Adds obvious rounded corners for a 'pill-like' button look</td>
        </tr>
    </tbody>
</table>

## Example
Add rounded corners to a button
````json
    {
        "from" : "info@example.com",
        "subject" : "Email with a single button",
        "content" : {
            "blocks" : [ {
                "type" : "button",
                "label" : "Button",
                "corners" : "radius",
                "link" : "http://www.example.com"
            } ]
        }
    }
````
## Output

<table class="responsive-output property-button">
    <tr>
        <td>
            <a href="http://www.example.com" title="Button">Button</a>
        </td>
    </tr>
</table>
