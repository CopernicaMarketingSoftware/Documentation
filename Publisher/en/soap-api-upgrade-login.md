# Upgrading your SOAP API login

In May 2020 Copernica rolled out a new mechanism for SOAP API authentication.
The old login/password system was replaced with a new, more powerful and more
secure system based on [access-tokens](./soap-api-authentication).

## Upgrade instructions

**The following instructions only apply if you use the soapclient PHP script provided by Copernica**

1. Create a new application and access token in your [API access](https://www.copernica.com/en/api) dashboard. You can choose to setup one application with multiple tokens or one token per application. There are no costs involved with setting up applications or tokens.
2. Upgrade your soap client to [version 2.0](./soap-api-documentation#download-example).
3. Add the `access_token` to your soap client script. 
4. That's it, fire away!

**Instructions for all other users**
1. Create a new application and access token in your [API access](https://ms.copernica.com/#/admin/account/access-tokens) dashboard. You can choose to setup one application with multiple tokens or one token per application. There are no costs involved with setting up applications or tokens.
2. Stop calling the deprecated [login](https://www.copernica.com/en/support/apireference/login) method.
3. Update your client code to always send a valid `access_token` parameter with each call to the SOAP API.
4. That's it, fire away!

[Back to to overview](./soap-api-documentation)
