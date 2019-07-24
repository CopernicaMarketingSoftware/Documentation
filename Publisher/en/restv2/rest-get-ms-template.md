# REST API: GET template (Marketing Suite)

You can use the REST API to retrieve a summary of an emailing template 
with an HTTP GET call to the following URL:

`https://api.copernica.com/v2/ms/template/$id?access_token=xxxx`

Where `$id` should be replaced with the ID of the emailing template you want summarized.

## Returned fields

The method returns a JSON object containing the following information:

* **id**: The ID of the template.    
* **name**: The name of the template.
* **from_address**: The from address for the template. Array containing a 'name' and 'email' field.
* **subject**: The template subject.
* **type**: The template type ('json' or 'html').

### JSON example 

The JSON will look something like this:

```json
{  
   "id":"2820",
   "name":"Theme: conference",
   "from_address":{  
      "name":"Infinity",
      "email":"info@valtaf.nl"
   },
   "subject":"Infinity conference",
   "type":"json"
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
print_r($api->get("ms/template/{$templateID}"));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
* [GET templates](./rest-get-ms-templates)
* [GET template body](./rest-get-ms-template-body)
