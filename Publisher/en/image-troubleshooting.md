Missing an image in your emailing that should be there?

If you have images that do not show up in your document check the
following

Is the image in RGB color mode? CMYK images may not work in internet
browsers. The color mode of an image can be checked in image editing
software such as Photoshop and Corel Draw.

Check if you have multiple image blocks and if they have the same name.
Different image blocks must carry different names.

Check if any strange characters are used in the image file name.
Internet browsers are more strict than operating systems such as
Windows. Make sure that only the following characters are used in the
file name: A-Z, 0-9, underscores (\_) and hyphens (-).

The image must have a file extension. The most common are .jpg .png and
.gif

Check if the image is shown conditional. Images can be made conditional
so that they are only visible to profiles if they match a certain
condition.
View the document in Edit mode, show variables. In this display
setting, all images should be visible in the active document. Images can
be made conditional in various ways:

-   Conditions tab in the image block - If the image block is inside a
    loop block, check if the loop is made conditional

-   With smarty code in the HTML template source.

**When I load an image into my document, it always becomes smaller than
the original size**
Look for the image block in the template. The size of an image in an
image block can be limited (maxwidth=)

**How can I limit the size of an image in an image block**
Add the following code to the image tag in your HTML template:
maxheight=100 maxwidth=100. In this way all images loaded in the image
block have a limited size of 100\*100 pixels.

**How can I adjust the properties of an image?**
In the image block, go to the Settings tab. Here you can adjust the
size of the image and enter the alternative text. This text is displayed
if the receiver of your email does not download the images in your
document. You may also adjust the size of individual images in the
settings tab of the image block.

**Can I use the same image in different templates and document?**
Yes, in the software go to Content and create a new Image library.
Upload the images to the library for usage in documents, templates,
surveys et cetera. The library has to be linked to each template or
document separately.

**How can I link to an image from my email template?**
In your HTML template you can refer to images uploaded to the images
folder or (linked media library) as follows: \<img src=”image.gif” /\>

**Background images and Outlook**
Microsoft’s Outlook Express does not support the use of background
images in HTML email and there is nothing we can do about that.

**What is pixel.gif?**
This is a ‘fake’ image that is used as a replacement when no other
image is loaded inside a image block. It is transparent and the size of
1 pixel.
Transparant pixels are also often used in HTML table lay-outs to create
small margins and paddings.  They are sometimes also referred to as
nixel.gif or spacer.gif.

**Can I use image maps in HTML templates?**
We would not recommend to use image maps in templates because they are
not vastly supported among email clients. If images are disabled or not
downloaded by the recipient the hyperlinks in the image map may not
function at all in some major clients.
