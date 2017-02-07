# The REST API in a nutshell

The REST API is really easy to use. From a technical standpoint is simply comes
down that your website or app sends HTTP requests to Copernica's servers:
HTTP GET requests to fetch data, and POST and PUT requests to modify data.
These requests are processed by our API servers, and the requested data is 
sent back in a format that can easily be handled by computers (JSON).


## Registering your app

To prevent that unauthorized applications get access to the API, you must first
register your website or app with Copernica. Only after you have registered and
you have a valid API access token, you can start making calls to the REST API.

The registration form for the REST API can be found on the dashboard of the
Copernica website. This is probably not the location that you had expected, 
because we usually use the Marketing Suite of the Publisher for these kind of 
configuration forms. However, the REST API registration forms cannot be accessed 
via Marketing Suite or Publisher, but via [the dashboar](/nl/applications) on 
www.copernica.com. If you register an application, it is best to use a 
descriptive name, for example the address of the website from where you will
be making the API calls.

Copernica uses the [*OAuth*](./rest-oauth.md) protocol to authorize applications
to access the REST API. This is a standardized protocol in which you first have 
to register the application that is going to make the API calls, and then you 
have to link this application to one or more accounts that it can access. It is
possible that a single application has access to multiple accounts. The Copernica
dashboard has forms to perform both steps: registering the application, and 
linking it to accounts.

After you've registered your application and have linked it to your account,
you will receive an API access token. This is a long string of alphanumeric 
characters that you should pass to each API call. Once you have such an access
token, you can test whether you have access to the API by entering the following
URL in your browser:

`https://api.copernica.com/identify?access_token=youraccesstoken`

The text "youraccesstoken" should of course be replaced by the access token
that was given to you in the dashboard. If you have successfully completed
the registration process, you will get back a JSON object with the name of
your company and account.


## HTTP requests

The REST API uses the HTTP protocol for exchanging data. Your website or app
simply can simply send a HTTP request to one of our API servers to fetch or
update data. There are four types of requests that are supported:

* HTTP GET to fetch data
* HTTP POST to add/append data
* HTTP PUT to edit/modify data
* HTTP DELETE to remove data

This distinction is important. Some API calls use exactly the same URL, so that 
it makes a big difference whether you send a HTTP GET or a HTTP POST request
to the server. GET is used for retrieving data, and POST/PUT to modify things.

In practice the difference between HTTP POST and HTTP PUT is not so sharp
as presented here. For most URL's our servers treat the POST and PUT requests
completely the same. If you send a POST request to a method that only supports
PUT, we treat your call as if it was a PUT call. However, there are methods
that do treat PUT and POST differently, so we recommend to stick to the 
recommended methods: POST is used for adding data, and PUT for modify'ing.

Every API request requires a access_token parameter. You can simply add
this parameter to the URL as a regular get-parameter.


## More information

De following articles also contain information about the REST API:
De volgende artikelen bevatten ook uitgebreide informatie over de REST API:

* [OAuth integrations with the REST API](./rest-oauth.md)
* [The format of requests and responses](./rest-requests.md)
* [Overview of all available API methods](./rest-api.md)
* [Paging though lists of entities](./rest-paging.md)


