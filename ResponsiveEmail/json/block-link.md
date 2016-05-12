# Link block

A block with the type link represents a single link. 

In this block you can set `label`, `title` and `link` properties. 

## Link block properties

| Property | Value | Desc.                                                                                                                                                             |
|:---------|-------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| type | "link" | Identifies the block as a link block                                                                                                                                 |
| [label](../json/property-link-label) | _string_ | The link text of the link                                                                              |
| [link](../json/property-link) | _object_ | Same as `url` except that the link property accepts another JSON block with extra options: `title`, `params`. |
| [font](../json/property-font) | _object_ | Font properties for the hyperlink                                                                             |
| [margin](../json/property-margin) | _mixed_ | Whitespace around the block                                                                                |
| [padding](../json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background                                      |
| [background](../json/property-background) | _object_ | The background of the block.                                                                      |
| [align](../json/property-align) | _string_ | The alignment of the link.                                                                                  |
| [css](../json/property-css) | _object_ | Add custom css to the link                                                                                      |
| [attributes](../json/property-attributes) | _object_ | Add custom HTML attributes to the link                                                            |
| [rewrite](../json/property-rewrite) | _object_ | Rewrite rules for the link                                                                              |
| [container](../json/property-container) | _object_ | Get access to the table cell in which this block is wrapped                                         |

## Example

The following fragment of JSON would render into a fully functional hyperlink

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a single link",
    "content" : {
        "blocks" : [ {
            "type" : "link",
            "label" : "Responsive email",
            "link" : {
                "label" : "Responsive email",
                "url" : "https://responsiveemail.com"
            }
        } ]
    }
}
```

**An important remark**: instead of adding a `link` property, the system is
able to interpret correctly a string containing the url.
