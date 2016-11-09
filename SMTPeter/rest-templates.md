# REST API method: templates

The templates that can be managed via the dashboard, are also accessible
through the REST API. You can for example use the API to down templates in 
different formats, or you can edit or create templates using REST. It is also 
possible to [send an email](rest-send) using these templates.

## Fetch templates

To get a full list of all templates in your environment, you can simply
make a HTTP GET call to the following URL (you of course need to add your
API key to this URL):

````text
https://www.smtpeter.com/v1/templates/{start}/{length}
````

The "templates" method is only available using the HTTP GET method. The url may 
contain a start and length value to limit the list of templates that is returned. 
If these limits are ommitted, the default values of 0 and 100 are
used. This call returns a value in the following format:

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

For every template the unique identifier is returned, and the template name.
If you want to have more properties, you need to fetch a template based on
its unique ID.


## Fetching a single template

Once you know the ID of a template, the REST API can be used to fetch the
full template source with a "HTTP GET" call.

````text
https://www.smtpeter.com/v1/template/{ID}/{format}
````

You must provide the identifier of the template, but the format is optional. 
When the format is not provided, the template will be returned in JSON 
format. But you can also ask SMTPeter to return the template in other formats:

- json: return the template in JSON format;
- html: return the template in HTML format, optimized for email clients;
- webversion: return the template in HTML format, optimized for web clients;
- mime: return the template in MIME format, with externally hosted images;
- embedded: return the template in MIME format, with embedded images;
- text: return the text version of the template.

You can provide extra personalization variables in the GET request, these will
be use to personalize the template. If no variables are provided, the template
will not be personalized.


## Creating templates

To create a template you need to send a HTTP POST request to SMTPeter:

````text
https://www.smtpeter.com/v1/template/{format}
````

Inside the body data, you must pass the JSON source of your template. The
full specification of the supported properties can be found on the
[ResponsiveEmail.com website](https://www.responsiveemail.com).

The API returns a link to the new template in the "Location" header, and the 
output JSON. You can optionally pass a format to the URL, to tell SMTPeter
to redirect to an other URL instead. Note that this "format" option only 
changes the "location" header in SMTPeter's answer. If you want to store a 
new template, you must always send JSON data, no matter what formatting type
you pass to the URL.

Example request:

````json
POST /v1/template/html?access_token=yourtoken
Host: www.smtpeter.com
Content-Type: application/json

{ "name" : "template..." }

HTTP/1.1 201 Created
Location: https://www.smtpeter.com/v1/template/2/html?access_token=yourtoken
Content-Type: application/json

{ "id" : 2 }
````

