# Tracking property `force`

If you include the <a href="/support/json/property-pixel">`pixel`</a>
property to add a tracking pixel to your responsive email, you may find
yourself in a position that the pixel was left out of your email after all!

This happens if your email holds other images as well. The
ResponsiveEmail.com service assumes that you add tracking variables to
all the images in your email, and that the tracking pixel is only
necessary if your email does not contain any images at all. If you want
to turn off this behavior, and want to include the tracking pixel _no matter_
the number of other images in the mail, you can use the `force` property.

    {
        "name" : "template13",
        "subject" : "This email is being tracked by the NSA",
        "from" : "info@example.com",
        "tracking" : {
            "pixel" : "http://www.prism.gov/images/pixel.gif",
            "force" : true
        }
    }

