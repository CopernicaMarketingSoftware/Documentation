Stylesheets are used to (centrally) manage the look and formatting of
HTML elements. Copernica allows you to create and manage stylesheets for
use in any publication in Copernica. When using CSS in your email
templates and documents, we can automatically convert your stylesheets
to inline CSS to make them also work with email clients that do not
support style blocks.

Creating and managing your stylesheets
--------------------------------------

The **Style** component allows you to create new stylesheets using the
*Stylesheet* menu.\
 The stylesheet is generic and contains tabs to create stylesheets for
general, RSS, Atom, surveys and web forms. **All in one file seperated
with tabs.**

You can compose each style sheet with example coding, or create an empty
stylesheet to start from scratch. The example CSS files comes with lots
of comments about the classes and how they can be manipulated.

![](Documentation/newstylesheet.png)

*The image shows a stylesheet created under style. The stylesheet is
easily linked to your template or document.*

### Link your stylesheet your template or document

To use the stylesheet with your document or template, find the so called
option in the template or document menu. Once you have linked a style
sheet, a new tab *Style* is added above the document or template. From
here you can instantly edit its rules. Note that the changes that you
make from here also affect other templates and documents that work with
this stylesheet.

![](Documentation/linkstyle-setconverting.png)

Convert CSS blocks to inline CSS
--------------------------------

Lots of email clients completely ignore style blocks between the
\<head\>....\</head\> tags in your email template. As a result, lots of
your subscribers would see your document without the CSS mark-up.

To solve this, your CSS rules must be added as inline attributes to the
HTML elements within the body of the document.

This of course eliminates the whole idea of using a centralized style
sheet. For your convenience we therefore added a functionality to the
software that automatically converts those CSS rules in the header or a
linked style sheet to inline attributes.

To do so, go to **Style** in the template or document menu, and choose
to **replace style blocks with inline attributes**.

After having done this, the software will do the conversion when the
email is being compiled (just before sending). So you will keep having
the advantages of working with a separate style sheet..

![](Documentation/style-template-source-code.png)

The template in the image has some styling added to the header. Is also
has a style sheet attached (hence the Style tab).

![](Documentation/css-is-converted.png)

In the sent email, the style rules have been converted to inline style
attributes.
