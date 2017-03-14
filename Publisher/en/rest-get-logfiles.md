# REST API: fetch logfile dates

Copernica keeps logfiles about several things such as clicks, opens, errors, accepted messages, etc. These logfiles can be downloaded with the API. By sending an HTTP GET request to the following URL you will get a list of all dates we have kept logfiles of.

`https://api.copernica.com/v1/logfiles?access_token=xxxx`

## Returned fields

This method returns a JSON array of date strings. To download a log file please see the links under "More information".

## PHP Example

The following PHP script demonstrates how to use the API method:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("logfiles"=));

For the example above you need the [CopernicaRestApi class](./rest-php.md).

## More information

* [List of all API calls](./rest-api.md)
* [Get logfile names for a date](./rest-get-logfiles-names.md)
* [Downloading a logfile in JSON format](rest-get-logfiles-json)
* [Downloading a logfile in CSV format](rest-get-logfiles-csv)
* [Downloading a logfile in XML format](rest-get-logfiles-xml)
