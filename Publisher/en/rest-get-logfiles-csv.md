# Download a log file as a csv file

If you want to download a logfile as a csv file you can send an HTTP GET
request to the following URL:

`https://api.copernica.com/v1/logfiles/$filename?access_token=xxxx`

If you want to have a header row with the field names included in the
csv you can send an HTTP GET request to:

`https://api.copernica.com/v1/logfiles/$filename/header?access_token=xxxx`

## Returned value

A csv file with optionally a header row of the requested log file.

## PHP Example

The following PHP script demonstrates how to use the API method.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("logfiles/cdm-attempts.2016-11-04.log/header"));

For the example above you need the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [Log file information](rest-logfiles-names)
