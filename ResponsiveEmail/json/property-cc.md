# Properties `to`, `cc` and `bcc`

All addressees of an email are set in the [`to`](../json/property-to), 
[`cc`](../json/property-cc) and [`bcc`](../json/property-bcc)
fields of the MIME header. In the input JSON object, you can use the JSON properties
with similar names to specify the addresses to which the email should be sent.

Because a single email can be sent to many different receivers, the responsive 
API is flexible in reading the input: the input JSON may contain a single receiver, 
but also long lists of receivers stored in arrays. The number of receivers in 
the input JSON is not limited.

## `to` and `cc` headers

With the `to` and `cc` properties you specify the `to` and `cc` headers in the 
MIME message. This however does not necessarily mean that the mail is going to 
be sent to these addresses as well. The email protocol allows you to include a 
`to` and `cc` header in your mail, but send the message to a completely different
address (although this is not considered to be a good practice). This also is 
possible with the responsive API: the addresses that you set in the `to` and `cc` 
fields do not have to match the addresses to which you will eventually send 
the email.

## The `bcc` header

The `bcc` field is supposed to be a hidden field. When you send an email, it will 
be stripped out of the mail so that the receiver does not know to whom the mail 
was blind-carbon-copied. If you use the API to only generate a responsive email, 
we will generate a MIME message that still has all the bcc headers, and it is up 
to you or up to your mail server to strip the bcc headers before the mail reaches 
the receiver.

If you use the responsive API not only to generate emails, but also to send them,
we take care of stripping the _bcc address_. In such situations it is not needed 
to set the `bcc` property, as it will automitically be  stripped from the mail 
before it is sent.

The `to`, `cc` and `bcc` properties can all be set to different types of values.
You can directly assign a string value containing an email address, or a JSON 
object with a `name` and `address` property. If you want to include more than one 
addresses, you can also use array values.

````javascript
{
    "name": "My template",
    "from": "info@example.com",
    "to" : "info@example.org",
    "cc" : {
        "name" : "John Doe",
        "address" : "johndoe@example.org"
    },
    "bcc" : [
      "secret@example.org",
      {
          "name" : "Hidden Name",
          "address" : "secret2@example.org"
      }
    ],

    "subject": "I am an example subject",
    "background": {
      "color": "#f3f3f3"
    },
    "content": {
      "blocks": [{
        "type": "text",
        "content": "This is text is an example"
      }, {
        "type": "image",
        "src": "http://www.example.com/examplary.gif"
      }]
    }
}
````

The above example shows the different ways how you can set the `to`, `cc` and `bcc`
properties: as string value, as object value or as an array. The array in turn may
contain string values as well as objects. The ResponsiveEmail API will
recognize the input format that you specify.

## Related information

The destination addresses are stored in the header of the email. Other [top level properties](../json/top-level-properties) 
to change the mime header of the generated mime are for example The destination 
addresses are stored in the header of the email. Other [top level properties](../json/top-level-properties) 
to change the mime header of the generated mime are for example [`subject`](../json/property-subject), 
[`from`](../json/property-from), [`replyTo`](../json/property-reply-to) 
and the property [`headers`](../json/property-headers).
