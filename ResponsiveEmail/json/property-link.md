#Property `link`

The are various block types that have the `link` property, such as the `button` 
and `link` block. The `link` property accepts either a string holding a URL, or 
a full JSON object, containing the properties of the links. See table below.

## Link properties

| Property | Value | Desc.                                                                                                                          |
|:---------|-------|--------------------------------------------------------------------------------------------------------------------------------|
| [url](../json/property-link-url) | _string_ | The online location where user is redirected to.                        |
| [title](../json/property-link-title) | _string_ | The link title / description.                                       |
| [params](../json/property-link-params) | _object_ | Add or overwrite URL query strings, presented as a key-value pair |

## Example

The JSON below represents a link with all available properties, used in a button 
block.  When the link is clicked, the user will be directed to the URL
`http://thegiantteapot.com?a=b&type=nonbelieber`. The second button in the
email has exactly the same link, but here the `link` property is given a string value.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Two identical buttons",
    "content" : {
        "blocks" : [ 
            {
                "type" : "button",
                "label" : "Buy large teapot",
                "link" : {
                    "url" : "http://thegiantteapot.com?a=b",
                    "title" : "Proof that it doesn't exist",
                    "params" : {
                        "type" : "nonbelieber"
                    }
                }
            }, 
            {
                "type" : "button",
                "label" : "Buy large teapot",
                "link" : "http://thegiantteapot.com?a=b&type=nonbelieber"
            } 
        ]
    }
}
```
