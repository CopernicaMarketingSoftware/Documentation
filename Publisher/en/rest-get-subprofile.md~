# REST API: fetch subprofile information

This is a simple method to request all information from a subprofile given 
its ID. The profile information can be requested with an HTTP GET call to the
following URL:

`https://api.copernica.com/v1/subprofile/$id?access_token=xxxx`

The $id should be replaced with the numerical identifier of the subprofile you're
requesting the information of.

## Returned fields

This method returns subprofile information. The subprofile object contains the 
following properties:

* **ID**: numerical ID of the subprofile
* **profile**: numerical ID of the profile the subprofile belongs to
* **collection**: ID of the collection where the subprofile is stored
* **secret**: the "secret" code linked to a subprofile
* **created**: timestamp for creation of subprofile in YYYY-MM-DD hh:mm:ss format
* **modified**: timestamp for last edit of subprofile in YYYY-MM-DD hh:mm:ss format
* **fields**: associative array / object of field names and values
* **interests**: array of the interests of the subprofile

## PHP example

The following PHP script demonstrates how to call the API method.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("profile/1234"));

For this example you need the [CopernicaRestApi class](rest-php).
    
## More information

* [List of all the API calls](rest-api)
* [Get only profile IDs](rest-get-database-profileids)
* [Add subprofile to database](rest-post-database-subprofiles)
* [Edit subprofile](rest-put-subprofile-fields)
* [Delete subprofile](rest-delete-subprofile)
