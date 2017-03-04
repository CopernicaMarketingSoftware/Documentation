# The Copernica REST API

With Copernica's REST API it's possible to gather, create, update and delete data without having to access the Copernica applications. REST stands for Representational State Transfer and the most important of its properties is that it uses HTTP to communicate with your device. HTTP is the protocol used on the web to communicate between web servers and clients (like browsers and other applications). Copernica's APIs only use HTTP, the encrypted version of HTTP, to make sure your data doestn't get tampered with during transfer.

The REST API can, for example, be used to gather information on a profile. A request for all information on a profile with ID 1234 will look something like this:

`https://api.copernica.com/v1/profile/1234?access_token=abc123`

Except it will have to include your own access token instead of 'abc123'.
You can access the REST service at [https://api.copernica.com](https://api.copernica.com).

## HTTP requests
As usual with REST API's, ours usese HTTP requests to gather or edit data. We use four different types of requests: GET, POST, PUT and DELETE. GET orders the server to send the data you ask for. POST allows you to add new data like profiles or databases. PUT is used to update existing data and DELETE, you guessed it, deletes the data you specify in your request. In the [resource list](), you'll find all possible methods and the types of requests they support.

## Getting started with the API
You can't access the API without an access key. In order to obtain one, you'll need to register your application with Copernica. Other than you might expect, this is not done through the Publisher or MarketingSuite, but via the Copernica web dashboard, found at [https://copernica.com/applications](https://copernica.com/applications). After adding your application to the list, click it and add your account. After that, you'll find your account name and access key at the botton of the page. As soon as you've got your access key, you can start making calls.

## Making API calls
Once you've got yourself set up, it's time to start making calls.

### Parts of a request
An HTTP request consists of the following parts:

- The URI: a reference to the source you want to gather data from. It also holds the query, the order you've giving the receiving server. In the Copernica REST API, it looks something like this: `https://api.copernica/$method/$ID?access_token=123abc`. In this, you'll of course need to replace $method and $ID with the method and ID you need to fulfill your request. 

- Header fields: these hold information on the request, like the content type of the body, the date, the server, etc.

- The body: the body is optional for HTTP requests. It contains all data that is sent with the request. When you send a GET or DELETE call, you don't need to put anything in the body. However, when you send a POST or PUT request, you need to specify all data you want to add or update there. The body also holds the data you receive from the API. These are data you request through a GET request, reports of added or updated data and error/success messages.

Writing requests entirely by hand is unusal. It's a lot easier and faster to do so using a library like Requests (Python) or cURl (other languages). [Here](example-get-post-and-delete-requests), you'll find example scripts for all four requests written in PHP using cURL.

### Errors and success messages
When your request fails, you'll naturally be notified of it. This happens in the form of a HTTP 400 (bad request) error header. A successful request also returns a header, which is different per type of request. A header request doesn't return any specific header information, because you are the receiver of data. Succesful POST and PUT requests return a link to the data in the form of an `X-location: https://api.copernica.com/v1/profle/$profileID` when the request concerns a profile. A succesful DELETE request returns an `X-deleted: profile $profileID`.

For the most part, data is returned in key:value pairs. The following syntax is used to describe the form of the data:

`"key":"value"`: both key and value are strings

`"key": 1`: The key is a string, the value an integer

`"key": [...]`: The key is a string, the value an indexed array

`"key": {...}`: The key is a string, the vallue an associative array

**Note**: keys and values are case sensitive. {"Name":"Jeroen"} is not the same as {"name":"jeroen"}.

## Integrating Copernica with your application
Besides authorisation through an access key, it's also possible to integrate Copernica with your application via an OAuth 2.0 link. This allows users of your application to grant the application access to data in their Copernica account. This way, they don't have to manually fill in their data again. More on this integration can be found [here]().
