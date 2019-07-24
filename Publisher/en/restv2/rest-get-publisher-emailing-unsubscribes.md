# REST API: GET unsubscribes (Publisher mailing)

Each emailing is tracked, which allows Copernica to provide you with 
emailing statistics. Unsubscribes are one of these statistics. You can 
retrieve the unsubscribes for an emailing by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v2/publisher/emailing/$id/unsubscribes?access_token=xxxx`

Where the `$id` should be replaced with the ID of the emailing. This method 
also support the use of the [fields parameter](./rest-fields-parameter) 
for the **timestamp** field.

## Returned fields

The method returns a JSON object with several unsubscribes in the 'data' field. 
For each unsubscribe the following information is available:

* **ID**: The ID of the unsubscribe. 
* **timestamp**: The timestamp of the unsubscribe.
* **source**: The source of the unsubscribe: Either from a link or an email.
* **success**: Whether the unsubscribe was successful or not.
* **emailing**: The ID of the emailing.
* **destination**: The ID of the destination.
* **profile**: The ID of the profile.
* **subprofile**: The ID of the subprofile (if applicable).

### JSON example

A single unsubscribe might look something like this:

```json
{  
   "ID":"1",
   "timestamp":"2011-11-09 12:42:35",
   "source":"link",
   "success":true,
   "emailing":"42341",
   "destination":"847259",
   "profile":"5063195",
   "subprofile":null
}
```

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("publisher/emailing/{$emailingID}/unsubscribes/"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher emailing](./rest-get-publisher-emailing)
* [Get abuses for a Publisher emailing](./rest-get-publisher-emailing-abuses)
* [Get clicks for a Publisher emailing](./rest-get-publisher-emailing-clicks)
* [Get deliveries for a Publisher emailing](./rest-get-publisher-emailing-deliveries)
* [Get errors for a Publisher emailing](./rest-get-publisher-emailing-errors)
* [Get impressions for a Publisher emailing](./rest-get-publisher-emailing-impressions)
