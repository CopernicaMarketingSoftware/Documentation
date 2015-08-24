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
            "platforms" : [ {
                "platform" : "twitter",
                "link"     : "https://twitter.com/copernica",
                "icon"     : "https://example.org/my-twitter-icon.png"
            } ]
        } ]
    }
}
```

Each platform json block has 1 mandatory property: `platform`. This should indicate
the platform in use, currently we support `twitter`, `facebook`, `googleplus` & `linkedin`.
The `link` property is mandatory in the case you're working in a `follow` block, this should
be the direct link to your social media page. Then finally we have the optional `icon`
property which you can use to override the default platform pictures being displayed.