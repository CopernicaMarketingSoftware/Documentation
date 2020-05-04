# REST API example

Below you'll find a REST API script, written in PHP.
With this script you can easily make your first HTTP
request. All calls are supported: GET, POST, PUT & DELETE.

[Download the helper class](../../documentation/downloads/copernica_rest_api.php "Download the CopernicaRestAPI class")

## Use in your own application

Just copy and paste the script in your own application.
The script below lets you call the API from every script. The `$version`
variable should be replaced with a '2' for the newest version of the API.

```php
<?php
// required code
require_once('copernica_rest_api.php');

// create an api object (add your own access token!)
$api = new CopernicaRestApi("my-access-token", $version);

// do the call
$result = $api->get("databases");

// print the result
print_r($result);
```

## More information

* [Overview of REST API calls](./rest-api)
