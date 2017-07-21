# HTTP and HTTPS

HTTP is short for HyperText Transfer Protocol. HTTPS is an extension on this 
protocol that enables you to send encrypted information, by combining HTTP 
with the SSL/TLS protocol.

HTTP is the protocol that is used for communication between a webclient 
and a webserver, both used on the internet and local networks. This protocol 
determines which requests can be send to the webserver. Each request also 
contains a URL to the webpage or an image on the web. HTTP also determines 
which responses can be given by a webserver.

An example of an HTTP request are the calls you can send with the [REST API](./rest-api). 
You can use these calls to send a request for information to the webserver 
and get a response.

## Types of requests

There are different types of requests that indicate what the client 
wants to achieve by contacting the server. There are the GET requests, which 
are used to request information, but there are also PUT and POST request 
used for adding new information or editing old information. With DELETE 
you can remove information and there are many more types of requests. 
A request always contains a URL and headerfields and sometimes a body.

## Types of responses

A response also consists of multiple parts: A code, header fields and 
a message. The codes indicate the result that was achieved. You might 
know the "404" code already, which indicates that the document that 
was requested does not exist. The response can give information about 
how a request was processed and give errors if something went wrong.

## HTTPS

HTTPS uses an encrypted connection to secure send your data. 
This prevents the wrong people from getting access to sensitive data 
such as phone numbers, addressses and social security numbers. Copernica 
offers the possibility to force HTTPS on your own websites (built in 
Publisher). If you use a Copernica domain you don't need to take 
any extra steps. If you use your own domain you can HTTPS by following 
these steps:

1. Apply for a SSL certificate of any type if you do not have one yet. You can find any company providing these on Google.
2. Request a dedicated IP address at Copernica if you do not have one yet. You can request the address with our Support team (support@copernica.com) for a small monthly fee.
3. Hand in the SSL certificate to our Support team along with its private key, the intermediate-certificate and the root-certificate. This is sensitive information, so don't send this unencrypted. You can also upload the certificate to a secure FTP server or send it over Skype.
4. If you have completed all previous steps you can set your website settings to use HTTPS.

## More information

* [API's](./apis)
* [REST API](./rest-api)
* [Websites](./websites)
* [Tips, tricks and background](./tips-and-tricks)
