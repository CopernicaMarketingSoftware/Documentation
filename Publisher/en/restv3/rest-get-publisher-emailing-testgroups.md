# REST API: GET testgroups (Publisher mailing)

You can retrieve the test groups of a Publisher mailing by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v3/publisher/emailing/$id/testgroups?access_token=xxxx`

Where the `$id` should be replaced with the ID of the mailing.

## Returned fields

The **data** field of returned JSON object contains the test groups. 
The following fields are available for each test group:

* **ID**: The ID of the testgroup
* **document**: The ID of the document of the mailing.
* **name**: The name of the mailing snapshot sent to this group.
* **from_address**: The 'from address' of the mailing.
* **subject**: The subject of the mailing.
* **timestamp**: The timestamp of the mailing.
* **destinations**: The number of destinations in this group.

### JSON example

The JSON for a testgroup might look something like this:

```json
{  
   "ID":"2481",
   "document":"12",
   "name":"Testgroup 1",
   "from_address":"\"Mr. Test\" <test@copernica.com>",
   "subject":"Emailing!",
   "timestamp":"2010-10-12 12:37:26",
   "destinations":"1"
}
```

## PHP example

The following script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("publisher/emailing/{$emailingID}/testgroups/"));
```

This example requires the [REST API class](./rest-php).

## More information 

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher emailing](./rest-get-publisher-emailing)

