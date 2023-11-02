# REST API: POST template translations (drag and drop templates)

This method is used to create a new translation to a template with the REST API. It uses 
an HTTP POST request to the following address:

`https://api.copernica.com/v4/ms/template/$id/translations`

## Available parameters

* **language**: language of the template

## JSON example

The following JSON demonstrates how to use the API method:

```json
{
    "language": "de_DE"
}
```

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data to be sent to the api
$data = array(
    'language'          =>  'de_DE'
);

// do the call
$api->post("ms/template/$id/translations", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API methods](rest-api)
