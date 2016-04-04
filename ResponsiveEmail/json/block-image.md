# Image block

The image block provides the ability to add images to your emails.
Aside from all the regular block properties there are some properties specific 
for images, such as the [src](ResponsiveEmail/json/property-src) 
property, that should be set to the url to the image you would like to show.
Another image specific property is [alt](ResponsiveEmail/json/property-alt),
which is used to set the alternative text when for some reason the image is not displayed.

All available properties of this block type are mentioned in the table below.

## Image block properties

| Property | Value | Description                                                                                                                                                 |
|:---------|-------|-------------------------------------------------------------------------------------------------------------------------------------------------------------|
| type | "image" | Property to identify the block as an image block.                                                                                                             |
| [src](ResponsiveEmail/json/property-src) | _string_ | The url of the image.                                                                                     |
| [alt](ResponsiveEmail/json/property-alt) | _string_ | Alt description of image. Usually only visible when image is not loaded in the email.                     |
| [align](ResponsiveEmail/json/property-align) | _string_ | To which side should the image be aligned? default is left.                                           |
| [background](ResponsiveEmail/json/property-background) | _string_ | The background settings for the image block.                                                |
| [margin](ResponsiveEmail/json/property-margin) | _mixed_ | Margins around the image.                                                                            |
| [padding](ResponsiveEmail/json/property-padding) | _mixed_ | Whitespace around the block, this whitespace will have a background                                |
| [visibility](ResponsiveEmail/json/property-visibility) | _block_ | Visibility based on device, client and/or receiver.                                          |
| [link](ResponsiveEmail/json/property-link) | _object_ | Object with the link properties `url`, `title` and `params`.                                            |
| [width](ResponsiveEmail/json/property-image-width) | _string_ | Optional width of the image, default is 100%                                                    |
| [height](ResponsiveEmail/json/property-image-height) | _string_ | Optional height of the image, default is not set (image is automatically scaled)              |
| [img](ResponsiveEmail/json/property-img) | _object_ | Direct access to the `img` tag, useful to set `css` and `attributes`                                      |
| [a](ResponsiveEmail/json/property-a) | _object_ | When the image is clickable, you can use this property to specify `css` and `attributes` for the HTML anchor. |
| [container](ResponsiveEmail/json/property-container) | _object_ | Access to the parent element.                                                                 |

## Example use

The following input JSON shows how to add an image to a document. This is
the basic usage, to only include an image with an extra "alt" tag:

```javascript
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
```

## Clickable images

It is possible to make the image clickable. You do this by providing the
[link](ResponsiveEmail/json/property-link) property. This can 
either be a string holding a URL, or an object with link properties. 
The following example shows the input for an email with the two ways to add a link.

```javascript
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
```

## Direct access to the `<img>` and `<a>` tags

All the properties in the input JSON are turned into a HTML `<img>` tag, and, 
if you add a link, also into a HTML `<a>` tag. If you want to set custom 
attributes or custom CSS properties to these tags, you can do so by using the 
[img](ResponsiveEmail/json/property-img) and [a](ResponsiveEmail/json/property-a) properties:

```javascript
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
```

The `img` and `a` properties are of course fully optional, and you normally do 
not need them when working with images. Please also keep in mind that the property
[attributes](ResponsiveEmail/json/property-attributes) and 
the property [css](ResponsiveEmail/json/property-css) are 
advanced properties and their use is not recommended.
