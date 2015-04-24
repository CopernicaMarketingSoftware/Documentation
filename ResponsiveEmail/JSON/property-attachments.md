# Property attachments

The ResponsiveEmail.com API allows you to add attachments to your emails. Attachments
are defined in the MIME properties and will therefore only show when the 
<a href="/support/api/get-template-mime" title="API method to get MIME version">MIME version</a> 
of your email is retrieved. Attachments are stored in an array, which makes 
it possible to add as many attachments to an email as you want.

## Example Code

    {
        "from" : "info@example.com",
        "subject" : "Here are some example attachments",
        "attachments": [ {
            "url": "https://www.example.com/attachment1.pdf",
            "name": "example-1.pdf"
        }, {
            "url": "https://www.example.com/attachment2.gif",
            "name": "example-2.gif"
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
