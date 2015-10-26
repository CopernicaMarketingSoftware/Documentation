# Property `icon`

The property `icon` allows you to set the type and size of the platform icon
for the `follow` and `share` blocks. The property value should be a nested JSON object. 
The following table lists all sub-properties of the icon property:

## Icon properties

| Property | Value | Description                                     |
|:---------|-------|-------------------------------------------------|
| type | _string_ | The type / flavour of the icon. The default value is "rounded".     |
| size | _number_ | The size of the icon. The default value is 32.         |


## Example

Consider the following input JSON:

```javascript
{
    "content" : {
        "blocks" : [ {
            "type"      : "follow",
            "label"     : "Follow us!",
            "align"     : "left",
            "icon"      : {
                "type"      : "rounded",
                "size"      : 32
            },
            "platforms" : [ {
                "name"  :   "facebook",
                "link"      : {
                    "url"       : "https://facebook.com/copernica"
                }
            } ]
        } ]
    }
}
```
