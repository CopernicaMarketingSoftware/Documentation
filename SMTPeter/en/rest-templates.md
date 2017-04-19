# Managing templates

In SMTPeter's dashboard it's easy and convenient to manage your templates. 
All the templates are available by using the REST API. You can then use 
various methods to download, edit or create templates. And of course
you can [send email](rest-send) with the templates.


## Retrieve templates

Inside your SMTPeter environment you can retrieve the comprehensive list
of templates. Do this by making a *HTTP GET call* to the following URL 
(don't forget to add your API key):

```text
https://www.smtpeter.com/v1/templates/{start}/{length}
```

The template method is only available when making a HTTP GET call.
If you don't want to be porovided with all the templates, it's wise 
to limit the timeframe with `{start}` and `{length}`. The call gives 
back a JSON array in the following format:

```json
[
    {
        "id"    : 1,
        "name"  : "Test email"
    }
    {   "id"    : 2,
        "name"  : "Test 123"
    }
]
```

For every template a unique identifier and template name is given back. 
You can request multiple properties by providing a unique ID when doing 
an API call. 


## Request a specific template

You can use the REST API to request a specific template by using the 
HTTP GET call. Note that you need to have a specific ID from a certain
template.

```text
https://www.smtpeter.com/v1/template/{ID}/{format}
```

You can specify what format you want the returned content to be. You do
this by adding the parameter to the URL. The default format is JSON, 
other formats SMTPeter supports are:

- JSON: gives back the template in JSON format;
- HTML: gives back the template in HTML format, optimized for emailclients;
- Webversion: gives back the template in HTML format, optimized for webclients;
- MIME: gives back the template in MIME format, with externally hosted images;
- Embedded: gives back the template in MIME format, with embedded images;
- Text: gives back the text version from a template.

It's also possible to add extra personaliation variables in the GET method, because
then your templates will actually be personalized. 

## Creating templates

You can create a new template by using a HTTP POST method and sending it to SMTPeter:

```text
https://www.smtpeter.com/v1/template/{format}
```

Creating templates is done by adding the JSON code to the body of a POST request.
For all specificatons of the properties that can be used, you can take a look at:
[www.ResponsiveEmail.com](https://www.responsiveemail.com).

The API gives back a link of the new template in the location header. 
Accompanied a JSON object is also sent back, containing the template ID.
The data you put in the body must be JSON. It looks like this:

```json
POST /v1/template/html?access_token=yourtoken
Host: www.smtpeter.com
Content-Type: application/json

{ "name" : "template..." }

HTTP/1.1 201 Created
Location: https://www.smtpeter.com/v1/template/2/html?access_token=yourtoken
Content-Type: application/json

{ "id" : 2 }
```