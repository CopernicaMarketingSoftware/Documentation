# Spacer block

The spacer provides a simple way to create some empty vertical whitespace. 

Apart from all the default and common properties, this block only has the special 
property `height`, which should be set to the height of your spacer in pixels.

## Spacer block properties

| Property | Value | Desc.                                                                                                                        |
|:---------|-------|------------------------------------------------------------------------------------------------------------------------------|
| type | "spacer" | Property to identify the spacer block                                                                                         |
| [height](ResponsiveEmail/json/property-spacer-height) | _integer_ | The height of the spacer in pixels. Default is 50 pixels     |
| [container](ResponsiveEmail/json/property-container) | _object_ | Get access to the table cell that houses this block            |
| [margin](ResponsiveEmail/json/property-margin) | _mixed_ | Whitespace around the block                                           |
| [padding](ResponsiveEmail/json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background |
| [background](ResponsiveEmail/json/property-background) | _object_ | The background of the block.                                 |

## Example

A complete example of a spacer block is shown below.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with two images",
    "content" : {
        "blocks" : [ {
            "type" : "spacer",
            "height" : 50
        } ]
    }
}
```
