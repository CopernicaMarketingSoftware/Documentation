# REST API: GET logfiles names

Copernica keeps logfiles about several things such as clicks, opens, errors, 
accepted messages, etc. These logfiles can be downloaded with the API.
By sending an HTTP GET request to the following URL you will get a list of
all log files for a particular date.

`https://api.copernica.com/v3/logfiles?access_token=xxxx&date=$date&type=$type`

In the URL you can add the `$date` parameter to search for logfiles for a 
specific date. You can also add `$type` to specify a specific type of 
logfile, like cdm-attempts (attempts for Marketing Suite). You can also 
use both. Using neither will return the [logfile dates](./rest-get-logfiles.md)

## Returned fields

This method returns a JSON array of logfile name. The types of logfiles
are provided in the table below. 

| Prefix                                            | Type of information                                                |
| --------------------------------------------------|--------------------------------------------------------------------|
| [cdm-attempts](rest-cdm-attempts-logfile)         | General info about mails sent with Marketing Suite (MS)            |
| [cdm-abuse](rest-cdm-abuse-logfile)               | Info about mails sent via MS that triggered a notification         |
| [cdm-click](rest-cdm-click-logfile)               | Info about clicks generated from mails sent with MS                |
| [cdm-delivery](rest-cdm-delivery-logfile)         | Info about delivered mails sent with MS                            |
| [cdm-error](rest-cdm-error-logfile)               | Info about mails sent with MS that triggered an error              |
| [cdm-impression](rest-cdm-impression-logfile)     | Info about impressions from mails sent with MS                     |
| [cdm-retry](rest-cdm-retry-logfile)               | Info about mails sent via MS for which we retry a delivery         |
| [cdm-unsubscribe](rest-cdm-unsubscribe-logfile)   | Info about mails sent via MS that triggered an unsubscribe         |
| [pom-attempts](rest-pom-attempts-logfile)         | General info about mails sent with Publisher                       |
| [pom-abuses](rest-pom-abuses-logfile)             | Info about mails sent via Publisher that triggered an notification |
| [pom-clicks](rest-pom-clicks-logfile)             | info about clicks generated from mails sent with Publisher         |
| [pom-deliveries](rest-pom-deliveries-logfile)     | Info about delivered mails sent with Publisher                     |
| [pom-errors](rest-pom-errors-logfile)             | Info about failed mails sent with Publisher                        |
| [pom-impressions](rest-pom-impressions-logfile)   | Info about impressions from mails sent with Publisher              |
| [pom-retries](rest-pom-retries-logfile)           | Info about mails sent via Publisher for which we retry a delivery  |
| [pom-unsubscribes](rest-pom-unsubscribes-logfile) | Info about mails sent via Publisher that triggered an unsubscribe  |
| [feedback-loop-errors](rest-feedback-loop-errors) | Info about errors in your feedback loops                           |

To download a log file please see the links under "More information" to 
find the instructions for the desired logfile format.

## PHP Example

The following PHP script demonstrates how to use the API method. Don't forget 
to substitute the date in the URL (YYYY-MM-DD format).

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// the array used to specify the date and/or type
$parameters = array(
    'type' =>     "cdm-attempts",
    'date' =>     "2019-01-01",
);

// do the call, and print result
print_r($api->get("logfiles", $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](./rest-api.md)
* [GET JSON logfile](rest-get-logfiles-json)
* [GET CSV logfile](rest-get-logfiles-csv)
* [GET XML logfile](rest-get-logfiles-xml)
