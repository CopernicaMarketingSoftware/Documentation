# REST API: GET XML logfiles

Copernica keeps logfiles which you can request with the API. This method 
can be used to download a logfile as XML using its filename. If you don't 
know the filename please see "More information" for instructions. To 
execute the method you can send an HTTP GET request to the following URL:

`https://api.copernica.com/v3/logfile/$filename/xml?access_token=xxxx`

The `$filename` should be replaced by the name of the file you want to request.

## Returned value

An XML representation of the requested log file. An example is shown below.

```xml
<records>
    <record>
        <id>XXXXXXXXXX1</id>
        <time>2016-11-04 11:01:00</time>
        <mailingid>12345</mailingid>
        <profileid>1111111</profileid>
        <subprofileid>2</subprofileid>
        <databaseid>133</databaseid>
        <collectionid>0</collectionid>
        <senderdomain>copernica.com</senderdomain>
        <templateid>1234</templateid>
        <tags></tags>
        <email>employee1234@copernica.com</email>
    </record>
    <record>
        ...
    </record>
    ...
</records>
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
$api = new CopernicaRestAPI("your-access-token", 3);

// do the call, and print result
print_r($api->get("logfile/{$filename}/xml"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [GET logfile names](rest-get-logfiles-names)
* [GET JSON logfile](rest-get-logfiles-json)
* [GET CSV logfile](rest-get-logfiles-csv)
