# REST API: GET content (Publisher destination)

You can retrieve the content per emailing that is sent to the destination. You can 
retrieve this with the HTTP GET call to the following URL:

`https://api.copernica.com/v2/publisher/destination/$id/content/$type?access_token=xxx`

Where the `$id` should be replaced with the ID of the emailing destination. As optional paramater you could add the type (`html, amp, text or subject`) of the content. When you want to retrieve multiple content types you could combine those with `html+text+subject`. When there is no type specified, all types are returned.

## Returned fields

The method returns a JSON object with the following values:

* **html**: the HTML conent of the mailing,  van de mailing, if requested;
* **text**: the text conent of the mailing,  van de mailing, if requested;
* **amp**: the AMP conent of the mailing,  van de mailing, if requested;
* **subject**: the subject of the mailing, if requested;

### JSON example

The JSON for a single click looks somewhat like this:

```json
{  
    "html": "<b>HTML content</b>",
    "text": "Text content",
    "subject": "This is a test mailing"
}
```

## PHP example

This script demonstrates how to use this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// set the type
$parameters = array(
    'type'    =>  ‘html+test+subject’
);


// execute the call
print_r($api->get("publisher/destination/{$destinationID}/content/", $parameters));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher destination](./rest-get-publisher-destination)
* [Get abuses for a Publisher destination](./rest-get-publisher-destination-abuses)
* [Get deliveries for a Publisher destination](./rest-get-publisher-destination-deliveries)
* [Get errors for a Publisher destination](./rest-get-publisher-destination-errors)
* [Get impressions for a Publisher destination](./rest-get-publisher-destination-impressions)
* [Get unsubscribes for a Publisher destination](./rest-get-publisher-destination-unsubscribes)

