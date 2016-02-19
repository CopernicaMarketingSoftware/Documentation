# Property `icon`

The property `icon` allows you to set the type and size of the platform icon
for the `follow` and `share` blocks. The property value should be a nested JSON object. 
The following table lists all sub-properties of the icon property:

## Icon properties

| Property | Value | Description                                     |
|:---------|-------|-------------------------------------------------|
| type | _string_ | The type / flavour of the icon. The default value is "rounded". All supported values are:  "flower", "glossy", "grey", "leaf", "polygon", "rectangular", "rounded", "roundedcorners", "waterdrop".  |
| size | _number_ | The size of the icon. The default value is 32.         |
 
## Example

The following input JSON shows an icon basic usage in a follow block:

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
            "platforms" :  {
                "facebook" :  "https://facebook.com/copernica"
            } 
        } ]
    }
}
```
