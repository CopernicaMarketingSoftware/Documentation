# REST API: fetching subprofiles from a collection

The method to fetch subprofiles from a collection is an HTTP GET method which is
available on the following URL:

`https://api.copernica.com/v1/collection/$id/subprofiles?access_token=xxxx`

The $id should be replaced with the numerical identifier of the collection you
want to fetch the subprofiles of.

## Available parameters

The following parameters can be added to the URL as variables for the call:

* **start**: first subprofile to fetch
* **limit**: length of the batch to fetch
* **total**: boolean value to show total of available subprofiles
* **fields**: optional parameter to only fetch subprofiles with certain field values
* **orderby**: name or ID of field to sort subprofiles by (default = subprofile ID)
* **order**: Ascending (asc) or descending (desc) order.

More information on the *start*, *limit* and *total* parameters can be found in 
the [article on paging](rest-paging).

The parameter fields can be used to select subprofiles. In case you only want 
to fetch the profiles where the value of the field "country" is equal to 
"Netherlands" you can assert this in the *fields* field. For more information on 
using the *fields* parameter you can consult the [article on the fields parameter](rest-fields-parameter).

The variable order can be set to the name or the ID of a field to sort the 
subprofiles by it. There are also three special values to sort by:

* **id**: default value, sort subprofiles by ID
* **random**: return subprofiles in a random order
* **modified**: subprofiles are ordered by last modified

## Returned fields

This method returns a list of subprofiles containing the following properties:

* **ID**: numerical subprofile ID
* **collection**: ID of collection the subprofile belongs to
* **profile**: ID of the profile the subprofile belongs to
* **secret**: the "secret" code associated with the subprofile
* **fields**: associative array / object of field names and values
* **created**: timestamp for creation in YYYY-MM-DD hh:mm:ss format
* **modified**: timestamp of last modification in YYYY-MM-DD hh:mm:ss format

## PHP Example

The following PHP script demonstrates how to call the API method. There is no 
need to escape special characters from the API, because this is done by the 
CopernicaRestApi class.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // parameters to pass to the call
    $parameters = array(
        'limit'     =>  100,
        'orderby'   =>  'country',
        'fields'    =>  array("age>16", "age<=65")
    );
    
    // do the call, and print result
    print_r($api->get("collection/1234/subprofiles", $parameters));

To execute this example you need the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [Fetch profile IDs](rest-get-collection-profileids)
* [Add subprofile to collection](rest-post-collection-subprofiles)
* [Delete subprofile](rest-delete-subprofile)
