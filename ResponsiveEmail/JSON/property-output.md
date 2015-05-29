# Property `ouput`

The `output` property is a deeply nested property that can be used inside
the <a href="/support/json/property-visibility">`visibility`</a> property to specify
under which circumstances a block should be included in the mail.

The responsive email API can generate two versions of an email message based
on the same JSON input: a full MIME version that can be sent by email,
and a HTML only version that can be hosted on the web. This is very useful
if you want to include a "click here if you can not read this message" hyperlink 
in your email. You only want to include such a link in the email message, and
not in the web hosted version of the mail. 

This is exactly what the `output` property does. When the responsive API
is outputting the version for the web, it will not include the blocks that
have their `output` property set to "mailonly". And when it is outputting
the version to be emailed, it leaves out the blocks with `output`
set to "webonly".

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Supported values for the `output` property</td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Value</td>
            <td>&nbsp;</td>
            <td>Desc.</td>
        </tr>
        <tr>
            <td>"always"</td>
            <td><em>default</em></td>
            <td>The block is always included: for the web version and for the mail version.</td>
        </tr>
        <tr>
            <td>"mailonly"</td>
            <td></td>
            <td>The block is only included in the mail version.</td>
        </tr>
        <tr>
            <td>"webonly"</td>
            <td></td>
            <td>The block is only included in the web version.</td>
        </tr>
    </tbody>
</table>


## Example

The following JSON input can be used to generate an email with a hyperlink
to a web based version of the mail. This hyperlink is only included in the
mail when the responsive API outputs the mail version of the mail. The first
paragraph holds an apology for users who were unable to view the mail in
their email client, and this apology is only included in the web version.


````json
    {
        "from" : "info@example.com",
        "subject" : "Example email with a link to the webversion",
        "content" : {
            "blocks" : [ {
                "type" : "link",
                "label" : "Click here if you can not read this message",
                "link" : {
                    "url" : "http://www.yourdomain.com/my-self-hosted-webversion"
                },
                "visibility" : {
                    "output" : "mailonly"
                }
            }, {
                "type" : "text",
                "content" : "We're sorry that you were unable to read the mail in your normal email client.",
                "visibility" : {
                    "output" : "webonly"
                }
            }, {
                "type" : "text",
                "content" : "The actual textual content of the mail that is visible in both the web version of the mail as well as the mail that was sent."
            } ]
        }
    }
````


In the above example we've assumed that you're doing the hosting of the
web version of the mail yourself.
