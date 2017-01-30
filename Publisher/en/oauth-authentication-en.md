# OAuth authentication

Authorization for the Copernica REST API is done through the OAuth 2 authentication system. This is a powerful system where (1), applications that have access to the REST API, and (2), the accounts an application has access to, are treated differently.

So, in order to obtain access to the REST API, you must do two things: you need to register your application at Copernica, and then grant the application access to your account. Once you've completed both steps (which can be done through the [Copernica dashboard]()) you'll get an *access key* that you can use for the Copernica REST API.

However, there's much more to the OAuth2 protocol. Even if you have absolutely no clue of what it is, you've probably used it before. It's most widely known for the "log in with Facebook" buttons that appear everywhere on the internet. Clicking on one such buttons takes you to Facebook, which will show you something like "Application X wants access to your e-mail address, friend list, and so forth. Are you okay with that?". If you agree to that, you're redirected to the website you came from, which now has access to your Facebook data. You can do something like that with Copernica, too.

## When is this useful?
Before continuing to read this article, you should ask yourself whether you really need this feature. If you only wish to use the REST API to gather or edit data from your own account, a complex connection with OAuth2 is not what you're looking for. The access key from the Copernica.com dashboard will suffice for most users.

OAuth2's features only come in handy when you make an application that needs to be connected to many Copernica accounts and also to accounts from other companies. Here's an example. Say, you've got a website that uses artificial intelligence to analyze Copernica databases and optimalise selections in them. This tool is useful for you, but also for others. You could create a button on your website saying "click here to analyze your Copernica database". When somebody clicks the button, they are automatically redirected to Copernica.com and asked "the database-analyzer would like access to your account to analyze your database. Are you okay with that?".

<afbeelding>

## Registering an application
You can make the connection described above using OAuth. To start with, you must register your application via the Copernica.com dashboard. Here, you need to give your application a name and a description. Make these clear: this is the description people get to see when they reach the "Application X wants access to..." page.

After registering the application, you receive a *client_key* and a *client_secret*. These are the login code and the password you're going to need to access other accounts. Make sure you keep the value of client_secret, well, a secret. It's meant for your eyes only. 

## Placing a button or hyperlink

Using the credentials from your application (client_key and client_secret), you can place a link or button on your website. When users click this link, they are redirected to Copernica.com, where they can grant your application access to their data. The link has to point to the following URL:

`https://www.copernica.com/nl/authorize?client_id=XXX&redirect_uri=XXX&state=XXX&response_type=code`

In the URL above, there are multiple variables set to XXX. These need to be replaced by values that are relevant to you:

* **client_id**: the value of *client_id* for your application.
* **redirect_uri**: the complete URL of the page the user should be redirected to after granting access.
* **state**: a string that you generated yourself. It should be hard to guess and it should be a different string every time. 
* **response_type**: this should have the value *code*.

Make sure the **state** variable really is hard to guess. It's best to generate a random string. If Copernica decides it's too easy to guess, no access will be granted.

## The landing page

You'll also need a landing page. This is the page the user is redirected to after they've granted access to their data. Copernica adds two variables to this URL: *state* and *code*.

There are two things you need to do for the landing page. First, you must check whether the value of *state* matches the one you put in the original link. If that's not the case, something's off (abuse!) and you should not continue.

If *state* is in order, you can use *code* to download the *access_key*. To do so, use the following URL:

`https://api.copernica.com/token?client_id=XXX&client_secret=XXX&redirect_uri=XXX&code=XXX`

Here, you need to replace the XXX variables with your own:

* **client ID**: the value of *client_id* for your application
* **client_secret**: the value of *client_secret* for your application
* **redirect_url*: the exact address as the one in the original link or button
* **code**: the value of the *code* variable, assigned to the landing URL by Copernica.

Just to be clear: this URL is a REST API address. You shouldn't show it to the user, and you also shouldn't redirect users to it. What needs to be done is for an HTTP GET-request to be sent from *your server* to this address. the *redirect_url* parameter wont' be used and no user will be redirected. The parameter is only needed for Copernica to check whether the request is sent from the same address as the initial call.

If all goes well, the result of this API call should return an access_token. This token can be used to make API calls to the account that you just got access to. It looks something like this:

`{ access_token : "ed430a95c58fd7d2830c9dc453396cf5" }`