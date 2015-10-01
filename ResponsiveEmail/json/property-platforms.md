# Property `platforms`

The property `platforms` accepts a JSON array, with a comma seperated list with 
JSON objects, containing the actual `platforms` inside the `follow` or `share`.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a follow block",
    "content" : {
        "blocks" : [ {
            "type"      : "follow",
            "label"     : "Follow us!",
            "align"     : "center",
            "size"      : 32,
            "platforms" : [ {
                "link"     : "https://twitter.com/copernica",
                "img"      : {
                    "src"      : "https://example.org/my-twitter-icon.png",
                    "alt"      : "The optional alt text"
                }
            } ]
        } ]
    }
}
```

Each platform json block has 1 mandatory property: `src`. This should contain a
direct url to the image that should be shown for this platform. Then there also
is an optional `alt` property, which would simply contain the alt text for this
image.