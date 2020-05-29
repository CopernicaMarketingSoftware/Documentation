# Upgrading your SOAP API login
In May 2020 Copernica rolled out a new mechanism for SOAP API authentication.
This new system uses something called `access_token` to grant applications access
to the API. If your application is still using the [login](https://www.copernica.com/en/support/apireference/login) method
to gain access to the SOAP API, you need to take action as soon as possible. 

## What is an access token?
An `access_token` is a unique string that is linked to one of your [API applications](https://www.copernica.com/en/api/applications). 
Each `access_token` provides access to only one Copernica account. This means that
if your application has access to multiple Copernica accounts, you need multiple access tokens.
[Read more about authentication](./soap-api-authentication)

## Upgrade instructions
**Are you using the SOAP client (example) provided by Copernica?**
1. Create a new application and access token in your [API access](https://www.copernica.com/en/api) dashboard. You can choose to setup one application with multiple tokens or one token per application. There are no costs for the amount of tokens or applications.
2. Upgrade your soap client to [version 1.6](./soap-api-documentation#download-example).
3. Fill the `access_token` in your application's soap client. 
4. That's it, fire away!

**Are you using a custom SOAP client?**
1. Create a new application and access token in your [API access](https://www.copernica.com/en/api) dashboard. You can choose to setup one application with multiple tokens or one token per application. There are no costs for the amount of tokens or applications.
2. Do not call the deprecated [login](https://www.copernica.com/en/support/apireference/login) method anymore.
3. Update your client to always send a valid `access_token` parameter with each call to the SOAP API.
4. That's it, fire away!

[Back to to overview](./soap-api-documentation)
