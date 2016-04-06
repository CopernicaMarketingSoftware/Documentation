# Property `embed`

The `embed` property is used inside [video blocks](json/block-video)
to indicate whether the video should be embedded in the webversion of the document.

It is important to realize that the majority of the email clients do not support 
embedded video's. To overcome this, the ResponsiveEmail service _always_ replaces 
the actual video with one image frame from that video. The 'embed' property is 
thus normally ignored. The only time when the embed property is respected is when 
the web version of the email is generated, because the web version of an email 
is opened in a browser, and not in an email client.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a single video",
    "content" : {
        "blocks" : [ {
            "type"   : "video",
            "source" : "https://www.youtube.com/watch?v=zSQCH1qyIDo",
            "embed"  : true
        } ]
    }
}
```

For more information and more examples, please check the documentation
of [video blocks](json/block-video).
