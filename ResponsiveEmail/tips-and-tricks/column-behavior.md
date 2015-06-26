# Column behavior on mobile devices

Adding columns to an email template is simple: ResponsiveEmail.com uses a fluid 
grid with twelve cells. This makes it possible to add up to twelve columns in 
a single row. These columns are given the same width by default. The JSON below 
shows  an email with two columns. In the left column we placed a text-block, 
and gave the column a size of "8", in the right block we added an image-block 
with a size of "4". This way the columns fill up all of the 12 cells in the grid. 
The left column fills 2/3 of the grid and the right column 1/3.  

```javascript
    {
        "from" : "info@example.com",
        "subject" : "Email with two blocks side by side",
        "content" : {
            "blocks" : [{
                "type" : "columns",
                "columns" : [{
                    "size" : 8,
                    "blocks" : [{
                            "type" : "text",
                            "content" : "I'm just a text block within a column."
                            }
                        ]}, 
                    {
                    "size" : 4,
                    "blocks" : [{
                            "type" : "image",
                            "src" : "https://responsiveemail.com/example.png",
                            "alt" : "example image" 
                    }]
                }]
            }]
        }
    }
```

In the desktop client this will show text on the left side of the email and an 
image on the right. In the mobile client this will place the text above the image. 
Often you'll want the image to show first, to attract the attention of the reader 
to the article. Because of the way responsive emails work, you will have to add 
an image block to the left column in order to show it first on mobile clients. 

![Column Behavior](Resources/Images/responsive-email-columns.png)

*Column placement on desktop clients (left) and mobile devices (right)*

### Keeping text below images in the mobile version of your email

The image above shows column behavior on mobile devices, however if you create 
multiple columns and try to recreate the behavior in the image, the second image 
will be displayed below the second image. A column can consist of multiple blocks, 
so if you do not want image1 and image2 to stack on top of each other, but keep 
the text underneath them, you should place both the image and the text in a 
single block. If you create two separate columns the images will stack first and 
the text afterwards. In order to get your email to behave like the one in the 
example, the JSON has to look something like this:

```javascript
{
    "type": "columns",
    "columns": [{
            "blocks": [{
                    "type": "image",
                    "src": "http://vicinity.picsrv.net/9259/image.jpeg"
                },

                {
                    "type": "html",
                    "content": "<p>Example text.</p>"
                }
            ],
            "size": "6",
            "background": {
                "color": "rgba(0, 0, 0, 0)"
            }
        },

        {
            "blocks": [{
                "type": "image",
                "src": "http://vicinity.picsrv.net/9259/image.jpeg"
            }, {
                "type": "html",
                "content": "<p>Example text.</p>"
            }],
            "size": "6",
            "background": {
                "color": "rgba(0, 0, 0, 0)"
            }
        }
    ],
    "background": {
        "color": "rgba(0, 0, 0, 0)"
    }
}
```

All content in columns will collapse downward starting with the column furthest 
to the right. This means that the content in the first column (on the left side) 
will always be the content that is shown first on mobile devices. Even when you 
have twelve columns in a single row they will all collapse and scale towards the 
full width of the smartphone. Always keep this in mind when using columns in the 
ResponsiveEmail.com service. 
