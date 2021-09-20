# REST API: POST view copy

Selections are rebuilt multiple times a day, but in some cases you might 
want to trigger a rebuild manually, for example if you just changed the 
selection rules and want to send an emailing to this selection. You can 
trigger a rebuild by sending an HTTP POST request to the following 
URL:

`https://api.copernica.com/v3/view/$id/rebuild?access_token=xxxx`

The `$id` in the URL should be replaced by the view you want to rebuild. 
Please note that it might take a while to rebuild the view. To check if 
the rebuild was completed you can retrieve the [view summary](./rest-get-view) 
and check the last-built property.

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// copy the database
print_r($copyID = $api->post("view/{$viewID}/rebuild"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API methods](./rest-api)
* [GET views](./rest-get-views)
* [GET view](./rest-get-view)
