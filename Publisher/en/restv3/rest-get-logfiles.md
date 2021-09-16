# REST API: GET logfiles (dates)

Copernica keeps logfiles about several things such as clicks, opens, 
errors, accepted messages, etc. See  
[the article on retrieving logfile names](./rest-get-logfiles-names.md) 
for more information on available logfiles. These logfiles can be downloaded with 
the API. By sending an HTTP GET request to the following URL you will 
get a list of all dates we have kept logfiles of.

`https://api.copernica.com/v3/logfiles?access_token=xxxx`

## Returned fields

This method returns a JSON array of date strings. To download a logfile 
please see the links under "More information".

## PHP Example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// do the call, and print result
print_r($api->get("logfiles"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](./rest-api.md)
* [GET logfile names](./rest-get-logfiles-names.md)
* [GET JSON logfile](rest-get-logfiles-json)
* [GET CSV logfile](rest-get-logfiles-csv)
* [GET XML logfile](rest-get-logfiles-xml)
