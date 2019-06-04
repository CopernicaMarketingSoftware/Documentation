# CSS in Publisher

Cascading Style Sheets, commonly referred to as CSS, are designed to separate 
styling and HTML document content. With CSS you can specify rules for different 
types of HTML structures to customize the size and colour of your fonts, the alignment 
of headers, the bullet type of an unordered list, borders around fields and much more.

The **Style** component in the Publisher allows you to create your own 
CSS, starting from scratch or a standard style sheet to get you started. 
The standard style sheet contains clear comments (starting with /\* and ending with 
\*/) to immediately get you familiar with the possibilities of CSS.

Since CSS is a widely used technology this article will simply discuss its 
application within our software. For more CSS resources see the 
[more information](./css#more-information) section.

## Creating and managing stylesheets

Webforms, feeds and surveys offer a default style sheet. To apply your own 
style simply go to the **Style** component to create a new stylesheet or edit 
the deafult stylesheet. Note that the stylesheet is not linked to
the webform specifically, but to the web page or template publishing it. 
You can link a style sheet to a page, document or template through 
its context menu. The same applies to stylesheets for surveys and feeds.

## Testing and previewing stylesheets

You can test your custom stylesheet by selecting a template, mail, webform, 
survey or feed in the **Content** component. After selecting the relevant entity 
the **Preview** tab allows you to select a stylesheet to preview.

![Preview style or xslt](../images/previewstyleorxslt.jpg)

Here you can view what the content looks like to your users when styled with 
the chosen CSS or [XSLT](./xslt).

## Linking stylesheets

To use a stylesheet with your document or template, find the
option **Set style...** in the template or document menu. Once you have
linked a style sheet, an additional tab **Style** is added above the
document or template. You can also edit the rules for this stylesheet directly 
from this window. Since this changes the stylesheet itself, the changes will 
also be applied to any other entity linked to this stylesheet.

## (In-line) CSS in emailings

Because some important email clients can not (or refuse to) handle
CSS styling properly Copernica offers the possibility of automatically 
converting potentially problematic elements to use in-line CSS. This means 
that the styling from the stylesheets is inserted directly into the HTML 
source code. By allowing this conversion to in-line CSS there is a higher 
probability the clients will handle your CSS properly and display the 
email exactly as intended.

When setting the style for your document, you are presented with a few
options:
-   Choose to maintain the style blocks. The stylesheet and headers will 
    not be altered and no conversion to inline attributes will take place.
-   Choose *'replace style blocks to style= attributes*' to make the
    document or template suitable for most email clients.
-   Choose the third option to keep the block styles *and* convert
    them to inline attributes.

## More information

Articles on styling in Publisher:
* [Styling in Publisher](./emailing-publisher-styling)
* [XSLT](./xslt)

External resources:
* [Mozilla's introduction to CSS](https://developer.mozilla.org/en-US/docs/Learn/CSS/Introduction_to_CSS) 
* [CSS tutorial from tutorialspoint](https://www.tutorialspoint.com/css/)


