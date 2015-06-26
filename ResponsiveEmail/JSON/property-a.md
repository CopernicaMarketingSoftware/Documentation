# Property `a`

The `a` property is a very advanced property inside 
[link blocks](/copernica-docs:ResponsiveEmail/json/block-link), [button blocks](/copernica-docs:ResponsiveEmail/json/block-button) and [image blocks](/copernica-docs:ResponsiveEmail/json/block-image) that gives you
direct access to the HTML ```<a>``` tag. If you want to set custom CSS
properties or if you want to add attributes to the ```<a>``` tag that are not
supported by the responsive API, you can use the `a` property for it.

Inside the `a` property you can use the 
[css](/copernica-docs:ResponsiveEmail/json/property-css) and 
[`attributes`](/copernica-docs:ResponsiveEmail/json/property-attributes) sub 
properties to change the ```<a>``` tag. Please keep in mind that
the `a` property is a very advanced property, and that you normally
do not have to make any changes to the ```<a>``` tag that is generated
by the responsive API. In a normal input JSON document, you will therefore
not see the `a` property.

| Supported sub properties |
| --- |
| Property | Value | Description |
| [css](/copernica-docs:ResponsiveEmail/json/property-css) | _object_ | Add custom css to the a tag |
| [attributes](/copernica-docs:ResponsiveEmail/json/property-attributes) | _object_ | Add custom HTML attributes to the a tag |

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
