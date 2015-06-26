# Property name

The property `name` can be used to identify the template. This
is a meta property, and therefore does not have any effect on either
the headers or the contents of the email. This property can be
useful if you want to give a name to your template to easily identify it.

There are no restrictions to the name, and the name does not even have to
be unique (although it probably is a good idea to use unique names for your
templates). This is an optional property.

## Example

The following input JSON contains a very simple example template the top two properties are its `name` and `description`. Both the [`name`](copernica-docs:ResponsiveEmail/json/property-name) and [`description`](copernica-docs:ResponsiveEmail/json/property-description) properties are meta properties that are not used by the API to generate the email, but that may be helpful to identify and/or describe the template.


````javascript
    {
      "name": "Name of the template",
      "description": "Description of the template",
      "from": "info@example.com",
      "subject": "Example email",
      "background": {
        "color": "#f3f3f3"
        },
        "content": {
          "blocks": [{
            "type": "text",
            "content": "This is an example email"
            }, {
              "type": "image",
              "src": "http://www.example.com/logo.gif"
              }]
            }
    }
````


## Related information

The property [`name`](copernica-docs:ResponsiveEmail/json/property-name) can be used to give the template a name. Both the [`name`](copernica-docs:ResponsiveEmail/json/property-name) and the [`description`](copernica-docs:ResponsiveEmail/json/property-description) are [top level properties](copernica-docs:ResponsiveEmail/json/top-level-properties).