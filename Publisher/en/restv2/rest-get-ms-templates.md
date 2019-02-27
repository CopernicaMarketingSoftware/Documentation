# REST API: GET emailing templates (Marketing Suite)

You can use the REST API to retrieve all emailing templates for an account 
with an HTTP GET call to the following URL:

`https://api.copernica.com/v2/ms/templates?access_token=xxxx`

## Available parameters

The following parameters are available for this call:

* **name**: Retrieve templates with this name.
* **keyword**: Retrieve templates with this keyword.
* **type**: Type of template ('json' or 'html').
* **created_before**: Date after which the templates should have been created in YYYY-MM-DD HH:MM:SS format.
* **created_after**: Date before which the templates should have been created in YYYY-MM-DD HH:MM:SS format.

## Returned fields

The method returns a JSON object where the **data* field contains an array 
with emailing templates. Each template contains the following information:

* **id**: The ID of the template.    
* **name**: The name of the template.
* **from_address**: The from address for the template. Array containing a 'name' and 'email' field.
* **subject**: The template subject.
* **type**: The template type ('json' or 'html').

## PHP example

The script below demonstrates how to use this API method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters for the call (only retrieve JSON templates)
$params = array(
    type    = 'json'
);

// execute the call
print_r($api->get("ms/templates", $params));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Marketing Suite template](./rest-get-ms-template)
