# REST API: POST view copy

This method is used to copy a view with the REST API. It uses 
an HTTP POST request to the following address:

`https://api.copernica.com/v2/view/$id/copy?access_token=xxxx`

The `$id` in the URL should be replaced by the view you want to copy. 
After a successful call the ID of copy is returned. Please note that it 
may take a while for the copy to be completed.

## Available parameters

This method can only be used to create a new view and takes the following 
parameters:

* **name**: Name for the new view (required)
* **options**: Array with options for copying (optional)

The options array can contain the following option:

* **views**: Boolean that indicates whether the views should be included in the copy.

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// set the options for copying
$options = array(
    'views'         =>  true
);

// copy data
$data = array(
    'name'      =>  'View (copy)',
    'options'   =>  $options
);

// copy the database
print_r($copyID = $api->post("view/{$viewID}/copy", $data));

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API methods](rest-api)
- [GET views](rest-get-views)
