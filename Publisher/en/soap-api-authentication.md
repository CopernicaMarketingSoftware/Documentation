# SOAP API Authentication
In May 2020 Copernica rolled out a new mechanism for SOAP API authentication. 
This new system uses something called access token to grant applications access 
to the API. If your application is still using the [login](https://www.copernica.com/en/support/apireference/login) to gain access 
to the SOAP API, you need to [take action](./soap-api-upgrade-login) as soon as possible.

## API application
The application represents your application or website that need access
to the API. Access tokens are grouped per application. The REST API uses 
these applications for OAuth authentication. The SOAP API does not use 
OAuth. Applications are used for the SOAP API purely to generate access tokens.

## Access tokens
An `access_token` is a unique string that is linked to one of your API applications. 
Each `access_token` provides access to only one Copernica account. You can manage 
your access tokens in the [API access](https://www.copernica.com/en/api) dashboard.

## Permissions
Access tokens has either read, write or read and write access rights.

## IP access restriction
To improve security, access tokens also offers IP access restriction that 
allows you to specify from which IP address(es) your soap clients are 
allowed to connect from. 

[Back to documentation](./soap-api-documentation)
