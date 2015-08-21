# Follow block

The follow block provides the ability to add links to your social media pages so
people can follow you.

All available properties of this block type are mentioned in the table below.

## Follow block properties

| Property | Value | Description                                                                                                                                       |
|:---------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| type | "follow" | Property to identify the block as a follow block.                                                                                                  |
| [label](copernica-docs:ResponsiveEmail/json/property-label) | _string_ | The label to show above all the social buttons.                                             |
| [platforms](copernica-docs:ResponsiveEmail/json/property-platforms) | _array_ | A list of the platforms which we should be displaying in this follow block           |
| [background](copernica-docs:ResponsiveEmail/json/property-background) | _object_ | The background settings for the follow block.                                     |
| [margin](copernica-docs:ResponsiveEmail/json/property-margin) | _mixed_ | Margins around the follow block.                                                           |
| [padding](copernica-docs:ResponsiveEmail/json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background                      |
| [visibility](copernica-docs:ResponsiveEmail/json/property-visibility) | _object_ | Visibility based on device, client and/or receiver.                               |
| [container](copernica-docs:ResponsiveEmail/json/property-container) | _object_ | Access to the surrounding container                                                 |

## Example usage

The following input JSON shows how to show a follow block in a document. This is
the basic usage, showing a set of follow buttons.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a follow block",
    "content" : {
        "blocks" : [ {
            "type"      : "follow",
            "label"     : "Follow us!",
            "platforms" : [ {
                "platform" : "twitter",
                "link"     : "https://twitter.com/copernica"
            } ]
        } ]
    }
}
```