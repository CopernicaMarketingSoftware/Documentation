# Upgrading your SOAP API login
In May 2020 Copernica rolled out a new mechanism for SOAP API authentication.
This new system uses something called `access_token` to grant applications access
to the API. If your application is still using the [login](https://www.copernica.com/en/support/apireference/login) method
to gain access to the SOAP API, you need to take action as soon as possible. 

## What is an access_token?
An `access_token` is a unique string that is linked to one of your API applications. 
Each `access_token` provides access to only one Copernica account. This means that
if your application has access to multiple Copernica accounts, you need multiple access tokens.
[Read more about authentication](./soap-api-authentication)


## Steps

1. Are you using the example SOAP client that Copernica provides? If so, make sure you upgrade to [version 1.6](./soap-api-documentation#download-example) (or higher). Otherwise you need to make sure your code does not call the [login](https://www.copernica.com/en/support/apireference/login) method anymore.
2. Go to [API access](https://www.copernica.com/en/api) in your dashboard on copernica.com.
3. Create a new application. You can choose to setup one application with multiple tokens or one token per application. There are no costs for the amount of tokens or applications.
4. Once your application exists, you will see a button to generate your `access_token`.
5. Fill the `access_token` in your application's soap client. 
6. That's it, fire away!

[Back to to overview](./soap-api-documentation)
