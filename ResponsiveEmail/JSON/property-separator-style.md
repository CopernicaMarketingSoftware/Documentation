# Property `style`

The `style` property is a simple property inside [separator blocks](/support/json/block-separator)
used to set the style of the separator. You can for example create dashed, dotted, or solid separators. The default is "solid".

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Seperator block style options</td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td width="25%">Value</td>
            <td>Example</td>
        </tr>
        <tr>
            <td>"solid"</td>
            <td><div style="border-top: solid 4px #cccccc; margin-top: 8px;"></div></td>
        </tr>
        <tr>
            <td>"dotted"</td>
            <td><div style="border-top: dotted 4px #cccccc; margin-top: 8px;"></div></td>
        </tr>
        <tr>
            <td>"dashed"</td>
            <td><div style="border-top: dashed 4px #cccccc; margin-top: 8px;"></div></td>
        </tr>
        <tr>
            <td>"double"</td>
            <td><div style="border-top: double 4px #cccccc; margin-top: 8px;"></div></td>
        </tr>
        <tr>
            <td>"groove"</td>
            <td><div style="border-top: groove 4px #cccccc; margin-top: 8px;"></div></td>
        </tr>
        <tr>
            <td>"ridge"</td>
            <td><div style="border-top: ridge 4px #cccccc; margin-top: 8px;"></div></td>
        </tr>
        <tr>
            <td>"inset"</td>
            <td><div style="border-top: inset 4px #cccccc; margin-top: 8px;"></div></td>
        </tr>
        <tr>
            <td>"outset"</td>
            <td><div style="border-top: outset 4px #cccccc; margin-top: 8px;"></div></td>
        </tr>
    </tbody>
</table>


## Example

An example with a dashed separator.


```json
    {
        "from" : "info@example.com",
        "subject" : "Email with a dashed separator",
        "content" : {
            "blocks" : [ {
                "type" : "text",
                "content" : "First paragraph"
            }, {
                "type" : "separator",
                "style" : "dashed"
            }, {
                "type" : "text",
                "content" : "Second paragraph"
            } ]
        }
    }
```
