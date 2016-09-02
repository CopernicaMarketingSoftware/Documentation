The personalization settings allow you to configure the way how any
personalization must be handled or displayed by the application and the
e-mailings you send with this application.

You can modify the personalization settings directly from an active
document or template. If you have opened a template or a document, you
will find the **Personalization settings menu**in the lower toolbar.

![Personalization settings](../images/personalizationsettings.png)

### Document inherits template setting

Newly made documents automatically inherit the template personalization
settings. You can overrule these by changing the settings on document
level.

### Language and time zone settings

If the *date\_format* modifier is used in the document, the language and
time zone settings are used for converting the time stamp to the
appropriate language and time zone.

`{$smarty.now|date_format:"%A, %e %B  %Y"}`

### Encoding

Setting a character set is relevant in case the document contains texts
which uses special letters such as æ, ø, ê, ï, en ç. UTF-8 is the
dominant character encoding for e-mail. The Internet Mail Consortium
(IMC) recommends that all e-mail programs should be able to display and
create mail using UTF-8. Therefore, UTF-8 is the default encoding set in
Copernica.

When a different character set is set on document level, that setting
takes predominance.

### HTML Filtering

Templates, documents web pages and web forms can automatically be
filtered from HTML user input. The more technical term for this is
escaping.

Databases can contain a lot of user input which is retrieved via web
forms. Some users tend to use HTML to power up a comment or accidentally
copy/paste some HTML into a web form.

**Example**: someone may enter a HTML header tag into a web form field
and store the following value to your database field ‘Name’.

`<h1>John Smith`

This little piece of HTML code can seriously ruin your documents and
templates when the variable is used for template or document
personalization (like {\$Name}). Due to the fact that the tag is not
closed, all the textual content that comes after the used name variable
will have very large cow letters.

Escaping this potential vulnerable HTML code is pretty easy and can be
done manually with the smarty |escape modifier:

`{$Name|escape}`

However, you can also automate template and document escaping by
choosing ‘Filter HTML automatically’ from the personalization menu.
Newly made templates are by default set to filter HTML automatically.

### Extra personalization fields

If you have any extra personalization fields configured for your
template, these extra fields are automatically added to the
'personalization settings' menu. You will find these extra fields
directly above the other settings.
