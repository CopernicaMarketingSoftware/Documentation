# REST API: GET emailing templates (Marketing Suite)

You can use the REST API to retrieve all emailing templates for an account 
with an HTTP GET call to the following URL:

`https://api.copernica.com/v2/ms/templates?access_token=xxxx`

## Available parameters

The following parameters are available for this call:

* **name**: The name the template should have.   
* **keyword**: The keyword that should be linked to the template.
* **type**: The type of templates you want to retrieve ('json' or 'html'). By default both will be returned.
* **created_before**: Date before which the template should have been created in YYYY-MM-DD HH:MM:SS format.
* **created_after**: Date after which the template should have been created in YYYY-MM-DD HH:MM:SS format.

## Returned fields

The method returns a JSON object where the **data* field contains an array 
with emailing templates. Each template contains the following information:

* **id**: The ID of the template.    
* **name**: The name of the template.
* **from_address**: An array containing the name and the email 
address corresponding to the *from address* of the template.
* **subject**: The subject of the template.
* **type**: The type of the template ('json' or 'html').

## PHP example

The script below demonstrates how to use this API method. Don't forget 
to replace the ID in the URL before executing the call.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters for the call (only retrieve json templates)
$params = array(
    'type'  => 'json'
);

// execute the call
print_r($api->get("ms/templates", $params));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher emailing template](./rest-get-publisher-emailingtemplate)
