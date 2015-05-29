# Image block

The image block provides the ability to add images to your emails.
Aside from all the regular block properties there are some properties specific for images,
such as the <a href="/support/json/property-src">`src`</a> property,
that should be set to the url to the image you would like to show.
Another image specific property is <a href="/support/json/property-alt">`alt`</a>,
which is used to set the alternative text when for some reason the image is not displayed.

All available properties of this block type are mentioned in the table below.

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Image block properties</td>
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
            <td>"image"</td>
            <td>Property to identify the block as an image block. </td>
        </tr>
        <tr>
            <td><a href="/support/json/property-src">src</a></td>
            <td><em>string</em></td>
            <td>The url of the image.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-alt">alt</a></td>
            <td><em>string</em></td>
            <td>Alt description of image. Usually only visible when image is not loaded in the email.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-align">align</a></td>
            <td><em>string</em></td>
            <td>To which side should the image be aligned? default is left.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-background">background</a></td>
            <td><em>string</em></td>
            <td>The background settings for the video block.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-margin">margin</a></td>
            <td><em>mixed</em></td>
            <td>Margins around the image.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-padding">padding</a></td>
            <td><em>mixed</em></td>
            <td>Whitespace around the block, this whitespace will have a background</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-visibility">visibility</a></td>
            <td><em>block</em></td>
            <td>Visibility based on device, client and/or receiver.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-link">link</a></td>
            <td><em>object</em></td>
            <td>Object with the link properties <code>url</code>, <code>title</code> and   <code>params</code>.</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-image-width">width</a></td>
            <td><em>string</em></td>
            <td>Optional width of the image, default is 100%</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-image-height">height</a></td>
            <td><em>string</em></td>
            <td>Optional height of the image, default is not set (image is automatically scaled)</td>
        </tr>
        <tr>
            <td><a href="/support/json/property-img">img</a></td>
            <td><em>object</em></td>
            <td>Direct access to the <code>img</code> tag, useful to set
                 <code>css</code> and <code>attributes</code></td>
            </td>
        </tr>
        <tr>
            <td><a href="/support/json/property-a">a</a></td>
            <td><em>object</em></td>
            <td>When the image is clickable, you can use this property
            to  specify <code>css</code> and <code>attributes</code> for the HTML anchor.
            </td>
        </tr>
        <tr>
            <td><a href="/support/json/property-container">container</a></td>
            <td><em>object</em></td>
            <td>Access to the parent element.</td>
        </tr>
    </tbody>
</table>

## Example use

The following input JSON shows how to add an image to a document. This is
the basic usage, to only include an image with an extra "alt" tag:
<pre><code>
    {
        "from" : "info@example.com",
        "subject" : "Email with a single image",
        "content" : {
            "blocks" : [ {
                "type" : "image",
                "src" : "https://responsiveemail.com/example.png",
                "alt" : "Example image"
            } ]
        }
    }
</code></pre>
## Clickable images

It is possible to make the image clickable. You do this by providing the
<a href="/support/json/property-link">`link`</a> property. This can either
be a string holding a URL, or an object with link properties.
The following example shows the input for an email with the two ways
to add a link.
<pre><code>
    {
        "from" : "info@example.com",
        "subject" : "Email with two images",
        "content" : {
            "blocks" : [ {
                "type" : "image",
                "src" : "https://responsiveemail.com/example1.png",
                "alt" : "Example image",
                "link" : "http://www.example.com"
            }, {
                "type" : "image",
                "src" : "https://responsiveemail.com/example2.png",
                "alt" : "Example image",
                "link" : {
                    "url" : "http://www.example.com",
                    "title" : "click here for more info"
                }
            } ]
        }
    }
</code></pre>
## Direct access to the ```<img>``` and ```<a>``` tags

All the properties in the input JSON are turned into a HTML ```<img>``` tag,
and, if you add a link, also into a HTML ```<a>``` tag. If you want to set
custom attributes or custom CSS properties to these tags, you can
do so by using the <a href="/support/json/property-img">`img`</a> and
<a href="/support/json/property-a">`a`</a> properties:
<pre><code>
    {
        "from" : "info@example.com",
        "subject" : "Email with a single image",
        "content" : {
            "blocks" : [ {
                "type" : "image",
                "src" : "https://responsiveemail.com/example.png",
                "link" : "http://www.example.com",
                "img" : {
                    "attributes" : {
                        "border" : "1",
                        "longdesc" : "a long story"
                    },
                    "css" : {
                        "border-color" : "red"
                    }
                },
                "a": {
                    "attributes" : {
                        "rel" : "nofollow"
                    },
                    "css" : {
                        "margin-right": "10px"
                    }
                }
            } ]
        }
    }
</code></pre>
The `img` and `a` properties are of course fully optional, and you
normally do not need them when working with images. Please also
keep in mind that the property
<a href="/support/json/property-attributes">`attributes`</a> and the
property <a href="/support/json/property-css">`css`</a> are advanced
properties and their use is not recommended.

