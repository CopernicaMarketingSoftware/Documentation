# Create MIME with the REST API

If you use the [send method of the REST API](rest-send) to send email,
you normally include a "mime" property holding the full MIME object
that you want to send. However, you can also let SMTPeter create the
MIME string for you. If you do not include a "mime" property in your
request, but use separate "subject", "text", "html" and so properties,
the MIME is created by SMTPeter. The following table lists all 
supported propreties:

<table>
    <tr>
        <td>from</td>
        <td>"From:" header</td>
    </tr>
    <tr>
        <td>to</td>
        <td>"To:" header</td>
    </tr>
    <tr>
        <td>cc</td>
        <td>"Cc:" header</td>
    </tr>
    <tr>
        <td>subject</td>
        <td>Subject of the mail</td>
    </tr>
    <tr>
        <td>text</td>
        <td>Text version of the mail</td>
    </tr>
    <tr>
        <td>html</td>
        <td>HTML version of the mail</td>
    </tr>
    <tr>
        <td>unsubscribe</td>
        <td>The "list-unsubscribe" header</td>
    </tr>
    <tr>
        <td>extra</td>
        <td>Extra "x-*" headers</td>
    </tr>
    
    <tr>
        <td>attachments</td>
        <td>Attachments to be added to the mail</td>
    </tr>
</table>
    

## Email addresses

The "from", "to" and "cc" fields decide which email addresses are going
to appear in the MIME object. The "from" variable must be a **single** email 
address, but there is no limit for the number of addresses that you use
for the "to" and the "cc" fields.

The notation for the email addresses in the "from", "to" and "cc" fields
is much more flexible than for the "envelope" and "recipient" fields. 
You can include display names or use angle brackets, and for the "to" and 
"cc" fields you can also use comma separated lists. Note that the address 
set in these "from", "to" and "cc" fields just decide what addresses are 
included in the MIME data, and do not have to be identical to the 
addresses used in the "envelope" and "recipient" fields (although it
is good practice to send email to the addresses mentioned in "to").

````json
{
    "from": "info@example.com",
    "to": [
        "one@example.com",
        "two@example.com",
        "\"Number three\" <three@example.com>, info@example.com"
    ],
    "cc": "John Doe <johndoe@example.org>"
}
````

## Subject, text and HTML

The "subject", "text" and "html" properties can be used to set the
subject line of the email, and the text and HTML version. The properties
are self-explanatory.

````json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the email"
}
````

## Unsubscribe header

If you want to add a "list-unsubscribe" header to your email, you can 
add the JSON "unsubscribe" option. You can set it to a string holding
either a URL or an email address, or an array holding both:

````json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the email",
    "unsubscribe": "unsubscribe@example.com"
}
````

You can also set it to a URL:

````json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the email",
    "unsubscribe": "http://www.example.com"
}
````

Or to both an email address and a URL:

````json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the email",
    "unsubscribe": [ "http://www.example.com", "unsubscribe@example.com" ]
}
````

## Extra "x-*" headers

The "extra" property can be used in case you want to add custom headers
to your email. To ensure that your custom headers do not conflict with
other headers, you may only add headers with a "x-*" prefix.

````json
{
    "subject": "this is the subject line",
    "html": "<html> .... </html>",
    "text": "text version of the email",
    "extra": {
        "x-my-identifier": "abcdefg",
        "x-custom-property": "custom"
    }
}
````

## Attachments

With the "attachments" property you can attach files to your mailing. SMTPeter
expects an array with JSON objects. There are two types of objects that are
supported. For one you provide a link to the attachment that you want
to send and for the other you provide the data in the JSON object itself.
If you provide the data in the JSON, this data has to be base64 encoded.
Moreover, you can optionally specify the type of data that you send.

````json
{
    "attachments": [ 
        {
            "url": "https://www.example.com/attachment1.pdf"
        }, 
        {
            "data": "VGhpcyBpcyBqdXN0IGFuIGV4YW1wbGUgdGV4dCBmaWxlLi4=",
            "name": "test.txt",
            "type": "text/plain"
        } 
    ]
}
````

