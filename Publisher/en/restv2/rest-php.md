# REST API example

Below you'll find a REST API script, written in PHP.
With this script you can easily make your first HTTP
request. All calls are supported: GET, POST, PUT & DELETE.

[Download the helper class](../downloads/CopernicaRestAPI.php "Download the CopernicaRestAPI class")

## Use in your own application

Just copy and paste the script in your own application.
The script below lets you call the API from every script. The `$version`
variable should be replaced with a '2' for the newest version of the API.
It will default to the older version 1 for backwards compatibility with
existing scripts.

```php
<?php
// required code
require_once('CopernicaRestAPI.php');

// create an api object (add your own access token!)
$api = new CopernicaRestApi("my-access-token", $version);

// do the call
$result = $api->get("databases");

// print the result
print_r($result);
```

## More information

* [Overview of REST API calls](./rest-api)
