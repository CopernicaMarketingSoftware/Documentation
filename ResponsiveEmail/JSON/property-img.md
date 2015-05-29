# Property `img`

The `img` property is a very advanced property inside 
<a href="/support/json/block-image">image blocks</a> that gives you
direct access to the HTML ```<img>``` tag. If you want
to set custom CSS properties or if you want to add attributes to the 
```<img>``` tag that are not supported by the responsive API, you can
use the nested `img` property for it.

Inside the `img` property you can use the 
<a href="/support/json/property-css">`css`</a> and 
<a href="/support/json/property-attributes">`attributes`</a> sub 
properties to change the ```<img>``` tag. Please keep in mind that
the `img` property is a very advanced property, and that you normally
do not have to make any changes to the ```<img>``` tag that is generated
by the responsive API. In a normal input JSON document, you will therefore
not see the `img` property.

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
        "subject" : "Email with a single image",
        "content" : {
            "blocks" : [ {
                "type" : "image",
                "src" : "https://responsiveemail.com/example.png",
                "img" : {
                    "attributes" : {
                        "border" : "1",
                        "longdesc" : "a long story"
                    },
                    "css" : {
                        "border-color" : "red"
                    }
                }
            } ]
        }
    }
````
