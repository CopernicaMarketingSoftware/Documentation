# Video block

The video block provides the ability to add videos to your emails. When used 
inside the webversion, the video can be embedded inside the page (when the 
special 'embed' property is set to true) or a thumbnail of the video can be 
shown instead. For MIME messages a thumbnail is always shown, even when you set 
embed to true. The reason for this is that most email programs are not capable 
of showing video's.

All available properties of this block type are mentioned in the table below.

##  Video block properties

| Property | Value | Description                                                                                                                   |
|:---------|-------|-------------------------------------------------------------------------------------------------------------------------------|
| type | "video" | Property to identify the block as a video block.                                                                                |
| [url](../json/property-url) | _string_ | The video source URI                                                                                    |
| [link](../json/property-link) | _mixed_ | A string with the link target, or an object with the properties `url`, `title` and `params`.           |
| [embed](../json/property-embed) | _boolean_ | A boolean indicating whether or not the full video should be embedded when displaying a webversion |
| [align](../json/property-align) | _string_ | To which side should the video be aligned? default is left.                                         |
| [background](../json/property-background) | _object_ | The background settings for the video block.                                              |
| [margin](../json/property-margin) | _mixed_ | Margins around the video.                                                                          |
| [padding](../json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background                              |
| [visibility](../json/property-visibility) | _object_ | Visibility based on device, client and/or receiver.                                       |
| [container](../json/property-container) | _object_ | Access to the surrounding container                                                         |

## Example usage

The following input JSON shows how to display a video in a document. This is the basic
usage, showing a thumbnail image in both email and webversions, that links to
the video on youtube when clicked:


```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a single video",
    "content" : {
        "blocks" : [ {
            "type"   : "video",
            "url"    : "https://www.youtube.com/watch?v=zSQCH1qyIDo"
        } ]
    }
}
```

## Embedding videos

Inside mail clients, it is unfortunately not possible to directly embed videos.
On webversions however, it is possible to embed the video directly into the
webpage. To do this, set the 'embed' property to true (it is false by default).


```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a single video",
    "content" : {
        "blocks" : [ {
            "type"   : "video",
            "url"    : "https://www.youtube.com/watch?v=zSQCH1qyIDo",
            "embed"  : true
        } ]
    }
}
```


## Custom link target

By default, if no link target is specified, when the video thumbnail is clicked,
the user will be redirected to original source of the video, for example
the youtube.com website. If you have embedded the youtube video on your own
website too, you can also link to your own website. To change the redirect URI, 
add a link property to the JSON. It is up to you to make sure this URI is valid, 
and that it indeed contains the right video.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a single video",
    "content" : {
        "blocks" : [ {
            "type"   : "video",
            "url"    : "https://www.youtube.com/watch?v=zSQCH1qyIDo",
            "link"   : {
                "url"        : "http://www.example.com/video",
                "title"      : "Watch the video",
            }
        } ]
    }
}
```

In the above example we've both included the youtube address as well as the 
URL of the website where the video is embedded. Both addresses are necessary,
because we need to fetch a _still_ from the video to include in the mail. We
can only fetch this image snapshot if we know the full youtube address of
the video.


## Other platforms

All examples on this page use youtube.com examples. However, you can also
use links to vimeo videos. If you need support for other video platforms too,
feel free to send us an email.

