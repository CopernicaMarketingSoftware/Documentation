# Scaling images for mobile devices

It is possible to specify the width of an image inside an image block. This will 
make the image smaller than the container it is placed in. You can either set 
a width in percentages or pixels, the width of an image can never exceed the 
size of the container it is placed in. If the width of an image is not set, 
the image will always scale to the container it is placed in.

[Check the image width documentation](support/json/property-image-width)

In email design there are many ways to make an image responsive. You could, 
for example, design an email in such a way that an image covers 50% of your 
email width in desktop clients, but cover the entire screen width on mobile 
devices. To achieve this in HTML and CSS you would have to adjust the CSS of 
the style of an image at smaller screen widths. Doing the same thing on 
ResponsiveEmail.com is much easier.

## Scale images to full width on mobile devices

Scaling an image to half of the width of a desktop client is easy, simply add 
"width" ="50%" to an image and it will always scale to cover half of the screen 
width. However, this means that even in the mobile client the image will only 
cover half of the screen. Often you'll want images to behave differently 
depending on the device the email is viewed on. 

If you want an image to scale differently it can easily be done with [columns](support/json/property-columns). 
Let's say you want an image to cover half of the email width on desktop clients 
and 100% on mobile clients. All you have to do is place the image in a column:

```javascript
{
    "from": {
        "address": "info@example.com",
        "name": "ResponsiveEmail.com Tips & Tricks"
    },
    "name": "Image Scaling",
    "background": {
    "color": "#ffffff"
    },
        "content": {
                "blocks": [ {
                    "type": "columns",
                    "columns": [ {
                        "blocks": [  {cd
                            "type": "image",
                            "src": "image.png"
                    }   ],
                    "size": 6
                }, {
                "blocks": [],
                "size": 6
         } ]
     } ]
    }
}
```
 
If, instead of setting a specific width, you place an image in a column, 
the image will only cover the width of the column. Columns scale to the complete 
width of the template in mobile clients. This means that if the email is opened 
on a mobile device it will scale to the full width of the email. By changing 
the size of the column you can easily change the size of the image in the desktop 
client. ResponsiveEmail.com uses a 12 column grid system. The column-size can 
range from '1' to '11', covering from 8% to 92% of the width of an email. If you 
want an image to cover one third of the email in the desktop client, the column 
that holds the image needs to have a size of '4', the other column should be 
given a size of '8'. An image will never exceed the width of the container 
its placed in. 

The block next to the image can be left empty or, if you want to add some extra 
padding on the mobile client, filled with a [spacer](/support/json/block-spacer "spacer documentation"). 
It is of course possible to add text or any of the other content-blocks to 
the column next to the image. If you have any questions about this article or 
ResponsiveEmail.com, feel free to send us a message on [info@responsiveemail.com](mailto:info@responsiveemail.com "send us an email!")
