# REST API: request available miniselections

Miniselections are to a collection what selections are to a database. To request
the miniselections available for a collection you can use an HTTP GET request with 
the following URL:

`https://api.copernica.com/v1/collection/$id/miniviews?access_token=xxxx`

The $id should be replaced by the numerical identifier of the collection you
want to get the miniselections of.

## Available parameters

The following parameters can be added to the URL as variables:

* **start**: first miniselection to fetch
* **limit**: length of the request batch
* **total**: boolean value to show the available amount of miniselections

More information on the usage of these parameters is available in the [article
on paging](rest-paging).

## Returned fields

This method returns a list of miniselections that contain the following properties
for each miniselection:

* **ID**: numerical ID of the miniselection
* **name**: miniselection name
* **description**: description of the miniselection
* **parent-type**: the parent-type is always "collection" in this case
* **parent-id**: ID of the collection this miniselection belongs to.

## PHP example

The following PHP example demonstrates how to use this method with the
API:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // parameters to pass to the call
    $parameters = array(
        'limit'     =>  100
    );
    
    // do the call, and print result
    print_r($api->get("collection/1234/miniviews", $parameters));

To use the example above you need the [CoperniceRestApi class](rest-php).    

## More information

* [List of available API calls](rest-api)
* [Add a miniselection to the collection](rest-post-collection-views)
* [Get selection rules](rest-get-miniview-rules)
