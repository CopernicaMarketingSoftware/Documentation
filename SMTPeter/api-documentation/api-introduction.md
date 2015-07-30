# API Introduction

SMTPeter offers two different ways to send email: through our SMTP API or our REST API. 
The SMTP protocol is the traditional protocol mail programs use to communicate with
each other, while REST is a protocol built on top of HTTP, the protocol of the web.


## The SMTP protocol

The SMTP API uses the SMTP protocol, the standard protocol that is normally used by 
mail servers to communicate with each other. If you want to send your mail through 
SMTPeter, you can of course use this protocol to inject your mails.

The SMTP protocol is very "chatty" - a lot of handshaking and negotiating
goes on between the server and the client, and it does not easily allow to pass
tuning parameters on a per-message level. It therefore is ofter more efficient to 
use the REST API instead. However, if you do want to use the SMTP API, please check 
our documentation for more details and examples on how to submit email and enable 
SMTPeter's features using SMTP. 

[Read our SMTP API Documentation](copernica-docs:SMTPeter/api-documentation/smtp-api "SMTP API documentation")


## The REST protocol

The REST API uses the the HTTPS protocol, this protocol is the foundation of data communication 
for the world wide web. It is faster than the SMTP protocol, because only a single
instruction has to be sent from your application to a SMTPeter web server to send out an email.

To send an email your application sends an POST request to the SMTPeter API endpoint. To keep 
your emails and API keys secure, SMTPeter only accepts mails via HTTPS (port 443). The API is not 
reachable over HTTP.

```txt
Host: www.smtpeter.com
Content-Type: application/x-www-form-urlencoded
Content-Length: 148

envelope=info%40example.com&recipient=john%40doe.com&subject=this+is+the+subject&html=This+is+example+text&from=info%40example.com&to=john%40doe.com 
```

The above example shows how to send a message using traditional HTTP POST variables. However, 
you may inject mails in JSON format as well. Be sure to set the 'content-type' header to 
application/json. SMTPeter recognizes many different variables via the REST API. You
may send full already formatted MIME messages, but you can also let SMTPeter generate
the mime.

With every call to the REST API, you must pass your personal API access token. To learn 
more about this API token, and for full documentation and examples on the variables
and content-types that are supported by the REST API, refer to the online documentation.

[Read the REST API Documentation](copernica-docs:SMTPeter/api-documentation/rest-api "REST API documentation")

