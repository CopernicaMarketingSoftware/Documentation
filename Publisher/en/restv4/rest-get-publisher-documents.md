# REST API: GET documents (Publisher)

You can use the REST API to retrieve all emailing documents for an account 
with an HTTP GET call to the following URL:

`https://api.copernica.com/v4/publisher/documents`

## Available parameters

The following parameters are available for this call:

* **archived**: Boolean that indicates whether to only include archived documents (true) 
or only documents that are not archived (false). Returns both by default.
* **source**: Boolean that indicates whether to include the HTML source. This is set to 'true' by default, 
but the call can be executed faster when set to 'false'.
* **modifiedfromdate**: Date after which the documents should have been modified in YYYY-MM-DD HH:MM:SS format.
* **modifiedtodate**: Date before which the documents should have been modified in YYYY-MM-DD HH:MM:SS format.

Paging parameters **start**, **limit** and **total** are also supported. More
information about these parameters can be found in the [article on paging](rest-paging).

## Returned fields

The method returns a JSON object where the **data* field contains an array 
with emailing documents. Each document contains the following information:

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

The script below demonstrates how to use this API method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// parameters for the call (exclude archived documents)
$params = array(
    'archived'  => false
);

// execute the call
print_r($api->get("publisher/documents", $params));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher document](./rest-get-publisher-document)
