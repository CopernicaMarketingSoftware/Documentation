# Property content

The `content` property is a deeply nested string property that is used
inside [text blocks](../json/block-text) and [HTML blocks](../json/block-html). It holds the actual 
text or HTML content. If used inside a [HTML block](../json/block-html), 
the content may contain HTML code. If you do supply HTML, we advise to only use simple 
and straightforward HTML elements like `<p>`, `<b>`, `<i>`, `<a>`, etc. More 
complex tags might cause compatibility issues across different email clients. 
You must also make sure that the HTML code that you supply is valid, and does 
not accidentally contain unclosed HTML tags or characters.

When the `content` property is used in a [text block](../json/block-text),,
the use of HTML is not possible. In fact, all HTML code is then automatically
escaped, so you do not even have to worry about accidentally inserting
HTML characters like `<` and `&`, because such characters are 
automatically escaped by the Responsive Email API.

## Example

The following JSON input shows an example how to a text block and a HTML
block with the `content` propery.

```javascript
{
    "from" : "info@example.com",
    "subject" : "Email with only one text block",
    "content" : {
        "blocks" : [ 
            {
                "type" : "html",
                "content" : "<p>Example <b>HTML</b> code</p>"
            }, 
            {
                "type" : "text",
                "content" : "Example textual content"
            }
        ]
    }
}
```
