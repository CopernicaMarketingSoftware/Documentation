This is a really nice (and for some life saving) feature in Copernica.
If you have created a HTML template with block style elements, these
styles can automatically be converted to inline style attributes. This
conversion will take place when you send out the e-mailing. This has two
main advantages:

1.  The presentation of your template lay-out is centrally managed in a
    separate file (stylesheet). Any block elements from this external
    stylesheet will be converted to inline style attributes when your
    e-mailing is being prepared for sending.
     For example, if every paragraph with class ‘mainText’ in your
    template requires the same presentation (font color, font size et
    cetera), you only have to declare these properties once. Also, when
    you later decide to change its appearance, you will be able to
    manage this from the same location: all paragraphs with class
    ‘mainText’ in your template and document will automatically inherit
    these new properties.
2.  The CSS style conversion also applies to elements used within a
    [text] block. A new header or paragraph made with the text editor
    will inherit the styles automatically if the style is linked to a
    parent element.

### Create a style sheet

Go to the Style section in the software. Choose *New stylesheet* from
the stylesheet menu.

### Link the stylesheet to the template or document, choose the action

You can set the style of a document or template in the document or
template menu.

-   Choose to maintain the style blocks to leave the style blocks in the
    header or external style sheet in tact. No conversion to inline
    attributes will take place.
-   Choose 'replace style blocks to *style=*attributes' to make the
    document or template suitable for email clients.
-   Choose the third option to keep the block styles, and also convert
    them to inline attributes.

Once you have linked the stylesheet to the document or template, an exta
tab [style] will show up above the document. From here you can quickly
edit its content.

### Example of working with classes and a seperate style sheet

**The following examples explain how you can apply style rules to each
H1 header inside a text block.**

​1. In your template, give the parent HTML element of the text block a
class (in the example I named it ‘header’).

![headerfontsizetemplatesource.png](../images/2.png)

​2. Create a new stylesheet (or edit an existing one) and link it to the
template via the template menu \>**Set Style...**(choose ‘automatically
replace block elements with inline style attributes’)

![choosestylesheet.png](../images/1.png)

​3. After you linked the stylesheet to the template, an additional tab
**‘Style’** appears next to the 'template source' tab. In the example
below a new style rule is added to change the header's properties.

`td.header h1 {font-size:16px;}`

-   **td** refers to the **table cell**
-   **.header **refers to the **class ‘header’** which we have added to
    the table cell in the template
-   **h1** refers to the **HTML header tag**

**![applying stylesheet.png](../images/3.png)**

​4. The result is that all headers in a table cell with the class
‘header’ will get the properties you've defined in the stylesheet.

![headerinblock.png](../images/4.png)

The style will now be applied to all headers within the text block. Note
that it will not be visible in the rich text editor. When you save
changes, the CSS header style is directly applied in your document.

![thisisaheader2.png](../images/5.png)

**And this is how it will look like in the source code of the sent
e-mail:**

![thisisaheader3.png](../images/6.png)
