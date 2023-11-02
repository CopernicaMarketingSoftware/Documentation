# REST API: GET emailing errors (Marketing Suite)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Errors are one of these statistics. You can 
retrieve all errors for a specific emailing by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v4/ms/emailing/{$emailingID}/errors?access_token=xxxx`

## Parameters

The parameters for this method can be set to retrieve the statistics from 
a certain period. The following optional parameters are available:

* **begintime**: The timestamp after which the errors must have occurred (YYYY-MM-DD HH:MM:SS format).
* **endtime**: The timestamp before which the errors must have occurred (YYYY-MM-DD HH:MM:SS format).

## Returned fields

The method returns a JSON object with several errors. For each error 
the following information is available:

* **ID**: The ID of the error.
* **mailing**: The ID of the mailing.
* **timestamp**: The timestamp of the error.
* **status**: The status of the error.
* **errorcode**: The code associated with this error.
* **description**: A description of the error.
* **errortype**: The type of error this was recognized as.
* **destination**: The ID of the destination that caused an error.
* **profile**: The ID of the profile that caused an error.
* **subprofile**: The ID of the subprofile that caused an error.

### JSON example

A single error might look something like this:

```json
{  
   "ID":"2",
   "mailing":"234",
   "timestamp":"2015-03-09 15:36:39",
   "status":null,
   "errorcode":"0",
   "description":"No valid from address is set",
   "errortype":"",
   "destination":"764416",
   "profile":null,
   "subprofile":null
}
```

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// execute the call
print_r($api->get("ms/emailing/{$emailingID}/errors"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Get all errors](./rest-get-ms-errors)
* [Get emailing abuses](./rest-get-ms-emailing-abuses)
* [Get emailing clicks](./rest-get-ms-emailing-clicks)
* [Get emailing deliveries](./rest-get-ms-emailing-deliveries)
* [Get emailing impressions](./rest-get-ms-emailing-impressions)
* [Get emailing unsubscribes](./rest-get-ms-emailing-unsubscribes)
