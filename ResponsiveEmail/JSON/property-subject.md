# Property subject

The `subject` property is used in the input JSON object,
to set the subject of the mail. 
The subject must be a string value. For the best readability
in email clients, it is recommended keep your subject line to 50 characters
or less.

## Example
<pre><code>
{
  "name": "My template",
  "from": "info@example.com",
  "subject": "You have won this weeks' bingo!",
  "background": {
    "color": "#f3f3f3"
  },
    "content": {
      "blocks": [{
        "type": "text",
        "content": "Congratulations with your prize!"
        }, {
          "type": "image",
          "src": "http://www.example.com/bingo.gif"
        }
      ]
    }
}
</code></pre>

## Related information

The subject line is stored in the header of the email. Other <a href="/support/json/top-level-properties">top level
properties</a> to change the mime header of the generated mime are for example
<a href="/support/json/property-from"><code>from</code></a>,
<a href="/support/json/property-to"><code>to</code></a>,
<a href="/support/json/property-reply-to"><code>replyTo</code></a>,
<a href="/support/json/property-cc"><code>cc</code></a> and the property
<a href="/support/json/property-headers"><code>headers</code></a>.
