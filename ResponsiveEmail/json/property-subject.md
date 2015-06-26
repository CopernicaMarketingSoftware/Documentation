# Property subject

The `subject` property is used in the input JSON object,
to set the subject of the mail. 
The subject must be a string value. For the best readability
in email clients, it is recommended keep your subject line to 50 characters
or less.

## Example


````json
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
````


## Related information

The subject line is stored in the header of the email. Other [top level properties](copernica-docs:ResponsiveEmail/json/top-level-properties) to change the mime header of the generated mime are for example [`from`](copernica-docs:ResponsiveEmail/json/property-from), [`to`](copernica-docs:ResponsiveEmail/json/property-to), [`replyTo`](copernica-docs:ResponsiveEmail/json/property-reply-to), [`cc`](copernica-docs:ResponsiveEmail/json/property-cc) and the property [`headers`](copernica-docs:ResponsiveEmail/json/property-headers).