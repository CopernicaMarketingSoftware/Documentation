# SOAP API authentication

In May 2020 Copernica rolled out a new mechanism for SOAP API authentication. 
This new system uses access tokens to grant applications access to the API. If 
your application is still using the old [login](https://www.copernica.com/en/support/apireference/login) 
method to gain access to the SOAP API, you should follow the [upgrade instructions](./soap-api-upgrade-login) 
to upgrade to the new system.

## Access tokens

An `access_token` is a unique string that you send with each call to the SOAP 
API. This token uniquely identifies the account that is accessed, and the caller
("application") that makes the call. You should keep this token secret at all times. 
The access tokens can be managed in the [API access](https://www.copernica.com/en/api) 
dashboard, where you can limit each access token to just read and/or write access.
For further security you can also limit the IP addresses from which your
access token can be used.

The access tokens are grouped per application. An application represents
your API script (or collection of scripts) that call the Copernica SOAP API,
while the access tokens that are grouped _under_ that application represent the
individual accounts that are accessed by this (collection of) script.

The application/access-token system is a powerful system that can not only
be used to access your own account, but also to obtain access to other people's
accounts, using [OAuth authentication](./restv2/rest-oauth). Most Copernica users 
however simply register one application with one access-token just to get access 
to their own account without using OAuth.

[Back to overview](./soap-api-documentation)
