# REST API: GET template translations (drag and drop templates)

This method is used to retrieve translation from a template with the REST API. It uses 
an HTTP GET request to the following address:

`https://api.copernica.com/v4/ms/template/$id/translations`

## Available parameters

* **url**: option to retrieve only the URL attributes from the template (true/false)
* **simpleshorttext**: option to retrieve only the text attributes of less than or equal to 80 characters from the template (true/false)
* **simplelongtext**: option to retrieve from the template only the text attributes of more than 80 characters (true/false)
* **complextext**: option to retrieve only the HTML text attributes from the template (true/false)

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// parameters to be sent to the api
$parameters = array(
    'simpleshorttext' =>  true
);

// do the call
print_r($api->get("ms/templates/{$templateID}/translations", $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API methods](rest-api)
