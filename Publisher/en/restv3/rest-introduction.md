# The REST API in a nutshell

The REST API is very easy to use. HTTP requests are sent to Copernica's 
servers and then used to fetch data (HTTP GET), create data (HTTP POST), 
modify data (HTTP PUT) or delete data (HTTP DELETE). These requests are 
processed by our API servers and if the call results in data it will be sent 
back in a format that can easily be handled by computers (JSON).

## REST version

Currently we are using version 2 of the API. In this newest version some calls 
were moved to make it clearer which calls were unique to the Marketing Suite 
or the Publisher. The new version of the API is easier to understand and 
offers some new calls to help you manage all data surrounding your mailings.

### Upgrading to v3

If you are using our CopernicaRestAPI class, your instantiation currently should look somewhat like this:

`$api = new CopernicaRestAPI("your-access-token", 3);`

This should be simply changed to:

`$api = new CopernicaRestAPI("your-access-token", 3);`

## Registering your app

To prevent unauthorized applications from accessing the API we have protected 
it with access tokens. To use the API you must register your website or 
app with Copernica to receive such an access token.

Copernica uses the [*OAuth*](./rest-oauth.md) protocol to authorize applications
to access the REST API. This is a standardized protocol that requires you 
to register your website or app first. You can do so by using the registration 
form on [the dashboard](/en/applications) of the Copernica website. It is not 
possible to register for the REST API in the Marketing Suite or Publisher. 
After completing this registration you can find another form on the 
dashboard that allows you to link one or multiple accounts.

After you've registered your application and have linked it to your account,
you will get access to the API token. This is a long string of alphanumeric 
characters that you should pass to each API call. Once you have this access
token, you can test whether you have access to the API by entering the following
URL in your browser:

`https://api.copernica.com/v3/identity?access_token=youraccesstoken`

In the URL you will have to replace the text "youraccesstoken" with you own 
access token. If you have successfully completed the registration process, 
this method returns a JSON object with the name of your company and account.

## HTTP requests

The REST API uses the HTTP protocol for exchanging data. Your website or app
simply can simply send an HTTP request to one of our API servers to access 
the data stored by Copernica. There are four types of requests that are supported:

* **GET**: Fetches data
* **POST**: Creates/appends data
* **PUT**: Edits data
* **DELETE**: Removes data

This distinction is important. It makes a big difference whether you send a 
HTTP GET or a HTTP POST request to the server. While the URL might be 
the same the type of method will determine whether data is retrieved (GET) 
or overwritten (PUT)!

In practice the difference between HTTP POST and HTTP PUT is not as sharp.
For most URL's our servers treat the POST and PUT requests
completely the same. If you send a POST request to a method that only supports
PUT, we treat your call as if it was a PUT call. However, there are methods
that do treat PUT and POST differently, so we recommend that you stick 
to the type of method that is mentioned in our documentation, as changes 
to API calls could be made in the future.

## More information

The following articles also contain information about the REST API:

* [OAuth integrations with the REST API](./rest-oauth.md)
* [The format of requests and responses](./rest-requests.md)
* [Overview of all available API methods](./rest-api.md)
* [Paging though lists of entities](./rest-paging.md)
