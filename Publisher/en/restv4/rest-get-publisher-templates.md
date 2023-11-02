# REST API: GET emailing templates (Publisher)

You can use the REST API to retrieve all emailing templates for an account 
with an HTTP GET call to the following URL:

`https://api.copernica.com/v3/publisher/templates?access_token=xxxx`

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

### JSON example

The JSON for a single template will look something like this:

```json
{  
   "id":"551",
   "name":"TestTemplate",
   "archived":false
}
```

## PHP example

The script below demonstrates how to use this API method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters for the call (exclude archived templates)
$params = array(
    'archived'  => false
);

// execute the call
print_r($api->get("publisher/templates", $params));
```

This example requires the [REST API class](./rest-php)

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve a Publisher template](./rest-get-publisher-template)
