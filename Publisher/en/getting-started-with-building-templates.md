Getting started with building templates
=======================================

An HTML template is the base to make e-mailings. See it is a blueprint
for email documents where you set the layout and style. HTML templates
work the same for web pages.

Creating your own template requires some knowledge of HTML. It is
advised to use a text editor to create a template, rather than using a
WYSIWYG editor (which is of course not prohibited, just, writing your
own HTML code gives you more control over the code).

[Notepad ++](http://notepad-plus-plus.org/) is a free open source text
editor and perfect for creating HTML files.
The best email templates are still built with tables. New techniques
can be better avoided completely. Please refer to our HTML email
template guidelines article for more information.

**No HTML knowledge or design skills, still want a great template?**
Refer to our Partner Program to search for a partner suitable for
this job.

### Using images in your template

Images should be stored in the same folder as the HTML template, not in
a different (child or parent) directory. You should refer to an image in
your template as follows:

`<img src="image.png" alt="alternative text"/>`

### Adding variable content blocks to your templates

Within HTML templates, content blocks can be used to add content to the
documents that will be based on the template.

-   **Text blocks** are used to add textual content to the
    document.
-   **Image blocks** are used to add images to the document
-   **Loop blocks** are used to iterate the content between its
    opening and closing tags.

### Using personalization in the template

**Smarty code** can be used within the template.

### Adding additional functions to the template

We recommend to add the **unsubscribe link** to the template (not
the document), to make sure it’s always present in the final mailing.
There are lots of additional functions available that can be used in
your template. Among them functions to add a *web version*, *mailonly*
and *web only*

-   **Complete list of available functions**

### Using stylesheets

You can use CSS within your HTML template. If you add block style rules
to your HTML header, you can later automatically transform them to CSS
inline rules.

-   **More info about converting CSS blocks to inline CSS rules**
-   **More about using CSS within your document**

### Importing the HTML template into the software

If you have images included, it is advised to create a zip file
that has both the HTML file and the used images included. Once you have
imported the template, the images are automatically added to the
template files and images folder.
The template import function can be found in the template context menu
under E-mailings.

### Template text version

Once you have imported the template into the software, you can add a
text version in the text version tab. It is however advised to create a
text version for the individual documents based on the template, not the
template itself.

### Testing the template

Your template may look good in your web browser. Unfortunately your
mailings will be viewed in different email clients, different and
out-dated browsers and increasingly on smartphones. And they all have
their own jim-jams on interpreting HTML and CSS and thus difficulties
displaying your email lay-out. It is therefore important to test your
final template/document thoroughly.
We have added a function to the software, that lets you test your
mailing in most browsers and email clients with great ease.

-   More information about the Litmus email preview