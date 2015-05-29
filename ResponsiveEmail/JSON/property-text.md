# Property `text`

The toplevel property `text` enables you to include a text version of the email in your JSON document. 

Responsive emails are created with HTML and CSS. For email clients that
do not supported HTML, you can include a pure text version of the mail
as well. This text version can be set in the input JSON as a [top level propery](/support/json/top-level-properties).

The text version is normally not 
visible because the majority of the email clients nowadays support HTML. 
However, we still strongly advise to manually set a text version, because 
the text version is often used to show the summary of an email, or in very 
small devices like those modern age Apple watches and Google glasses. 
Sending along a text version allegedly improves email deliverability.

## Example
````json
    {
        "from" : "info@example.com",
        "subject" : "An email with a HTML and text version",
        "text" : "This is the text version of the mail",
        "content" : {
            "blocks" : [ {
                "type" : "html",
                "content" : "<p>This is the <strong>HTML</strong> version of the mail</p>"
            } ]
        }
    }
````

The above example shows the HTML input that will be transformed into a
responsive email with two alternate versions: a pure text version and a HTML
version. Depending on the capabilities of the email, one of the two
versions will be shown.


## See also

Besides the text version, your email should of course also have a fully 
formatted HTML version. This can be set using the 
<a href="/support/json/property-content"><code>content</code> property</a>.
