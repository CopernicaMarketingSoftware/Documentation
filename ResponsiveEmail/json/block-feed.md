# Feed blocks

Feed blocks provide the possibility to display the contents of any RSS
feed inside a responsive document.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a feed block",
    "content" : {
        "blocks" : [ {
            "type" : "feed",
            "url" : "http://feeds.bbci.co.uk/news/rss.xml"
        } ]
    }
}
```

The only - obviously - required option for this block is of course the `url`
property. This property must point to the URI of a valid RSS feed.

This will create a feed block using all default settings. For each article a
[heading block](json/block-heading) and
[html block](json/block-html) is created. If the
article contains an image, an [image block](json/block-image)
is also created.

For each of these blocks, default properties can be given. To change the default
properties for the [heading block](json/block-heading),
create a `heading` object within your JSON. All properties valid for the
[heading block](json/block-heading) can be given
here, although the `content` property will of course be filled with the title of
the article. Similarly, the default properties for the [html block](json/block-html)
and [image block](json/block-image) can be
overwritten by adding a `html` and `image` object to the JSON respectively.
For the [html block](json/block-html), the
`content` property will be filled with the content of the article, and for the
[image block](json/block-image) the `src` and
`link` property will be filled with the source URI and article link, respectively.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a feed block",
    "content" : {
        "blocks" : [ {
            "type" : "feed",
            "url" : "http://rss.cnn.com/rss/edition.rss",
            "image" : {
                "align" : "center"
            },
            "html" : {
                "margin" : {
                    "top" : 10
                }
            }
        } ]
    }
}
```

In addition to changing properties of the different blocks, it is also possible
to change the order of the blocks as well as disable certain blocks completely,
by using the `blocks` property. If this property is given, it must be an array
with the desired blocks, in the preferred order. The following example would
exclude any images that might be availeble in the article.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a feed block",
    "content" : {
        "blocks" : [ {
            "type" : "feed",
            "url" : "http://rss.cnn.com/rss/edition.rss",
            "blocks" : [ "heading", "html" ]
        } ]
    }
}
```

The following properties are supported:

## Feed block properties

| Property | Value | Description                                                                                                         |
| -------- | ----- | -----------                                                                                                         |
| type | "feed" | Identifies the block as a feed block.                                                                                  |
| [url](json/property-url) | _string_ | The source URI of the feed                                        |
| [blocks](json/property-feed-blocks) | _array_ | The blocks to show for each article                     |
| [heading](json/block-heading) | _object_ | Properties for the heading block                             |
| [image](json/block-image) | _object_ | Properties for the image block                                   |
| [html](json/block-html) | _object_ | Properties for the HTML block                                      |
| [visibility](json/property-visibility) | _object_ | Visibility based on device, client and/or receiver. |
