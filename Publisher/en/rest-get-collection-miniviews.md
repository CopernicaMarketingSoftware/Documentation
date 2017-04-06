# REST API: fetching collection miniviews

What selections are to a database is what miniselections, or miniviews, 
are to a collection. To fetch the miniselections applied to this collection 
the following HTTP GET request can be used:

`https://api.copernica.com/v1/collection/$id/miniviews?access_token=xxxx`

The code `$id` should be replaced by the ID of the collection you want to 
fetch the miniviews of.

## Available parameters

The following parameters can be added to the URL as variables:

* **start**: first miniselection to fetch
* **limit**: length of the batch to fetch
* **total**: boolean value for displaying the total amount of miniselections

More information on the meaning of these parameters can be found in the 
[article on paging](rest-paging).

## Returned fields

The method returns a list of miniselections. For each selection the following 
information is returned:

* **ID**: numerical ID of the miniselection
* **name**: name of the miniselection
* **description**: description of the miniselection
* **parent-type**: the parent-type is always the string "collection"
* **parent-id**: ID of the collection this miniselection belongs to

## PHP example

The following PHP script demonstrates how to call the API method:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // insert your access token
    $api = new CopernicaRestApi("your-access-token");

    // parameters for the call
    $parameters = array(
        'limit'     =>  100
    );
    
    // execute the method and print the results
    print_r($api->get("collection/1234/miniviews", $parameters));

The above example requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
* [Adding a miniselection to a collection](rest-post-collection-views)
* [Get selection rules](rest-get-miniview-rules)
