# Share block

The `share` block provides the ability to share a link to social media pages so
people can easily post a link to your website or product.

All available properties of this block type are mentioned in the table below.

## Share block properties

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|
| type | "share" | Property to identify the block as a share block.                                                                                                    |
| [label](copernica-docs:ResponsiveEmail/json/property-label) | _string_ | The label to show above all the social buttons.                                             |
| [platforms](copernica-docs:ResponsiveEmail/json/property-platforms) | _array_ | A list of the platforms which we should be displaying in this share block.           |
| [icon](copernica-docs:ResponsiveEmail/json/property-icon) | _object_ | The type and size of each platform icon                       |
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
            "platforms" : [ {
                "platform"  :   "facebook",
                "link"      : {
                    "url"       : "https://facebook.com/copernica"
                }
            },
            {
                "platform"  :   "twitter",
                "link"      : {
                    "url"       : "https://twitter.com/copernica"
                }
            } ]
        } ]
    }
}
```

## Share block platforms

Each share block platform can have different sub-properties. Below are listed the specific ones for each social media: 

## Facebook

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "facebook" | The name of the social media.                                             |
| appid | _string_ | The appid of the social platform. If not set - get the value of the Copernica Marketing Software appid (optional).           |
| title | _string_ | The post title (optional).                       |
| description | _string_ | The post description (optional).                       |
| picture | _string_ | The post image.                       |

## LinkedIn

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "linkedin" | The name of the social media.                                             |
| title | _string_ | The post title.                       |
| description | _string_ | The post description.                       |

## Twitter

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "twitter" | The name of the social media.                                             |
| description | _string_ | The prefilled text to tweet (optional).                       |
| hashtags | _array_ | The hashtags which apply to the tweet.                       |
| via | _string_ | The provider/source of the post.                       |

## GooglePlus

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "googleplus" | The name of the social media.                                             |

## WindowsLive

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "windowslive" | The name of the social media.                                             |
| title | _string_ | The post title.                       |
| description | _string_ | The post description.                       |

## Tumblr

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "tumbler" | The name of the social media.                                             |
| title | _string_ | The post title.                       |
| description | _string_ | The post description.                       |

## Delicious

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "delicious" | The name of the social media.                                             |
| title | _string_ | The post title.                       |
| provider | _string_ | The provider/source of the post (optional).                       |

## Reddit

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|                                          |
| name | "reddit" | The name of the social media.                                             |
| title | _string_ | The post title.                       |
