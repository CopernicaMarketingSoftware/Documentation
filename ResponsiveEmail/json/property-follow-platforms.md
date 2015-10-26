# Property `platforms`

The property `platforms` accepts a JSON array, with a comma seperated list with 
JSON objects, containing the actual `platforms` inside the `follow` block.
Each platform json block inside the `platforms` can have the following sub-properties:


## Platform json block sub-properties

| Property | Value | Description                                                                                                                                       |
|:---------|-------|---------------------------------------------------------------------------------------------------------------------------------------------------|
| name | _string_ | The name of the platform.  |
| [link](copernica-docs:ResponsiveEmail/json/property-link) | _object_ | Contains the `url` to follow for this platform.                                            |


## Example usage

The following input JSON shows how to set platforms in a follow block. This is
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
            "platforms" : [ {
                "name"  :   "facebook",
                "link"      : {
                    "url"       : "https://facebook.com/copernica"
                },
            },
            {
                "name"  :   "twitter",
                "link"      : {
                    "url"       : "https://twitter.com/copernica"
                },
            } ]
        } ]
    }
}
```

Each platform json block has 1 mandatory image property: `src`. This should contain a
direct url to the image that should be shown for this platform. Then there also
is an optional `alt` property, which would simply contain the alt text for this
image.
