# Tracking property `pixel`

Opens (or impressions) can be detected by including an image in your email.
When the email is opened, the image is downloaded from your server and a
bell starts ringing. 

In the rare case that you don't have any images in your mail, and still
want to track opens, the API can include a transparant pixel in your emails.  

If you don't have images in your email, or for some reason necessarily
want to include this pixel, you can do so with the toplevel property
`tracking`, in which you include a property `pixel` and the online location
of your pixel as the value. You better make sure that the image is actually
a transparant pixel, as it will be included in the body of your message.  

This example JSON shows you how to include your tracking pixel.
````json
    {
        "name" : "template13",
        "subject" : "This email is being tracked by the NSA",
        "from" : "info@example.com",
        "tracking" : {
            "pixel" : "http://www.prism.gov/images/pixel.gif"
        }
    }
````
## Keeping stats

If you include the tracking pixel, you must make sure that the pixel
is actually hosted on the given location. It is up to you to ensure
that the URL is valid, _and_ that you count the number of times the
pixel is downloaded. The ResponsiveEmail.com service only adds the
pixels to the email, but does not host the image, nor do we keep
statistics.

## Not necessary when sending with ResponsiveEmail.com

If you use the ResponsiveEmail.com service not only to generate responsive
emails, but also to _deliver_ them, we will also take care of email
statistics and the tracking. In such a case you do not have to include
the tracking pixel yourself.

## Omitting the tracking pixel property

We only include the tracking pixel if your mail does not contain any
other images. If your email _does_ contain other images, we assume that
you will do the tracking via one of those other images, and ommit the
tracking pixel, even if you did explicitly set the `pixel` property in
the JSON. If you want to force the inclusion of the tracking pixel,
even when your email holds other images, you can do so by setting
the `force` property:
````json
    {
        "name" : "template13",
        "subject" : "This email is being tracked by the NSA",
        "from" : "info@example.com",
        "tracking" : {
            "pixel" : "http://www.prism.gov/images/pixel.gif",
            "force" : true
        }
    }
````
