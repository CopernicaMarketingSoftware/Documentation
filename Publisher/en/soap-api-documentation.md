# SOAP API
Are you a new user looking into API capabilities of Copernica? We recommend 
using the [REST API v2](./restv2/rest-api.md "REST-API") which is faster 
and easier to implement. 

## About the API
Copernica's SOAP API uses the standard SOAP protocol. The Simple Object 
Access Protocol (SOAP) is an XML-based protocol to let applications exchange 
information over HTTP. It provides a way to communicate between applications 
running on different operating systems, with different technologies and 
programming languages.

#### Full control with Copernica's object model
The API uses a logical and structured object model. All data in the software 
is represented by objects. Read the properties of these objects with SOAP API 
and then update them. 

#### Powerful callback system
We do not expect you to pull the API periodically to find out when you need 
to update your data. To ease synchronization of data between Copernica and 
your application, we offer two kind of callback mechanisms. The Publisher 
Marketing Software uses a system called Callbacks. The Marketing Suite
uses its successor called [webHooks](./webhooks.md). Copernica uses these 
mechanisms to keep your application informed about changes in your Copernica 
account like profile creations, modifications or removals. These are just 
examples, you configure your own callback or webHook.


## API authentication 
To gain access to the SOAP API, you need to provide a valid `access_token` 
with each call to the API. [Read more about API authentication](./soap-api-authentication.md "About API authentication")

#### Deprecated: login method
Is your application still using the old [login](https://www.copernica.com/en/support/apireference/login) 
method to gain access to the API? Read how to update your soap client to [use access tokens](./soap-api-upgrade-login.md "Find out what you need to do").

## API methods
All features of the Publisher Marketing Software are accessible via the API. 
Every project is built up from smaller sub-objects. An object that represents 
a database for example, has a method that requests all documents that were 
created based on this template. See complete [overview of SOAP API methods](https://www.copernica.com/en/support/apireference "SOAP API methods").

## Download example
**Warning:** example soap client version 1.5 (or older) will soon become deprecated and stop working. 
Use version 1.6 (or higher) to be sure your application still works when the [login](https://www.copernica.com/en/support/apireference/login) method is removed.
[Read how to upgrade](./soap-api-upgrade-login.md "Find out what you need to do")

#### version 1.6
- Soon available

#### version 1.5
- [PHP example](../downloads/soaptest_php_1-5.zip "SOAP API example script for PHP")
- [Java example](../downloads/soaptest_java.zip "SOAP API example script for Java")
- [C\# example](../downloads/soaptest_cs.zip "SOAP API example script for C#")
