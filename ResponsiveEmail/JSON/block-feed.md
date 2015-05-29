# Feed blocks

Feed blocks provide the possibility to display the contents of any RSS
feed inside a responsive document.
````json
    {
        "from" : "info@example.com",
        "subject" : "Email with a feed block",
        "content" : {
            "blocks" : [ {
                "type" : "feed",
                "source" : "http://feeds.bbci.co.uk/news/rss.xml"
            } ]
        }
    }
````
The only - obviously - required option for this block is of course the `source` property.
This property must point to the URI of a valid RSS feed.

This will create a feed block using all default settings. For each article a
<a href="/support/json/block-heading">heading block</a> and <a href="/support/json/block-html">
html block</a> is created. If the article contains an image, an<a href="/support/json/block-image">
image block</a> is also created.

For each of these blocks, default properties can be given. To change the default properties
for the <a href="/support/json/block-heading">heading block</a>, create a `heading` object within
your JSON. All properties valid for the <a href="/support/json/block-heading">heading block</a> can
be given here, although the `content` property will of course be filled with the title of the article.

Similarly, the default properties for the <a href="/support/json/block-html">html block</a> and
<a href="/support/json/block-image">image block</a> can be overwritten by adding a `html` and
`image` object to the JSON respectively. For the <a href="/support/json/block-html">html block</a>,
the `content` property will be filled with the content of the article, and for the
<a href="/support/json/block-image">image block</a> the `src` and `link` property will
be filled with the source URI and article link, respectively.
````json
    {
        "from" : "info@example.com",
        "subject" : "Email with a feed block",
        "content" : {
            "blocks" : [ {
                "type" : "feed",
                "source" : "http://rss.cnn.com/rss/edition.rss",
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
````
In addition to changing properties of the different blocks, it is also possible to change the order
of the blocks as well as disable certain blocks completely, by using the `blocks` property. If this
property is given, it must be an array with the desired blocks, in the preferred order. The following
example would exclude any images that might be availeble in the article.
````json
    {
        "from" : "info@example.com",
        "subject" : "Email with a feed block",
        "content" : {
            "blocks" : [ {
                "type" : "feed",
                "source" : "http://rss.cnn.com/rss/edition.rss",
                "blocks" : [ "heading", "html" ]
            } ]
        }
    }
````
The following properties are supported:

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Feed block properties</td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Value</td>
            <td>Description</td>
        </tr>
        <tr>
            <td>type</td>
            <td>"feed"</td>
            <td>Identifies the block as a feed block.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-source">source</a></td>
            <td><em>string</em></td>
            <td>The source URI of the feed</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-feed-blocks">blocks</a></td>
            <td><em>array</em></td>
            <td>The blocks to show for each article</td>
        </tr>
        <tr>
            <td><a href="/support/json/block-heading">heading</a></td>
            <td><em>object</em></td>
            <td>Properties for the heading block</td>
        </tr>
        <tr>
            <td><a href="/support/json/block-image">image</a></td>
            <td><em>object</em></td>
            <td>Properties for the image block</td>
        </tr>
        <tr>
            <td><a href="/support/json/block-html">html</a></td>
            <td><em>object</em></td>
            <td>Properties for the HTML block</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-visibility">visibility</a></td>
            <td><em>object</em></td>
            <td>Visibility based on device, client and/or receiver.</td>
        </tr>
    </tbody>
</table>
