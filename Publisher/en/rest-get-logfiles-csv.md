# REST API: Download a log file as a csv file

Copernica keeps logfiles which you can request with the API. This method can be used to download a logfile as JSON using its filename. If you don't know the filename please see "More information" for instructions. To execute the method you can send an HTTP GET request to the following URL for a CSV file without header:

`https://api.copernica.com/v1/logfiles/$filename?access_token=xxxx`

If you want to have a header row with the field names included in the
csv you can send an HTTP GET request to:

`https://api.copernica.com/v1/logfiles/$filename/header?access_token=xxxx`

In both URLs `$filename` is the name of the file you want to request.

## Returned value

A csv file with optionally a header row of the requested log file. An example with header is shown below.

| id  |        time         | mailingid | profileid | subprofileid | databaseid | ... |
|-----|---------------------|-----------|-----------|--------------|------------|-----|
| XX1 | 2016-11-04 11:01:00 | 12345     | 111111    | 2            | 123        | ... |
| XX2 | 2016-11-04 11:06:00 | 12346     | 111112    | 3            | 123        | ... |

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
* [Get names of log files](rest-get-logfiles-names)
* [Downloading a logfile in JSON format](./rest-get-logfiles-json.md)
* [Downloading a logfile in CSV format](./rest-get-logfiles-csv.md)
* [Downloading a logfile in XML format](./rest-get-logfiles-xml.md)
