# Share block

The `share` block provides the ability to share a link to social media pages so
people can easily post a link to your website or product.

All available properties of this block type are mentioned in the table below.

## Share block properties

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|
| type | "share" | Property to identify the block as a share block.                                                                                                    |
| [label](../json/property-label) | _string_ | The label to show above all the social buttons.                                             |
| [platforms](../json/property-share-platforms) | _array_ | A list of the platforms which we should be displaying in this share block.           |
| [icon](../json/property-icon) | _object_ | The type and size of each social icon.                       |
| [link](../json/property-link) | _object_ | Contains the required link `url` and the optional link `title` to share on the timeline/wall of the user on the external social platform.                                            |
| [description](../json/property-share-description) | _string_ | Contains the optional link `description` to share on the timeline/wall of the user on the external social platform.                                            |
| [facebook](../json/property-facebook) | _object_ | Optional and used only if facebook is added as property in platforms. Contains the facebook properties `appid` and `redirect_uri`.                                         |
| [twitter](../json/property-twitter) | _object_ | Optional and used only if twitter is added as property in platforms. Contains the twitter properties `hashtags` and `via`.                                         |
| [font](../json/property-font) | _object_ | Override the template wide default font properties to style the label property.                      |                                              |
| [background](../json/property-background) | _object_ | The background settings for the share block.                                      |
| [margin](../json/property-margin) | _mixed_ | Margins around the share block.                                                            |
| [padding](../json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background.                      |
| [visibility](../json/property-visibility) | _object_ | Visibility based on device, client and/or receiver.                               |
| [container](../json/property-container) | _object_ | Access to the surrounding container.                                                 |
| [align](../json/property-align) | _string_ | The alignment of the social media icons of this block and their label text.                                               |

## Attributes

Just like any other block we do support custom attributes. But as a share block
is essentially a collection we support custom attributes for each element. We
support [attributes](../json/property-attributes) in the same way that we support
the custom platform settings. Meaning you can simply add the
[attributes](../json/property-attributes) object to the platform object.

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
                "url"       : "https://responsiveemail.com/",
                "title"     : "Post title"
            },
            "description"   : "Optional prefilled text to share",
            "platforms" : [ "facebook", "twitter", "linkedin", "googleplus" ],
            "facebook"  : {
                "appid"        :   "123456789101112",
                "redirect_uri" :   "https://www.copernica.com"
            },
            "twitter"  : {
                "hashtags"     :   [ "responsive", "email", "copernica" ],
                "via"          :   "ResponsiveEmail",
                "attributes"   :   {
                    "tag"      :   "twitter click"
                }
            } 
        } ]
    }
}
```
