# REST API: GET hyperlink extensions (Publisher)

This method can be used if you want to retrieve the hyperlink extensions of Publisher (HTML) mailings. By sending a GET request to the following URL,
you can fetch the hyperlink extensions:

`https://api.copernica.com/v4/publisher/emailing/$id/hyperlinkextensions`

```json
{
    "all": {
       "utm_source": "copernica",
       "utm_medium": "email",
       "utm_campaign": "test_message",
       "utm_content": "button"
    },
    "copernica.com": {
       "utm_source": "copernica",
       "utm_medium": "email",
       "utm_campaign": "test_message",
       "utm_content": "link"
    }
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
print_r($api->get("publisher/emailing/$id/hyperlinkextensions", $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](./rest-api.md)
