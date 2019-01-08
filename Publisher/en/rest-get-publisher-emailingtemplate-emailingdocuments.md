# REST API: GET emailing documents (Publisher template)

You can use the REST API to retrieve a all emailing documents 
belonging to a template with an HTTP GET call to the following URL:

`https://api.copernica.com/v2/publisher/emailingtemplate/$id/emailingdocuments?access_token=xxxx`

Where `$id` should be replaced with the ID of the emailing template you want 
to retrieve emailing documents for.

## Returned fields

The method returns a JSON object with an array of emailing documents 
in the **data** field. Each emailing document contains the following information:

* **id**: The ID of the document.    
* **template_id**: The ID of the corresponding template.
* **name**: The name of the document.
* **from_address**: The from address for the document.
* **subject**: The subject of the document.
* **source**: The source of the document. 

## PHP example

The script below demonstrates how to use this API method. Don't forget 
to replace the ID in the URL before executing the call.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
print_r($api->get("publisher/emailingtemplate/{$emailingTemplateID}/emailingdocuments"));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve an emailing template](./rest-get-publisher-emailingtemplate)
