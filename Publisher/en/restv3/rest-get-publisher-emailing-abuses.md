# REST API: GET abuses (Publisher mailing)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Abuses are one of these statistics. You can 
retrieve the abuses for an emailing by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v3/publisher/emailing/$id/abuses?access_token=xxxx`

Where the `$id` should be replaced with the ID of the emailing. This method 
also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** of the emailing.

## Returned fields

The method returns a JSON object with several abuses under the 'data' field. 
For each abuse the following information is available:

* **ID**: ID of the abuse.
* **timestamp**: Timestamp of the abuse.
* **recognized_as**: What the abuse was recognized as ('arf', 'JMR', 'none').
* **feedback_type**: The type of feedback for the abuse ('abuse', 'dkim', 'fraud', 'miscategorized', 'not-spam', 'opt-out' or 'other')
* **arf_version**: Version of the ARF protocol used for this abuse.
* **details**: The abuse report (if available).
* **emailing**: ID of the emailing.
* **destination**: ID of the destination.
* **profile**: ID of the profile.
* **subprofile**: ID of the subprofile (if applicable)

### JSON example

A single abuse might look something like this:

```json
{  
   "ID":"2",
   "timestamp":"2009-12-01 10:00:00",
   "recognized_as":"arf",
   "feedback_type":"opt-out",
   "arf_version":"0.1",
   "details":"",
   "emailing":"613",
   "destination":"60716",
   "profile":"2231853",
   "subprofile":null
}
```

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// set the period
$parameters = array(
    'fields'    =>  array('timestamp>2019-01-01', 'timestamp<2019-02-01')
);

// execute the call
print_r($api->get("publisher/emailing/{$emailingID}/abuses/", $parameters));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher emailing](./rest-get-publisher-emailing)
* [Get clicks for a Publisher emailing](./rest-get-publisher-emailing-clicks)
* [Get deliveries for a Publisher emailing](./rest-get-publisher-emailing-deliveries)
* [Get errors for a Publisher emailing](./rest-get-publisher-emailing-errors)
* [Get impressions for a Publisher emailing](./rest-get-publisher-emailing-impressions)
* [Get unsubscribes for a Publisher emailing](./rest-get-publisher-emailing-unsubscribes)
