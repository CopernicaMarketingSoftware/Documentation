# Download a log file as JSON

If you want to download a logfile as JSON you can send an HTTP GET
request to the following URL:

`https://api.copernica.com/v1/logfiles/$filename/json?access_token=xxxx`

## Returned value

A JSON representation of the requested log file.

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
* [Log file information](rest-logfiles-names)
