The software allows you to link to PDF files in two different ways. You
can also send a personalized PDF file as an email attachment in a mass
mailing.

### Option 1. The linkpdf function

If you have imported a PDF document into the application, it can easily
be linked from an emailing or a web page by using a special tag.

One of the advantages of this way of linking is that you will be able to
keep track on who exactly downloaded your PDF document.

**Use the tag as follows:**

If linking from the template source:

`{linkpdf template="myTemplate" document="myDocument"}`

If any personalization code is being used inside the PDF document, the
download is automatically personalized with data from the target profile
or subprofile.

**Note:**by default, URLs included in documents with {linkpdf} tag are
html-escaped. To turn off this behavior, add the escape=false attribute
to the tag: {linkpdf escape=false}.

The tag only generates an internet address that's unique for each
recipient. To link the file in a document or template, wrap it in an
html anchor tag.

`<a href="{linkpdf template='myTemplate' document='myDocument'}">Download your PDF</a>`

### Option 2. Upload the file to the files folder

Each document and template has its own files and images folder whereto
you can upload your PDF file (you can access this folder from the
template and document menus). Alternatively you can upload you file to a
[media
library](./using-media-libraries-to-centrally-store-files-and-images).
Upload your PDF file to the files folder and then link to the file as
follows:

`<a href="namepdf.pdf">Download PDF</a>`

or (from a media library)

`<a href="name of medialib/namepdf.pdf">Download PDF</a>`

PDF files linked this way are NOT personalized!

### Option 3. Send the file as an email attachment

-   Choose **Attachments**from the **Documents menu**.
-   Choose **Add PDF Attachment**, select the file

Each recipient will find the (personalized) PDF attached to your email.
Please do not attach large files in large mailings, as this will
significantly slow down your mailing.
