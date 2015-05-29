# Property `a`

The `a` property is a very advanced property inside 
<a href="/support/json/block-link">link blocks</a>,
<a href="/support/json/block-button">button blocks</a> and
<a href="/support/json/block-image">image blocks</a> that gives you
direct access to the HTML ```<a>``` tag. If you want to set custom CSS
properties or if you want to add attributes to the ```<a>``` tag that are not
supported by the responsive API, you can use the `a` property for it.

Inside the `a` property you can use the 
<a href="/support/json/property-css">`css`</a> and 
<a href="/support/json/property-attributes">`attributes`</a> sub 
properties to change the ```<a>``` tag. Please keep in mind that
the `a` property is a very advanced property, and that you normally
do not have to make any changes to the ```<a>``` tag that is generated
by the responsive API. In a normal input JSON document, you will therefore
not see the `a` property.

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Supported sub properties</td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Value</td>
            <td>Description</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-css">css</a></td>
            <td><em>object</em></td>
            <td>Add custom css to the a tag</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-attributes">attributes</a></td>
            <td><em>object</em></td>
            <td>Add custom HTML attributes to the a tag</td>
        </tr>
    </tbody>
</table>

## Example use
````json
    {
        "from" : "info@example.com",
        "subject" : "Email with a single button",
        "content" : {
            "blocks" : [ {
                "type" : "button",
                "label" : "Button",
                "link" : "http://www.example.com",
                "a": {
                    "attributes" : {
                        "rel" : "nofollow"
                    },
                    "css" : {
                        "margin-right": "10px"
                    }
                }
            } ]
        }
    }
````
