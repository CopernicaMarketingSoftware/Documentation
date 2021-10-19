# REST API: PUT unsubscribe (Drag and drop templates)

By sending an HTTP PUT request to the following URL it is possible to unsubscribe a (sub)profile based on a mailing:

`https://api.copernica.com/v3/ms/emailing/$id/unsubscribe?access_token=xxxx`

## Available parameters

The following parameters are available for the method. The 'target' is required.
* **target**: The ID of the target (profile/subprofile) of the mailing.
* **behavior**: Do we need to execute the unsubscribe behavior of the database/collection? (true/false)
* **statistics**: Do we want to register an unsubscribe in the statistics of the mailing? (true/false)

## PHP example

The following example demonstrates how to use this method.

```php
<?php

// dependencies
require_once('copernica_rest_api.php');

// change this to your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to be sent to the api
$parameters = array(
    'target'        => 5555,
    'behavior'      => true,
    'statistics'    => false,
);

// do the call, and print result
print_r($api->put("ms/emailing/$id/unsubscribe", $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
