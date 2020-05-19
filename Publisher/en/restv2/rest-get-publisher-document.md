# REST API: GET document (Publisher)

You can use the REST API to retrieve a summary of an emailing document 
with an HTTP GET call to the following URL:

`https://api.copernica.com/v2/publisher/document/$id?access_token=xxxx`

Where `$id` should be replaced with the ID of the emailing document you want summarized.

## Available parameters

This method supports the **source** parameter, which indicates whether the 
HTML source of the document should be retrieved or not. By default it is set 
to 'true', but the method can be executed faster by setting this to 'false'.

## Returned fields

The method returns a JSON object containing the following information:

* **id**: The ID of the document.    
* **template**: The ID of the corresponding template.
* **name**: The name of the document.
* **from_address**: The from address for the document.
* **subject**: The subject of the document.
* **archived**: The archive status of the document. (1 for archived, null for not archived)
* **source**: The source of the document. 

### JSON example

The JSON for the document might look something like this:

```json
{  
   "id":"79",
   "template":"31",
   "name":"Hallo",
   "from_address":"\"test\" <test@copernica.nl>",
   "subject":"test",
   "archived":null,
   "source":"<html><head><title>Title</title></head><body><p>Paragraph</p></body></html>"
}
```

## PHP example

The script below demonstrates how to use this API method. Don't forget 
to replace the ID in the URL before executing the call.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("publisher/document/{$documentID}"));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
