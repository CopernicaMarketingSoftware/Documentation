# API method POST /v1/template

Method to store a template on the ResponsiveEmail.com servers. You simply POST
the entire JSON of your template to this end point. The API will return a link
to your new template in the Location header and in the id property in the output
JSON.

## Example request

```http
POST /v1/template/?access_token=yourtoken
Host: www.responsiveemail.com
Content-Type: application/json

{ "name" : "template..." }

HTTP/1.1 201 Created
Location: https://responsiveemail.com/v1/template/2/html/?access_token=yourtoken
Content-Type: application/json

{ "id" : 2 }
```

## Related information

After you've created the template, you can use GET methods to retrieve the 
[MIME](api/get-template-mime),
[HTML](api/get-template-html), 
[webversion](api/get-template-webversion) and
[text](api/get-template-text) 
representation of the mail.
