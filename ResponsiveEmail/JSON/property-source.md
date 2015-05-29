# Property `source`

The `source` property is used inside <a href="/support/json/block-video">video blocks</a>
and <a href="/support/json/block-feed">feed blocks</a> and should hold the location of the
video or feed you want to add to your email.

When it comes to recognizing video URI's we are pretty tolerant, you can simply copy-and-paste a
URL to e.g. a Youtube or Vimeo video, and we'll manage to filter out the video identifier.


````json
    {
        "from" : "info@example.com",
        "subject" : "Email with a single video and feed",
        "content" : {
            "blocks" : [ {
                "type"   : "video",
                "source" : "https://www.youtube.com/watch?v=zSQCH1qyIDo"
            }, {
                "type"   : "feed",
                "source" : "http://feeds.bbci.co.uk/news/rss.xml"
            }]
        }
    }
````


For more information and more examples, please check the documentation
of <a href="/support/json/block-video">video blocks</a> and
<a href="/support/json/block-feed">feed blocks</a>.
