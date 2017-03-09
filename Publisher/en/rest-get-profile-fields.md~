# REST API: request field from profile

To request the fields from a profile you can send an HTTP GET
request to the following URL:

`https://api.copernica.com/v1/profile/$id/fields?access_token=xxxx`

The $id should be replaced with the numerical identifier of the profile 
you're requesting.

## Returned fields

This method returns the fields of a profile.

## PHP Example

The following PHP script demonstrates how to use the API method.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("profile/1234/fields"));

For the example above you need the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [Fetching all profile information](rest-get-profile)
