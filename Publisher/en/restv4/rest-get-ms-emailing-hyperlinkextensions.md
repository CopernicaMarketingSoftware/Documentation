# REST API: GET hyperlink extensions (Marketing Suite)

This method can be used if you want to retrieve the hyperlink extensions of Marketing Suite (drag and drop) mailings. By sending a GET request to the following URL,
you can fetch the hyperlink extensions:

`https://api.copernica.com/v4/ms/emailing/$id/hyperlinkextensions?access_token=xxxx`

```json
{
    "data": [
    {
         "parameter": "utm_source",
         "value": "copernica",
         "type": "setparameter",
         "last": false,
         "unique": false,
         "checks": []
    },
    {
         "parameter": "utm_medium",
         "value": "email",
         "type": "setparameter",
         "last": false,
         "unique": false,
         "checks": []
    },
    {
         "parameter": "utm_campaign",
         "value": "test_message",
         "type": "setparameter",
         "last": false,
         "unique": false,
         "checks": []
    },
    {
         "parameter": "utm_content",
         "value": "button",
         "type": "setparameter",
         "last": false,
         "unique": false,
         "checks": []
    },
    {
         "parameter": "utm_content",
         "value": "link",
         "type": "setparameter",
         "last": false,
         "unique": false,
         "checks": [
         {
             "type": "domain",
             "value": "copernica.com",
             "comparison": "contains"
         }]
    }]
}
```

## PHP example

The following PHP script calls this API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// do the call, and print result
print_r($api->get("ms/emailing/$id/hyperlinkextensions", $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](./rest-api.md)
