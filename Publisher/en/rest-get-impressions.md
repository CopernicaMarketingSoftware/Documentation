# REST API: fetch all registered impressions

All impressions that have been registered by Copernica can be fetched by
sending a HTTP GET request to the following URL:

`https://api.copernica.com/impressions?access_token=xxxx`

## Supported parameters

If you call this method without adding any parameters to the URL, you will
receive the list of all impressions, regardless of the mailing, profile or anything
else. By adding extra parameters to the URL you can however add filters to
fetch only specific impressions. The following parameters are supported:

* **start**: start position of the batch that is fetched (default 0)
* **limit**: size of the batch (default 100)
* **total**: boolean parameter: should a "total" property with the total number of available impressions be included in the output?
* **emailing**: optional numeric identifier to fetch only impressions for a specific mailing
* **destination**: optional numeric identifier to fetch only impressions for a specific destination
* **profile**: optional numeric identifier to fetch only impressions of a specific profile
* **subprofile**: optional numeric identifier to fetch only impressions of a specific subprofile

You can read more about the *start*, *limit* and *total* parameters in out
[article about paging](./rest-paging.md).

## The returned data

The method returns a list of impression objects. Each object in this list has
the following properties:

* **ID**: Unieke numeric impression identifier
* **timestamp**: Timestamp of the impression
* **ip**: IP address
* **user-agent**: The user-agent string
* **referer**: The value of the referer http header
* **emailing**: Numeric identifier of the emailing to which this impression is linked
* **destination**: Numeric identifier of de destination
* **profile**: Optional numeric profile identifier
* **subprofile**: Optional numeric subprofile identifier


## PHP example

The following PHP script can be used to call this method:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // parameters to pass to the call
    $parameters = array(
        'limit'     =>  100
    );
    
    // do the call, and print result
    print_r($api->get("impressions", $parameters));

You need the [CopernicaRestApi class](./rest-php.php) to run this example.
    

## More information

* [Overview of API calls](./rest-api.md)
* [Fetch abuse reports](./rest-get-abuses.md)
* [Fetch clicks](./rest-get-clicks.md)
* [Fetch deliveries](./rest-get-deliveries.md)
* [Fetch error](./rest-get-errors.md)
* [Fetch unsubscribes](./rest-get-unsubscribes.md)

