# Video block

The video block provides the ability to add videos to your emails. When used 
inside the webversion, the video can be embedded inside the page (when the 
special 'embed' property is set to true) or a thumbnail of the video can be 
shown instead. For MIME messages a thumbnail is always shown, even when you set 
embed to true. The reason for this is that most email programs are not capable 
of showing video's.

All available properties of this block type are mentioned in the table below.

##  Video block properties

| Property | Value | Description                                                                                                                                               |
|:-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| type | "video" | Property to identify the block as a video block.                                                                                                            |
| [source](copernica-docs:ResponsiveEmail/json/property-source) | _string_ | The video source URI                                                                              |
| [link](copernica-docs:ResponsiveEmail/json/property-link) | _mixed_ | A string with the link target, or an object with the properties `url`, `title` and `params`.           |
| [embed](copernica-docs:ResponsiveEmail/json/property-embed) | _boolean_ | A boolean indicating whether or not the full video should be embedded when displaying a webversion |
| [align](copernica-docs:ResponsiveEmail/json/property-align) | _string_ | To which side should the video be aligned? default is left.                                         |
| [background](copernica-docs:ResponsiveEmail/json/property-background) | _object_ | The background settings for the video block.                                              |
| [margin](copernica-docs:ResponsiveEmail/json/property-margin) | _mixed_ | Margins around the video.                                                                          |
| [padding](copernica-docs:ResponsiveEmail/json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background                              |
| [visibility](copernica-docs:ResponsiveEmail/json/property-visibility) | _object_ | Visibility based on device, client and/or receiver.                                       |
| [container](copernica-docs:ResponsiveEmail/json/property-container) | _object_ | Access to the surrounding container                                                         |

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
            "source" : "https://www.youtube.com/watch?v=zSQCH1qyIDo"
        } ]
    }
}
```

## Embedding videos

Inside mail clients, it is unfortunately not possible to directly embed videos.
On webversions, however, it is possible to embed the video directly into the
webpage. To do this, set the 'embed' property to true (it is false by default).


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


## Custom link target

By default, if no link target is specified, when the video thumbnail is clicked,
the user will be redirected to original source of the video. To change the URI
the user will be redirected to, the link property can be used. It is up to you
to make sure this URI is valid, and that it contains the video in questions.

If embed is set to true, only users using their mail client will get redirected,
the video will still be embedded directly into the webversion.


```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with a single video",
    "content" : {
        "blocks" : [ {
            "type"   : "video",
            "source" : "https://www.youtube.com/watch?v=zSQCH1qyIDo",
            "link"   : {
                "url"   : "http://www.example.com/video",
                "title" : "Watch the video"
            }
        } ]
    }
}
```
