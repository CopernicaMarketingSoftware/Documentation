# REST API: GET JSON logfiles

Copernica keeps logfiles which you can request with the API. This method 
can be used to download a logfile as JSON using its filename. If you 
don't know the filename please see "More information" for instructions. 
To execute the method you can send an HTTP GET request to the following URL:

`https://api.copernica.com/v2/logfiles/$filename/json?access_token=xxxx`

where `$filename` is the name of the file you want to request.

## Returned value

A JSON representation of the requested log file. An example of such a 
logfile is shown below.

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

The following PHP script demonstrates how to use the API method. Don't forget 
to substitute the filename in the URL. An example of such a filename is 
`cdm-attempts.2016-11-04.log` to retrieve all delivery attemps made on the 4th 
of November 2016.

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// do the call, and print result
print_r($api->get("logfiles/{$filename}/json"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [GET logfile names](rest-get-logfiles-names)
* [GET CSV logfile](rest-get-logfiles-csv)
* [GET XML logfile](rest-get-logfiles-xml)
