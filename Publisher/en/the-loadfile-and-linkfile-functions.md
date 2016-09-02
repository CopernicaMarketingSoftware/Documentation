These two functions allow you to load or link a file from the files
section under Profiles in your template or document.

Loadfile
--------

The loadfile function enables you to load a HTML file or text file from
the files section under profiles in a web page or email document.

The loadfile function has two parameters: file and fallback.

-   **File** is the input HTML or text file which should be loaded in
    the email or web document.
-   **Fallback** is the text or HTML code that should be displayed if
    the file could not be located.

`{loadfile file='path/to/profile/file.html' fallback='if not found display this'}`

**Supported file types are:**HTML(\*.html) and TXT (\*.txt) files

Linkfile
--------

The linkfile function can be used to link to a file from the files
section under profiles in a web page or email document.

`{linkfile file='path/to/profile/profilepicture.jpg' fallback='defaultimage.jpg'}`

**Supported file types**: zip, text/plain, text/html, pdf, doc,
Microsoft word 2007 files (docx), gif, png, jpeg, jpg, jpe

No fallback defined
-------------------

If the input file is an image with no fallback parameter and the file
cannot be linked or loaded, then only the filename will be displayed. If
a file with the same name exists in the template or **document files and
images folder**, this file will be displayed instead.

**Note:** both loadfile and linkfile cannot be used in a Content web
form text block
