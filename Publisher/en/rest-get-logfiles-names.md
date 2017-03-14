# REST API: fetch logfile names

Copernica keeps logfiles about several things such as clicks, opens, errors, 
accepted messages, etc. These logfiles can be downloaded with the API.
By sending an HTTP GET request to the following URL you will get a list of
all log files for a particular date.

`https://api.copernica.com/v1/logfiles/$date?access_token=xxxx`

where `$date` is the date for which you want to see the logfiles.

## Returned fields

This method returns a JSON array of logfile name. The types of logfiles
are provided in the table below. 

| prefix                                       | type of information                                                |
| -------------------------------------------- | ------------------------------------------------------------------ |
| [cdm-attempts](rest-cdm-attempts-logfile)         | General info about mails sent with Marketing Suite (MS)            |
| [cdm-abuse](rest-cdm-abuse-logfile)               | Info about mails sent via MS that triggered a notification        |
| [cdm-click](rest-cdm-click-logfile)               | Info about clicks generated from mails sent with MS                |
| [cdm-delivery](rest-cdm-delivery-logfile)         | Info about delivered mails sent with MS                            |
| [cdm-error](rest-cdm-error-logfile)               | Info about mails sent with MS that triggered an error              |
| [cdm-impression](rest-cdm-impression-logfile)     | Info about impressions from mails sent with MS                     |
| [cdm-retry](rest-cdm-retry-logfile)               | Info about mails sent via MS for which we retry a delivery         |
| [cdm-unsubscribe](rest-cdm-unsubscribe-logfile)           | Info about mails sent via MS that triggered an unsubscribe         |
| [pom-attempts](rest-pom-attempts-logfile)         | General info about mails sent with Publisher                       |
| [pom-abuses](rest-pom-abuses-logfile)             | Info about mails sent via Publisher that triggered an notification |
| [pom-clicks](rest-pom-clicks-logfile)             | info about clicks generated from mails sent with Publisher         |
| [pom-deliveries](rest-pom-deliveries-logfile)     | Info about delivered mails sent with Publisher                     |
| [pom-errors](rest-pom-errors-logfile)             | Info about failed mails sent with Publisher                        |
| [pom-impressions](rest-pom-impressions-logfile)   | Info about impressions from mails sent with Publisher              |
| [pom-retries](rest-pom-retries-logfile)           | Info about mails sent via Publisher for which we retry a delivery  |
| [pom-unsubscribes](rest-pom-unsubscribes-logfile) | Info about mails sent via Publisher that triggered an unsubscribe  |

To download a log file please see the links under "More information".

## PHP Example

The following PHP script demonstrates how to use the API method:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("logfiles/2017-02-12"));

For the example above you need the [CopernicaRestApi class](./rest-php.md).

## More information

* [List of all API calls](./rest-api.md)
* [Get names of log files](rest-get-logfiles-names)
* [Downloading a logfile in JSON format](./rest-get-logfiles-json.md)
* [Downloading a logfile in CSV format](./rest-get-logfiles-csv.md)
* [Downloading a logfile in XML format](./rest-get-logfiles-xml.md)
