# REST API: GET emailing templates (Publisher)

You can use the REST API to retrieve all emailing templates for an account 
with an HTTP GET call to the following URL:

`https://api.copernica.com/v2/publisher/emailingtemplates?access_token=xxxx`

## Available parameters

The following parameters are available for this call:

* **archived**: Boolean that indicates whether to only include archived templates (true) 
or only templates that are not archived (false). Returns both by default.
* **modifiedfromdate**: Date after which the templates should have been modified in YYYY-MM-DD HH:MM:SS format.
* **modifiedtodate**: Date before which the templates should have been modified in YYYY-MM-DD HH:MM:SS format.

## Returned fields

The method returns a JSON object where the **data* field contains an array 
with emailing templates. Each template contains the following information:

* **id**: The ID of the template.    
* **name**: The name of the template.
* **archived**: The archive status of the template.

## PHP example

The script below demonstrates how to use this API method. Don't forget 
to replace the ID in the URL before executing the call.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters for the call (exclude archived templates)
$params = new array(
    'archived'  => false
);

// execute the call
print_r($api->get("publisher/emailingtemplates", $params));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher emailing template](./rest-get-publisher-emailingtemplate)
