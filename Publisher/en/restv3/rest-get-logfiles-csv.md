# REST API: GET CSV logfiles

Copernica keeps logfiles which you can request with the API. This method 
can be used to download a logfile as CSV using its filename. If you don't 
know the filename please see "More information" for instructions. To 
execute the method you can send an HTTP GET request to the following URL 
for a CSV file without header:

`https://api.copernica.com/v3/logfile/$filename/csv?access_token=xxxx`

In both URLs `$filename` is the name of the file you want to request.

## Returned value

A CSV file with optionally a header row of the requested log file. In 
the table below is an example of what a CSV file could look like. In the 
real file, however, the values would be separated by commas instead of 
lines in a table.

| id  |        time         | mailingid | profileid | subprofileid | databaseid | ... |
|-----|---------------------|-----------|-----------|--------------|------------|-----|
| XX1 | 2016-11-04 11:01:00 | 12345     | 111111    | 2            | 123        | ... |
| XX2 | 2016-11-04 11:06:00 | 12346     | 111112    | 3            | 123        | ... |

## PHP Example

The following PHP script demonstrates how to use the API method. Don't forget 
to substitute the filename in the URL. An example of such a filename is 
`cdm-attempts.2016-11-04.log` to retrieve all delivery attemps made on the 4th 
of November 2016.

```php
// dependencies
require_once('copernica_rest_api.php');
   
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// do the call, and print result
print_r($api->get("logfile/{$filename}/csv"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [GET logfile names](rest-get-logfiles-names)
* [GET JSON logfile](rest-get-logfiles-json)
* [GET XML logfile](rest-get-logfiles-xml)
