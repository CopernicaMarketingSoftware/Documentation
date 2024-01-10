# REST API: GET snapshot (Marketing Suite mailing)

You can retrieve a snapshot of a Marketing Suite mailing by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v3/ms/emailing/$id/snapshot?access_token=xxxx`

Where the `$id` should be replaced with the ID of the mailing.

## Returned fields

The **data** field of returned JSON object contains the snapshot information. 
The following fields are available:

* **template**: The ID of the template used for the mailing.
* **name**: The name of the snapshot.
* **from_address**: The 'from address' from the mailing.
* **subject**: The subject of the mailing.

### JSON example

The JSON for the snapshot might look something like this:

```json
{  
   "template":"58",
   "name":"New emailing",
   "from_address":"\"Test\" <test@copernica.com>",
   "subject":"Title!"
}
```

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// execute the call
print_r($api->get("ms/emailing/{$emailingID}/snapshot/"));
```

This example requires the [REST API class](./rest-php).

## More information 

* [Overview of all REST API calls](./rest-api)

