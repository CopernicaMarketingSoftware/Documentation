# REST API: PUT document imageblock (Publisher)

A method to update a image block. This is an HTTP PUT 
method, accessible at the following address:

`https://api.copernica.com/v3/publisher/document/$id/imageblock/$id?access_token=xxxx`

Replace the first `$id` by the identifier of the document and the second `$id` by the identifier of the image block you want to edit.

## Available data

The following variables can be used in the body of the HTTP PUT request:

* **condition**: condition of the image block

## PHP example

The following example demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to be sent to the api
$data = array(
    'condition'   =>  '
        if (profile.gender == "men"){ 
            return true;
        }else{
            return false;
        }
    '
);

// do the call
$api->put("publisher/document/{$documentID}/imageblock/{$imageblockID}", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API calls](rest-api)
