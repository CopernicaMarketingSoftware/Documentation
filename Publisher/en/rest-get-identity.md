# REST API: fetching your identity

This method can be used if you want to find out the account that is linked to
an API access token. By sending a GET request to the following URL, you can
fetch the account information:

`https://api.copernica.com/v1/identity?access_token=xxxx`

This method can be useful if you have a lot of different access tokens to 
access many different accounts (this can happen if you built a 
[OAuth integration](./rest-oauth.md)). This method can then be used to find 
out to which account an access token belongs. If you use the REST API only
to access your own account, there is not so much value in this method, because
you already know the account to which you are linked.

## The returned data

This method returns an object with account data. The object has the following
properties:

* **ID**: Unique numeric account identifier
* **name**: Account name
* **description**: Description of the account
* **company**: The name of the company that pays for the account

## PHP example

The following PHP script calls this API method:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("account"));

You need the [CopernicaRestApi class](./rest-php) to run the PHP script.

## More information

* [Overview of all API calls](./rest-api.md)
* [How to create OAuth2 integrations](./rest-oauth.md)
