# Property `url`

The `url` property is used inside [video blocks](ResponsiveEmail/json/block-video),
[import blocks](ResponsiveEmail/json/block-import),
[html blocks](ResponsiveEmail/json/block-html),
[text blocks](ResponsiveEmail/json/block-text)
and [feed blocks](ResponsiveEmail/json/block-feed) and should
hold the location of the video, feed or any content depending on the block you want to add to your email.

When it comes to recognizing video URI's we are pretty tolerant, you can simply
copy-and-paste a URL to e.g. a Youtube or Vimeo video, and we'll manage to
filter out the video identifier.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a single video and feed",
    "content" : {
        "blocks" : [
            {
                "type"   : "video",
                "url" : "https://www.youtube.com/watch?v=zSQCH1qyIDo"
            },
            {
                "type"   : "feed",
                "url" : "http://feeds.bbci.co.uk/news/rss.xml"
            }
        ]
    }
}
```

For more information and more examples, please check the documentation of
[video blocks](ResponsiveEmail/json/block-video),
[import blocks](ResponsiveEmail/json/block-import),
[html blocks](ResponsiveEmail/json/block-html),
[text blocks](ResponsiveEmail/json/block-text)
and [feed blocks](ResponsiveEmail/json/block-feed).
