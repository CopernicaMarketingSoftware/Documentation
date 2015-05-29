# Property attachments

The ResponsiveEmail.com API allows you to add attachments to your emails. Attachments
are defined in the MIME properties and will therefore only show when the
<a href="/support/api/get-template-mime" title="API method to get MIME version">MIME version</a> 
of your email is retrieved. Attachments are stored in an array, which makes
it possible to add as many attachments to an email as you want. You can either place
the data of your attachment directly in the json (base64 encoded) or you provide an url
to your data.

<table class="info">
    <thead>
        <tr>
            <td colspan="3">Background properties</td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Value</td>
            <td>Description</td>
        </tr>
        <tr>
            <td>url</td>
            <td><em>string</em></td>
            <td>Url to your data, this will be downloaded and included</td>
        </tr>
        <tr>
            <td>data</td>
            <td><em>string</em></td>
            <td>The raw data of your attachment, this has to be base64 encoded</td>
        </tr>
        <tr>
            <td>name</td>
            <td><em>string</em></td>
            <td>The name for your attachment, this will be visibile in most email clients</td>
        </tr>
        <tr>
            <td>type</td>
            <td><em>string</em></td>
            <td>The content type for this file, this is ignored in case you provide your attachment by url as it'll look at the http headers</td>
        </tr>
    </tbody>
</table>

## Example Code
<pre><code>
    {
        "from" : "info@example.com",
        "subject" : "Here are some example attachments",
        "attachments": [ {
            "url": "https://www.example.com/attachment1.pdf",
            "name": "example-1.pdf"
        }, {
            "data": "VGhpcyBpcyBqdXN0IGFuIGV4YW1wbGUgdGV4dCBmaWxlLi4=",
            "name": "test.txt",
            "type": "text/plain"
        } ],
        "background": {
            "color": "#f3f3f3"
        },
        "content": {
            "blocks": [ {
                "type": "text",
                "content": "This is example text"
            }, {
                "type": "image",
                "src": "http://www.example.com/example.jpeg"
            } ]
        }
    }
</code></pre>
