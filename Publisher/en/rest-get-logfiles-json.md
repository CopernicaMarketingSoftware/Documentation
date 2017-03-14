# REST API: Download a log file as JSON

Copernica keeps logfiles which you can request with the API. This method can be used to download a logfile as JSON using its filename. If you don't know the filename please see "More information" for instructions. To execute the method you can send an HTTP GET request to the following URL:

`https://api.copernica.com/v1/logfiles/$filename/json?access_token=xxxx`

where `$filename` is the name of the file you want to request.

## Returned value

A JSON representation of the requested log file. An example of such a logfile is shown below.

```json
[
    {
        "id":"XXXXXXXXXX1",
        "time":"2016-11-04 11:01:00",
        "mailingid":12345,
        "profileid":1111111,
        "subprofileid":2,
        "databaseid":133,
        "collectionid":0,
        "senderdomain":
        "copernica.com",
        "templateid":1234,
        "tags":"",
        "email":"employee1234@copernica.com"
    },
    {
        "id":"XXXXXXXXXX2",
        "time":"2016-11-04 11:06:00",
        "mailingid":12345,
        "profileid":1111111,
        "subprofileid":2,
        "databaseid":133,
        "collectionid":0,
        "senderdomain":"copernica.com",
        "templateid":1234,
        "tags":"",
        "email":"employee1235@copernica.com"
    },
        ...
]
```

## PHP Example

The following PHP script demonstrates how to use the API method.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("logfiles/cdm-attempts.2016-11-04.log/json"));

For the example above you need the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [Get names of log files](rest-get-logfiles-names)
* [Downloading a logfile in JSON format](./rest-get-logfiles-json.md)
* [Downloading a logfile in CSV format](./rest-get-logfiles-csv.md)
* [Downloading a logfile in XML format](./rest-get-logfiles-xml.md)
