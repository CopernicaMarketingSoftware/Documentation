# Image tags

If you're writing your own HTML template you can use [image] tags in the 
source code to create an image block. The tag is meant 
to help with the structure of your document and indicates where images 
can be placed when making the document.

![](../images/imageblocktag.png)

Copernica recommends naming all tags you use in a document with a *name* 
attribute. This will ensure that your documents remain intact when you 
change the order of the tags or decide to add a new one to add more content. 
By using a *name* attribute you can find the correct blocks in the template 
from the image on document level, even if you do change the template and 
the order of the tags.

## Format

In the simplest case the image that is added by the document maker will 
be added to the template unaltered, even if this image is so large or small it will 
ruin the rest of the layout. However, there are different attributes to prevent 
this, such as the attributes for a minimum/maximum size and the attribute 
to force a size.

For example if you want to be sure the image is exactly 100x100 pixels 
you can enforce this with the following attributes in the [image] tag:

`[image name="example" width="100" height="100"]`

If the image does not match exactly it will be enlarged or made smaller. 
Besides the fixed *height* and *width* attributes there are the 
minimum and maximum height/width attributes, which specify minimum and 
maximum sizes. Using these you can specify that an image should be 
anywhere between 100x100 and 150x150 pixels, for example.

`[image name="example" minwidth="100" maxwidth="150" minheight="100" maxheight="150"]`

If an image does not satisfy these criteria they will be enlarged or 
made smaller, keeping as close to the original width/height ratio as 
possible.

## Optional images

If a template maker would use a regular [image] tag, but the document 
maker doesn't use it the space for the [image] tag would be empty, because 
it would be automatically replaced by a transparent image.

The [image] tag has an attribute to indicate that it is optional, however, 
meaning that an image will only be placed if the user explicitly adds an 
image for the tag. This option will make the tag look as following.

`[image name="example" optional="yes"]`

## Begin and end code

It's also possible to add two attributes *begin* and *end* to the [image] 
tag. The *begin* and *end* attributes are added to the start and end of 
the HTML code respectively, but only if the image block is used. They 
are used like this:

`[image name="example" begin="<div class=x>" end="</div>"]`

In this case a class is placed around the image, allowing the stylesheet 
to modify the layout of the image accordingly. It's also possible to 
add other HTML code to these tags.

## More information

* [Templates](./templates)
* [Publisher templates](./publisher-templates)
* [Websites](./websites)
* [Text tag](./text-tag)
* [Loop tag](./loop-tag)
