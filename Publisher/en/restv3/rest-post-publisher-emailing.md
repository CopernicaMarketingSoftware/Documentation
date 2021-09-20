# REST API: POST emailing (Publisher)

You can post a Publisher mailing with our REST API if you have 
already completed a template and prepared your database. To send a new 
mailing you send an HTTP POST request to the following URL:

`https://api.copernica.com/v3/publisher/emailing?access_token=xxxx`

## Available parameters

The call has several parameters, with the 'settings' parameter being 
the only one that is optional.

* **target**: The ID of the emailing target.
* **targettype**: The type of the target (database, collection, view, miniview, profile or subprofile)
* **document**: The ID of the document to use.
* **settings**: An array with settings for the emailing. This can be used 
to schedule emailings instead of sending immediately for example.

The settings array offers the following options, all of which are optional:

* **start**: String representing the start date or false to start immediately.
* **interval**: An array containing the interval specification. Should contain 
a 'count' and a 'unit'. To send an email every two weeks for example 'count' should be 
set to 2 and 'unit' to 'week'.
* **iterations**: Number of times you want to send the email. Entering a negative 
number means the emailing will be sent indefinitely.
* **description**: Description of the emailing.
* **nodoubles**: Indicates whether double addresses should be skipped ('true') or not ('false').
* **personalized**: Indicates whether each mail should be personalized ('true') or not ('false'). See
the [article on personalization](../personalization.md) for more information.
* **test**: Indicates whether the mailing is used for testing ('true') or not ('false').
* **contenttype**: Indicates the content type ('html', 'text', 'both').
* **embeddedimages**: Indicates whether the images are embedded ('true') or hosted on a separate webserver ('false').
* **cacheimages**: Indicates whether external images should be cached ('true') or not ('false').

Make sure your document is complete before posting the call. The mailing 
can not be sent without a valid subject and from address. You should also 
make sure your [sender domain](../sender-domains) is configured correctly 
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

// emailing settings
$settings = array(
    'start'         => '2019-01-01'
    'interval'      => array(   
                                'count'    =>  6,
                                'unit'     => 'month'
                    ),
    'iterations'    => -1
);

// parameters to pass to the call
$parameters = array(
    'target'        => $targetID,
    'targettype'    => $targetType,
    'document'      => $documentID,
    'settings'      => $settings
);

// execute the call
print_r($api->post("publisher/emailing", $parameters));

// returns the id of created request if succesful
```

This example requires our [REST API class](rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [Retrieve all Publisher mailings](./rest-get-publisher-emailings)
* [Send a Marketing Suite mailing](./rest-post-ms-emailing)
