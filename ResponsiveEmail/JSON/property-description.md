# Property description

The property <code>description</code> is an optional property that can be
used to attach a human readable description to the template. The description
does not have any influence on the generated HTML code, and it will
not appear inside the email.


## Example


The following input JSON contains a very simple example template the top two properties are
its <code>name</code> and <code>description</code>. Both the <a href="/support/json/property-name"><code>name</code></a>
and  <a href="/support/json/property-description"><code>description</code></a>
properties are meta properties that are not used by the API to generate the
email, but that may be helpful to identify and/or describe the template.
````json
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

The property <a href="/support/json/property-description"><code>description</code></a> can be used
to set a human readable description in the template. Both the name and
the description are <a href="/support/json/top-level-properties">top level properties</a>.
