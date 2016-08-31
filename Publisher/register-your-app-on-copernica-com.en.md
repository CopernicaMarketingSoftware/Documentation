The Copernica REST API is only accessible with a valid access token.
There are two ways to get your access token: via the access token
generator in your [application
dashboard](https://www.copernica.com/en/applications), or using the
[OAuth 2.0 procedure](./setting-up-copernica-rest-service.en.md).

This article addresses how you can register your application and obtain
your token on Copernica.com.

Creating your app
-----------------

In order to make authorized calls, your application must obtain an
access token on behalf of a Copernica account. If you do not have
Copernica account yet, you can [register for a free
account](https://www.copernica.com/en/copernica-trial) on Copernica.com
to get started.

1.  Login to your [application
    dashboard](https://www.copernica.com/en/applications)
2.  Click **Register your app**.
3.  Enter the name of your application and provide a short description
    of your application.
4.  Click on **Create** to register your app.
5.  Your app is now registered and listed in your applications overview.
6.  Click on your app to retrieve the client\_key, client\_secret and of
    course your access\_token.
7.  Give your application access to your account(s) by clicking **Add
    account**, and then select the account.

### Test your app

To see if your access\_token is valid, just paste the following URL with
your token into the address bar of your favorite browser:

`https://api.copernica.com/databases?access_token=your-token-here`

If everything is fine (and of course it is!), you will receive
information about the databases in your account. \
You can now [start building your app](./introduction.en.md)!

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.en.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.en.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.en.md)
-   [REST API resources / methods](./the-copernica-rest-api.en.md)

