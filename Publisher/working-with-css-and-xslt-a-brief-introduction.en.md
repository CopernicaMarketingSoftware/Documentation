When you're working in our software, you will occasionally come across
the terms 'CSS' and 'XSLT'. Both can be used to manipulate the
appearance of your web forms, feeds and surveys used within your
campaigns. Both are standard techniques and the building blocks of what
your campaign will look like. CSS and XSLT are not the same however.
This article will do an attempt to explain the difference between the
two.

What can you do with CSS?
-------------------------

CSS (Cascading Style Sheet) is used to change the appearance of HTML
elements that are already there

-   Change the colour and font size of each paragraph
-   Give every image used in a document a red border
-   Centrally align all headers
-   Change the bullet type of an unordered list
-   Give a web form text field those neat rounded borders
-   Et cetera.

The software uses a default CSS file to display web forms, surveys and
content feeds created within the software. You are of course free to
edit these style sheets to manipulate the appearance of your web form,
feed or survey.

### Creating your own CSS or work with the default

Web forms, feeds, surveys always have a default style sheet. If you wish
to modify their rules, or create your own style sheet, you can do so
under Style. The default style sheets come with lots of comments that
will help you modifying it. Note that a stylesheet is not linked to a
web form, but to the web page or template whereon you have published it.
You can [link a style
sheet](http://www.copernica.com/en/support/email-templates-and-css-stylesheets)
to the page, document or template through its context menu. The same
applies to stylesheets for surveys and feeds.

![](Documentation/new-css.png)

### What can you do with XSLT?

Web forms, surveys and content feeds are built upon XML. The XML file
contains the data, and describes what kind of data it is. The XSLT
(Extensible Stylesheet Language Transformations) is then used to
transform the data from the XML to the mark-up language readable for the
internet browser: HTML. So, what can you do with XSLT?

-   All titles should be placed within HTML  header tags \<h1\>
-   A paragraph should be placed within HTML paragraph tags
-   Give an image a CSS class
-   The publish date of an article should not appear in the HTML
    document. The author of the article must appear below the article.
-   [Remove the \#-sign](#)that is placed before each survey question.
-   Et cetera….

![](Documentation/xslt-image.png)

The software adds a default XSLT to all content feeds, surveys and web
forms. Therefore making your own XSLT is not required to publish Content
with the application. But you are of course free to do so, or adjust the
default stylesheets to your own needs.

### Working with the default XSLTs

The default XSLT has been designed to accommodate most users and file
types. Developing one can be a difficult and time consuming process, and
we believe the default will make developing one yourself unnecessary for
most accounts. By not adding an XSLT to a publication, the default will
apply itself to all content. Publication would be done by the regular
coding:

> `{feed name="my_feed"}     {survey name="my_survey"}     {webform name="my_webform"}`

### Working with a custom XSLT

The default XSLT 's for all file types is available as example code when
you create a new file, to serve as a base for your own XSLT if you wish
to develop one.

To create your XSLT, go to the **Style** section in the software.

![](Documentation/new-xslt.png)

Once you have created your own XSLT it can easily be attached to the
item where you have created the XSLT for. This is done by adding the
*xslt=* parameter to the tag to publish the item.

> `{feed name=my_feed xslt=myxslt}     {survey name=my_survey xslt=myxslt }     {webform name=my_webform xslt=myxslt }`

Further reading
---------------

XSLT programming is quite complex, and requires specific knowledge. Much
can be found on the internet about XSLT's, since it is a standard
technology. For example
[http://www.w3schools.com/xsl/](http://www.w3schools.com/xsl/) provides
a comprehensive guide.
