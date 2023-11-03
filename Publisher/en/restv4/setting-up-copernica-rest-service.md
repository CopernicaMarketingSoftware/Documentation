# Setting up the REST service

The Copernica REST API allows you to create applications that can access
and modify all data in a Copernica account, and for example start
campaigns.

The methods in the Copernica REST API are only accessible if you have an
access token. There are two ways to get such a token: via the access
token generator in the Copernica.com dashboard, and via the official
OAuth procedure.

## Authorization and API Tokens

All calls to the REST API require the inclusion of an "Authorization" HTTP header containing a token string. This header must be included with every GET, PUT, POST, and DELETE request. For example:

```
GET /v4/identity HTTP/1.1
Host: api.copernica.com
Authorization: Bearer abcd.xyz.klmnop
```

The example above is simplified; in reality, the tokens are much longer. The authorization header should start with the word "Bearer" and then contain a base64-encoded token string that grants you access to the API.

The tokens are [JSON Web Tokens](https://jwt.io/introduction) (JWT), which store the access rights to the API. If you wish, you can decode the token and read the JSON data, but this is not necessary. Using the tokens as strings works just fine.

To obtain a JWT token, you need to follow three steps:

1. Manually request an API token in the Marketing Suite dashboard. This API token does not provide direct access to the API.
2. With the API token, you can request a JSON Web Token (JWT) from the authentication server, which is valid for 24 hours and grants you access to the API.
3. During the 24-hour period, you can use this second token to make calls to the REST API.
4. After these 24 hours, you should repeat step 2 to request a new token. You can do this earlier if needed.

The first step is generally done manually, while the subsequent steps are usually automated.

### Obtaining an API Token

You can manually create API tokens in the [Marketing Suite dashboard](https://ms.copernica.com/#/admin/account/access-tokens). You can then use an API token to request a temporary JSON Web Token.

### Requesting a JWT

Given an API token (as mentioned above), you can request a JWT from the authorization server. You can use the following URL for this purpose: `https://authenticate.copernica.com/?access_token={your_access_token}`. The response will contain a JWT string that you can use in calls to the API server.

### The Authorization Header

For every call to the REST API (whether it's a GET, POST, PUT, or DELETE call), you must include an "Authorization" header. This header should have the format "Authorization: Bearer {your_json_web_token}." If you are making a call with 'curl,' you can do it like this:

```
curl https://api.copernica.com/v4/identity -H "Authorization: Bearer {your_json_web_token}"
```

Please note that a JWT is valid for 24 hours. After this period, you should send a new request to the authentication URL.

## OAuth Authorization

As said, the Copernica API is implemented according to the OAuth 2.0
Authorization protocol, also utilized by Google, Facebook, Linkedin and
other major web applications. So if you're already familiar with those,
you will have your connection up and running within any minutes from
now.

![OAuth 2.0 protocol](../../images/oauth-copernica.png)

This graph depicts the procedure to link an external application to
Copernica using the OAuth 2.0 protocol

## Let's get started

In order to make authorized calls, your application must obtain an
access token on behalf of a Copernica account. If you do not have
Copernica account yet, you can register your free account on
Copernica.com to get started.

In this example we'll be using a fictional external application
example.com. The goal is to enable users with an example.com account to
give this site access to their data in Copernica.

## Registering your application

Before you can even start implementing the OAuth protocol, you need to
register your application on the Copernica.com dashboard. By registering your application you will
obtain the **client key** and **secret key**. This basically is the
login and password of your application. Both are needed for your
application to authenticate itself to Copernica.

Go to your dashboard on Copernica.com. Go to the developers section to
retrieve the **client\_key** and the **client\_secret**

-   **client\_key**

Identifies the client that is making the request.

-   **client\_secret**

This is the secret token, so don't share it with anyone you don't trust.

## Add a hyperlink to your website

On your website, make a hyperlink that users can click to connect their
example.com account with their Copernica account. The link should point
to the following location, and includes a bunch of GET parameters. These
parameters are further elaborated below.

The complete authentication URL (for readability, we have not encoded
the variables, although in reality you should of course encode them):

    https://wwww.copernica.com/en/authorize?client_id=client&key&redirect_uri=https://www.example.com/success&state=random string&response_type=code

-   **client\_id** This is the public client key obtained in the first
    step.
-   **state** This is a random session string and can be anything. It is
    used to prevent forgery by malicious users. Therefore this string
    MUST be a 'hard to guess' string. Otherwise the procedure will fail.
    The state value is later matched against the authentication response
    from Copernica. You can for example use a 32 bytes md5 hash string
    that is generated by a script on your server.
-   **redirect\_uri** This is the location on your server where the user
    will be redirected to after he has given access. A typical location
    would be
    [http://www.example.com/success](http://www.example.com/success)
-   **response\_type** This parameter only accepts the value 'code'. So
    this GET parameter is always response\_type=code
-   **scope** In future releases of the API you will be able to
    determine an access scope. This would enable you for example to
    constraint the access to a single database only. Currently scope
    isn't implemented yet, so you're automatically authorizing access to
    all data.

User authorizes application access
----------------------------------

Once a user clicks on your hyperlink to authorize your application, the
user is redirected to a web form on the Copernica.com website to confirm
this access. The user will be asked to enter his login credentials. If
the user has access to more than one account, he will also be asked to
select the account that he would like your application to get access to.

## Authorization successful

After the user has confirmed access to his account on the Copernica.com
website, he is redirected to the supplied redirect URI. Two extra URI
parameters have been added to this URI: **state** and **code**. The
value of the state is the same string value that you provided in the
first step. The code is a security string that is generated by
Copernica.

Example:

    `https://www.example.com/success?state=[your random string]&code=[unique hash code]`

Is the `code` parameter missing in the redirect URL? Make sure that your
`state` parameter added to your authentication URL is at least a MD5
hash string.

## Verify identification

Once the user returned to your site, it's it time to convert the code
variable that was supplied in the redirect URL to the access token that
can be used for the API calls.

As we explained above, two parameters were added to the redirect URL.
The **state** parameter holds the same string identifier that you had
set in the first link. It is now up to you to compare if this state
value is indeed identical to the value you had set. If it is not, you
obviously should refuse this request.

The other parameter is the parameter **code**. To convert this code into
an access token, you will have to download the access token from the
api.copernica.com site via the following URL:

    https://api.copernica.com/v4/token?  
        client_id = client_key   
        client_secret =  client_secret   
        redirect_uri = https://www.example.com/success
        code = The security string generated by Copernica

Note that the redirect\_uri parameter is not used, thus no more
redirects will follow. It is only used to verify that the access token
retrieval comes from the same location as the previous redirect.

If the request is accepted, Copernica will send a JSON document that
contains the access token only:

`{ access_token : "ed430a95c58fd7d2830c9dc453396cf5" }`

With this access token you can start doing API calls. You can also store
this token in a database, because it will stay valid until it is
manually revoked by the user.

## Creating the API calls

You've got everything up and running now and can start making calls to
the Copernica Marketing Software.

The below example shows you how you retrieve data from a profile (a
database record) with its unique ID in Copernica. A call is always
accompanied with the access token as a query string:

`https://api.copernica.com/v4/profile/{$profileID}`

View our [REST API documentation](./rest-api.md) for in depth
information on making API calls.

## Revoking access data

Users of Copernica can easily revoke access to your application from
their admin panel in Copernica. The access token will be destroyed and
calls from your application will get an error response from our servers.

## More information

* [REST introduction](./rest-introduction)
* [REST API calls](./rest-api.md)
