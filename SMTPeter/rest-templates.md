# REST API method: templates

Using the REST API of SMTPeter, it is possible to work with the templates that
you've made created. You can either fetch templates in different formattings and
create new templates. It is also possible to [send an email](rest-send) using
these templates.

## Fetch templates

````text
https://www.smtpeter.com/v1/templates/{start}/{length}
````

To fetch a list of existing templates, you use the "templates" method. This
method is only available using the HTTP GET method. The url may contain a start 
and length value, if these are not supplied the default values of 0 and 100 are
used. This functions returns a value in the following format:

````json
[
    {
        "id"    : 1,
        "name"  : "Test email"
    }
    {   "id"    : 2,
        "name"  : "Test 123"
    }
]
````

## Fetch a single template

````text
https://www.smtpeter.com/v1/template/{ID}/{format}
````

To fetch a single template, you use the "template" method. This version of the 
method is only available via the HTTP GET method. You must provide the identifier
of the template, the format is optional. When the format is not provided, JSON formatting is used. The following formats are available:

- json: return the template in JSON format;
- html: return the template in HTML format, optimized for email clients;
- webversion: return the template in HTML format, optimized for web clients;
- mime: return the template in MIME format, with externally hosted images;
- embedded: return the template in MIME format, with embedded images;
- text: return the text version of the template.

You can provide extra personalization variables in the GET request, these will
be use to personalize the template. If no variables are provided, the template
will not be personalized.

## Create a template

````text
https://www.smtpeter.com/v1/template/{format}
````

To create a new template, you use the "template" method. This version of the method 
is only available using the HTTP POST method. To create a new template, you simple
POST the entire JSON of your template to this end point. The API will return a link
to the new template in the Location header and the identifier in the output JSON.
Optionally, you can provide an output format for the Location header.
By default, HTML is used.

Example request:

````json
POST /v1/template/?access_token=yourtoken
Host: www.smtpeter.com
Content-Type: application/json

{ "name" : "template..." }

HTTP/1.1 201 Created
Location: https://www.smtpeter.com/v1/template/2/html?access_token=yourtoken
Content-Type: application/json

{ "id" : 2 }
````
