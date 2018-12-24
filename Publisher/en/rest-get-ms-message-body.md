# REST API: GET message body (Marketing Suite)

If you want to retrieve the body of a message sent with Marketing Suite 
you can send a GET request to the following URL:

`https://api.copernica.com/v2/ms/message/$id/body/$type?access_token=xxx`

where `$id` is the unique string that identifies a message and `$type` is 
the format for the message. Don't forget to add your access token! 
This method can not be called with a PHP script.

## Types

The message can be returned in three formats:

* **MIME**: Internet standard for email
* **HTML**: HyperText Language Markup/internet markup
* **Text**: Simple plain text

Depending on the format the output looks different. **MIME** includes all 
the headers for example, while **text** only shows the plain text. Include the 
desired type in the URL.

## More information

* [All API calls](./rest-api)
* [GET message](./rest-get-message)
* [GET message events](./rest-get-message-events)
