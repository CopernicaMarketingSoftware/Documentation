# Video block

The video block provides the ability to add videos to your emails.
When used inside the webversion, the video can be embedded inside
the page (when the special 'embed' property is set to true) or a
thumbnail of the video can be shown instead. For MIME messages a
thumbnail is always shown, even when you set embed to true. The reason
for this is that most email programs are not capable of showing video's.

All available properties of this block type are mentioned in the table below.

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Video block properties</td>
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
            <td>"video"</td>
            <td>Property to identify the block as a video block. </td>
        </tr>
        <tr>
            <td><a href="/support/json/property-source">source</a></td>
            <td><em>string</em></td>
            <td>The video source URI</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-link">link</a></td>
            <td><em>mixed</em></td>
            <td>A string with the link target, or an object with the properties <code>url</code>, <code>title</code> and <code>params</code>.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-embed">embed</a></td>
            <td><em>boolean</em></td>
            <td>A boolean indicating whether or not the full video should be embedded when displaying a webversion</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-align">align</a></td>
            <td><em>string</em></td>
            <td>To which side should the video be aligned? default is left.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-background">background</a></td>
            <td><em>object</em></td>
            <td>The background settings for the video block.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-margin">margin</a></td>
            <td><em>mixed</em></td>
            <td>Margins around the video.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-padding">padding</a></td>
            <td><em>mixed</em></td>
            <td>Whitespace around the block, this whitespace will have a background</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-visibility">visibility</a></td>
            <td><em>object</em></td>
            <td>Visibility based on device, client and/or receiver.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-container">container</a></td>
            <td><em>object</em></td>
            <td>Access to the surrounding container</td>
        </tr>
    </tbody>
</table>

## Example usage

The following input JSON shows how to a video to a document. This is the basic
usage, showing a thumbnail image in both email and webversions, that links to
the video on youtube when clicked:


````json
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
````


## Embedding videos

Inside mail clients, it is unfortunately not possible to directly embed videos.
On webversions, however, it is possible to embed the video directly into the
webpage. To do this, set the 'embed' property to true (it is false by default).


````json
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
````


## Custom link target

By default, if no link target is specified, when the video thumbnail is clicked,
the user will be redirected to original source of the video. To change the URI
the user will be redirected to, the link property can be used. It is up to you
to make sure this URI is valid, and that it contains the video in questions.

If embed is set to true, only users using their mail client will get redirected,
the video will still be embedded directly into the webversion.


````json
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
````
