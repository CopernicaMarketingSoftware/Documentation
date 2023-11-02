# REST API: GET Publisher personalized document (profile)

You can retrieve the perzonalized Publisher document for a profile by sending an HTTP GET call to the following URL:

`https://api.copernica.com/v3/profile/$profileID/publisher/document/$documentID?access_token=xxxx`

Where the `$profileID` should be replaced with the ID of the profile and the `$documentID` with the ID of the document. 

## Returned fields

The method returns a JSON object with the following information:

* **id**: ID of the document
* **template**: ID of the template
* **name**: name of the document
* **description**: description of the document
* **from_address**: from address of the document
* **subject**: subject of the document
* **archived**: the archive status of the document (true for archived, false for not archived)
* **source**: the personalized source of the document based on the given profile ID

### JSON example

The JSON look something like this:

```json
{
    "id": "285",
    "template": "114",
    "name": "Test",
    "description": "",
    "from_address": "\"Jeroen\" <info@copernica.com>",
    "subject": "Test",
    "archived": false,
    "source": "<html>\n\t<body>\nThis is a test message<br />\n</body>\n</html>"
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
print_r($api->get("profile/{$profileID}/publisher/document/{$documentID}"));
```

This example requires the [REST API class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
