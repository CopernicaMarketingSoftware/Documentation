# REST API: fetching subprofile identifiers

A simple method for fetching the identifiers of all subprofiles in a miniselection.
Execute this method by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v1/miniview/$id/subprofileids?access_token=xxxx`

The $id should be replaced by the numerical identifier of the miniselection 
you want to fetch the IDs of.

## Available parameters

This method does not support any parameters.

## Returned fields

This method returns a JSON array consisting of unique numerical identifiers.

## PHP example

The following PHP scriptt demonstrates how to use the API method.

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // voer de methode uit en print het resultaat
    print_r($api->get("miniview/1234/subprofileids"));

For the example above you need the [CopernicaRestApi class](rest-php).
    

## More information

* [List of all API calls](rest-api)
* [Fetch subprofiles including all information](rest-get-view-subprofiles)
