# Follow block

The `follow` block provides the ability to add links to your social media pages so
people can follow you.

All available properties of this block type are mentioned in the table below.

## Follow block properties

| Property | Value | Description                                                                                                                                                  |
|:---------|-------|--------------------------------------------------------------------------------------------------------------------------------------------------------------|
| type | "follow" | Property to identify the block as a follow block.                                                                                                             |
| [label](../json/property-label) | _string_ | The label to show above all the social icons.                                                                                      |
| [platforms](../json/property-follow-platforms) | _object_ | The platforms which we should be displaying in this follow block and their corresponding usernames/urls to follow.  |
| [icon](../json/property-icon) | _object_ | The type and size of each social icon.                                                                                               |
| [font](../json/property-font) | _object_ | Override the template wide default font properties to style the label property.                                                      |
| [background](../json/property-background) | _object_ | The background settings for the follow block.                                                                            |
| [margin](../json/property-margin) | _mixed_ | Margins around the follow block.                                                                                                  |
| [padding](../json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background.                                                            |
| [visibility](../json/property-visibility) | _object_ | Visibility based on device, client and/or receiver.                                                                      |
| [container](../json/property-container) | _object_ | Access to the surrounding container.                                                                                       |
| [align](../json/property-align) | _string_ | The alignment of the social media icons of this block and their label text.                                                        |


## Example usage

The following input JSON shows how to show a `follow` block in a document. This is
the basic usage, showing a set of follow buttons.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a follow block",
    "content" : {
        "blocks" : [ {
            "type"      : "follow",
            "label"     : "Follow us!",
            "align"     : "left",
            "icon"      : {
                "type"      : "rounded",
                "size"      : 32
            },
            "platforms" :  {
                "facebook" : "copernica",
                "twitter"  : "https://twitter.com/copernica"
            },
        } ]
    }
}
```
