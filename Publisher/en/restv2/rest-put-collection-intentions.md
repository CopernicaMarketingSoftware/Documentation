# REST API: POST collection intentions

The collection intentions indicate what type of communication is allowed with 
this collection. The intentions for email, sms, fax and pdf can all be enabled 
separately, to prevent accidental mailings.

The HTTP POST call to edit the intentions of a collection can be found at 
the following address:

`https://api.copernica.com/v2/collection/$id/intentions?access_token=xxxx`

The `$id` in the URL should be replaced by the unique identifier of the 
collection.

## Available parameters

The following parameters are available for the method. They are all optional 
and the intentions corresponding to the variables that are not used 
will not be changed.

* **email**: Boolean that indicates whether the intention for email should be enabled.
* **sms**: Boolean that indicates whether the intention for sms should be enabled.
* **fax**: Boolean that indicates whether the intention for fax should be enabled.
* **pdf**: Boolean that indicates whether the intention for pdf should be enabled.

Intentions can not be enabled if the corresponding field in the database 
does not exist.

## PHP example

The following example demonstrates how to use this method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this to your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters for the method
$data = array(
    'email' =>  true,
    'sms'   =>  true,
    'fax'   =>  true,
    'pdf'   =>  true
);

// voer het verzoek uit
$api->post("collection/{$collectionID}/intentions", $data);
```

This method requires the [CopernicaRestAPI class](./rest-php).

## More information

* [Overview of all REST API calls](./rest-api)
* [POST database intentions](./rest-post-database-intentions)
* [POST view intentions](./rest-post-database-intentions)
* [POST miniview intentions](./rest-post-database-intentions)

