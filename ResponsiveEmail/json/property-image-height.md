# Property `height`

The `height` property is not normally used, because scaling and resizing
the image can be best done with the [`width`](../json/property-image-width) 
property. However, if you do supply a `height` property it will be used.

## Using the `height` property in combination with `width`

If you set both the `width` and `height` properties, the ResponsiveEmail API 
will simply copy your height to the `height` HTML attribute, without any checking 
or calculations. Be aware that this will probably also mean that your image is 
going to be stretched, and that the ratio between the width and the height is 
going to be changed. Therefore, it is better not to set both the width and 
the height.

```javascript
{
    "subject" : "Example email",
    "from" : "info@example.com",
    "blocks" : [ {
        "type" : "image",
        "src" : "http://www.example.com/logo.png",
        "width" : "33%",
        "height" : "400px"
    } ]
}
```

## Using only the `height` property

If you only set the `height` property, the ResponsiveEmail.com library will 
download your image to find out the actual height. Based on the actual height, 
and your requested height, the new width of the image will be calculated. Setting 
the `height` property in the JSON is effectively the same as settig only 
the width with this calculated value. 

An example. Imagine your image is 1000x600 pixels, and you specify the following 
input JSON:

```javascript
{
    "subject" : "Example email",
    "from" : "info@example.com",
    "blocks" : [ {
        "type" : "image",
        "src" : "http://www.example.com/logo.png",
        "height" : "60px"
    } ]
}
```

The RepsonsiveEmail.com service will download your image, and find out the
the real image size is 1000x600 pixels. The desired height is 60 pixels,
so that the width should be set to 100 pixels to keep the same image ratio.
The input JSON will thus be interpreted as identical to the following JSON:

```javascript
{
    "subject" : "Example email",
    "from" : "info@example.com",
    "blocks" : [ {
        "type" : "image",
        "src" : "http://www.example.com/logo.png",
        "width" : "100px"
    } ]
}
```
