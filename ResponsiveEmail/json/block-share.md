# Share block

The share block provides the ability to share a link to social media pages so
people can easily post a link to your website or product.

All available properties of this block type are mentioned in the table below.

## Share block properties

| Property | Value | Description                                                                                                                                       |
|:---------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| type | "share" | Property to identify the block as a share block.                                                                                                    |
| [label](copernica-docs:ResponsiveEmail/json/property-label) | _string_ | The label to show above all the social buttons.                                             |
| [platforms](copernica-docs:ResponsiveEmail/json/property-platforms) | _array_ | A list of the platforms which we should be displaying in this share block.           |
| [link](copernica-docs:ResponsiveEmail/json/property-link) | _mixed_ | The link that should be shared to social media.                                                |
| [background](copernica-docs:ResponsiveEmail/json/property-background) | _object_ | The background settings for the share block.                                      |
| [margin](copernica-docs:ResponsiveEmail/json/property-margin) | _mixed_ | Margins around the share block.                                                            |
| [padding](copernica-docs:ResponsiveEmail/json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background                      |
| [visibility](copernica-docs:ResponsiveEmail/json/property-visibility) | _object_ | Visibility based on device, client and/or receiver.                               |
| [container](copernica-docs:ResponsiveEmail/json/property-container) | _object_ | Access to the surrounding container                                                 |

## Example usage

The following input JSON shows how to show a share block in a document. This is
the basic usage, showing a set of share buttons.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a follow block",
    "content" : {
        "blocks" : [ {
            "type"      : "share",
            "label"     : "Tell your friends about us!",
            "link"      : "https://responsiveemail.com",
            "platforms" : [ {
                "platform" : "twitter"
            }, {
                "platform" : "facebook"
            } ]
        } ]
    }
}
```