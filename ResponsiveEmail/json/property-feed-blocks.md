# Property `blocks`

The property `blocks` is used inside feed blocks to control which blocks are 
created for each article and in which order.

The following blocks can be generated for articles within the feed:

- heading
- image
- html

If the `blocks` property is given, it must be an array with one or more of these 
items. The blocks will be generated in the order in which they appear in the 
`blocks` property. If they are not present the block will not be created.

The following example will completely ignore images within the article and instead 
only show the heading and article content.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a feed block",
    "content" : {
        "blocks" : [ {
            "type" : "feed",
            "source" : "http://feeds.bbci.co.uk/news/rss.xml"
            "blocks" : [ "heading", "html" ]
        } ]
    }
}
```

For more examples, see the [feed block](copernica-docs:ResponsiveEmail/json/block-feed) 
documentation.
