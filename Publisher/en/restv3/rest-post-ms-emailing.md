# REST API: POST emailing (Marketing Suite)

You can post a Marketing Suite mailing with our REST API if you have
already completed a template and prepared your database. To send a new
mailing you send an HTTP POST request to the following URL:

`https://api.copernica.com/v3/ms/emailing?access_token=xxxx`

## Available parameters

There are three parameteres available, all of them required.

* **target**: The ID of the emailing target.
* **targettype**: The type of the target (database, collection, view, miniview, profile or subprofile)
* **template**: The ID of the template to use.

Make sure your template is complete before posting the call. The mailing
can not be sent without a valid subject and from address. You should also
make sure your [sender domain](./sender-domains) is configured correctly
before attempting to send a mailing.

## PHP example

The following script demonstrates how to call the API method. Don't
forget to substitute the parameters for your own target and template.

```php
<?php

// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters to pass to the call
$parameters = array(
    'target'                  => $targetID,
    'targettype'              => $targetType,
    'template'                => $templateID,
);

// execute the call
print_r($api->post("ms/emailing", $parameters));

// returns the id of created request if succesful
```

This example requires our [REST API class](rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve all Marketing Suite mailings](./rest-get-ms-emailings)
* [Send a scheduled Marketing Suite mailing](./rest-post-ms-scheduledemailing)
* [Send a Publisher mailing](./rest-post-publisher-emailing)
