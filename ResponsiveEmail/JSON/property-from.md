# Properties from and replyTo

The visible _from_ address, and the visible _reply-to_ address are the address
of the sender of the email, and the address that is used when the receiver
of the email presses the 'reply' button. In the input JSON object, you
can set these properties through the <code>from</code> and <code>replyTo</code>
properties.

Although all properties in the JSON are optional, you are strongly advised
to include at least a *from* address. Not having a from address in an email
is generally not a good idea, as your email will then most likely be rejected
by the spam checking routines of email clients. The *reply-to* address on the
other hand is fully optional, and mostly not needed. Only if you want to use a
different address to be used when someone replies to an email than the address
of the sender, you can include a `replyTo` property in the JSON.

Both the `from` and `replyTo` properties can be JSON objects holding
properties for the name and the email address. However, you can also
set the `from` and `replyTo` properties to string values holding
email addresses.

## Examples
<pre><code>
{
  "name": "My template",
  "from" : {
    "name" : "Name 1",
    "address" : "info@example.org"
    },
    "replyTo" : {
      "name" : "Name 2",
      "address" : "reply-to@example.org"
    },
  "subject": "I am the best example",
  "background": {
    "color": "#FC00CA"
  },
  "content": {
    "blocks": [{
      "type": "text",
      "content": "Hello I am the best example text!"
    }, {
      "type": "image",
      "src": "http://www.example.com/best-example.gif"
    }]
  }
}
</code></pre>

The above code shows the recommended way of setting the from address
and the reply-to address: as JSON objects with the name and
email address as nested properties. But you can also assign string
values:

<code><pre>
{
  "name": "My template",
  "from" : "info@example.org",
  "replyTo" : "reply-to@example.org",
  "subject": "I am the best example",
  "background": {
    "color": "#FC00CA"
  },
  "content": {
    "blocks": [{
      "type": "text",
      "content": "Hello I am the best example text!"
    }, {
      "type": "image",
      "src": "http://www.example.com/best-example.gif"
    }]
  }
}
</code></pre>
## Related information

The sender addresses are stored in the header of the email. Other <a href="/support/json/top-level-properties">top level
properties</a> to change the mime header of the generated mime are for example
<a href="/support/json/property-subject"><code>subject</code></a>,
<a href="/support/json/property-to"><code>to</code></a>,
<a href="/support/json/property-cc"><code>cc</code></a> and the property
<a href="/support/json/property-headers"><code>headers</code></a>.
