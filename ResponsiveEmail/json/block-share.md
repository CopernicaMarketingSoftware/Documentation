# Share block

The `share` block provides the ability to share a link to social media pages so
people can easily post a link to your website or product.

All available properties of this block type are mentioned in the table below.

## Share block properties

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|
| type | "share" | Property to identify the block as a share block.                                                                                                    |
| [label](copernica-docs:ResponsiveEmail/json/property-label) | _string_ | The label to show above all the social buttons.                                             |
| [platforms](copernica-docs:ResponsiveEmail/json/property-share-platforms) | _array_ | A list of the platforms which we should be displaying in this share block.           |
| [icon](copernica-docs:ResponsiveEmail/json/property-icon) | _object_ | The type and size of each platform icon                       |
| [link](copernica-docs:ResponsiveEmail/json/property-link) | _object_ | Contains the `url` to share.                                            |
| [font](copernica-docs:ResponsiveEmail/json/property-font) | _object_ | Override the template wide default font properties.                      |                                              |
| [background](copernica-docs:ResponsiveEmail/json/property-background) | _object_ | The background settings for the share block.                                      |
| [margin](copernica-docs:ResponsiveEmail/json/property-margin) | _mixed_ | Margins around the share block.                                                            |
| [padding](copernica-docs:ResponsiveEmail/json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background                      |
| [visibility](copernica-docs:ResponsiveEmail/json/property-visibility) | _object_ | Visibility based on device, client and/or receiver.                               |
| [container](copernica-docs:ResponsiveEmail/json/property-container) | _object_ | Access to the surrounding container                                                 |
| [align](copernica-docs:ResponsiveEmail/json/property-align) | _string_ | The alignment of the label text of this block                                               |

## Example usage

The following input JSON shows how to show a share block in a document. This is
the basic usage, showing a set of share buttons.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a share block",
    "content" : {
        "blocks" : [ {
            "type"      : "share",
            "label"     : "Tell your friends about us!",
            "align"     : "left",
            "icon"      : {
                "type"      : "rounded",
                "size"      : 32
            },
            "link"      : {
                "url"       : "https://copernica.com/"
            },
            "platforms" : [ {
                "platform"     :   "facebook",
                "name"         :   "facebook",
                "appid"        :   "1234",
                "caption"      :   "Post title",
                "description"  :   "Post description",
                "picture"      :   "http://www.copernica.com/images/somecustomimage.png"
            },
            {
                "platform"     :   "twitter",
                "name"         :   "twitter",
                "description"  :   "Optional prefilled text to tweet",
                "hashtags"     :   ["responsive","email","copernica"],
                "via"          :   "ResponsiveEmail",
            } ]
        } ]
    }
}
```
