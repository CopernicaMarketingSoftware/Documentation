# Text tags

If you're writing your own HTML template you can use [text] tags in the 
source code to create a text block. The tag is meant to help with the 
structure of your document and indicates where text can be placed when making the document.

![](../images/textblockcode.png)

Copernica recommends naming all tags you use in a document with a *name* 
attribute. This will ensure that your documents remain intact when you 
change the order of the tags or decide to add a new one to add more content. 
By using a *name* attribute you can find the correct blocks in the template 
from the text on document level, even if you do change the template and 
the order of the tags.

`[text name="example"]`

Make sure to always name the blocks something unique. 

## The editor

On document level you can place text wherever a [text] tag occurs in the 
source code of the template. For most people it is sufficient to use 
the *what-you-see-is-what-you-get* editor, where layout can be handled 
easily without affecting readability too much. This is especially useful 
for people with simple needs or little knowledge of HTML.

However, it is also possible to use the raw HTML editor. In this case the 
editor of the document will write the HTML code included in the [text] tags 
themselves. If you already know the maker of the document will prefer the 
HTML editor you can indicate this in the text tag as shown in the following 
line of code:

`[text name="example" editor="poor"]`

The *what-you-see-is-what-you-get-editor* has been named the "rich" editor, 
because it has many tools and buttons to help you enrich your text boxes. 
The HTML editor, which is the opposite, is called the "poor" editor.

## Start and end code

It's also possible to add two attributes *begin* and *end* to the [text] 
tag. The *begin* and *end* attributes are added to the start and end of 
the HTML code respectively, but only if the text block is used. They 
are used like this:

`[text name="example" begin="<b>" end="</b>"]`

In this example the text is made bold, but it's also possible to put the 
whole text in italics or between quotes, for example.

## More information

* [Templates](./templates)
* [Publisher templates](./publisher-templates)
* [Websites](./websites)
* [Loop tag](./loop-tag)
* [Image tag](./image-tag)
