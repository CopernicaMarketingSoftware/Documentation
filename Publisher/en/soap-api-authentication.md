# SOAP API authentication
In May 2020 Copernica rolled out a new mechanism for SOAP API authentication. 
This new system uses something called access token to grant applications access 
to the API. If your application is still using the [login](https://www.copernica.com/en/support/apireference/login) method to gain access 
to the SOAP API, you should follow the [upgrade instructions](./soap-api-upgrade-login) as soon as possible!

## API application
An application within Copernica represents your external application or website that need access
to the Copernica API. Access tokens are grouped per application. The REST API uses 
the applications for OAuth authentication. The SOAP API does not use 
OAuth, it uses applications to generate access tokens.

## Access tokens
An `access_token` is a unique string that is linked to one of your API applications. 
Each `access_token` provides access to only one Copernica account. You can manage 
your access tokens in the [API access](https://www.copernica.com/en/api) dashboard.

## Permissions
Access tokens has either read, write or read and write access rights.

## IP access restriction
Make your application safer by specifying from which IP address(es) 
an `access_token` is allowed to be used.

[Back to overview](./soap-api-documentation)
