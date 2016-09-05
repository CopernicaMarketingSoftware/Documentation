If you have imported a PDF document into the application, it can be
linked from an e-mailing or a web page by using a special tag. The tag
has two required parameters: to specify the template and the document
that should be linked from the emailing or web page.

**{linkpdf template='myTemplate' document='myDocument'}**

PDF documents with variable content are personalized with (sup)profile
data when this tag is used to link to the document.

### Extra option

#### Escape URLs

URLs included in documents with a linkpdf tag are html-escaped. To turn
off this behavior, add the escape=false attribute to the tag.
