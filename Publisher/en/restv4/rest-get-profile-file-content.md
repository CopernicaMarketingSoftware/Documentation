# REST API: GET profile file content

Profiles can contain folders and subfolders containing files, pertaining 
to that specific profile. The specific file can be downloaded
by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v4/profile/$id/file/$id/content`

The first `$id` should be replaced with the numerical identifier of the profile 
you're requesting the file information about. The second `$id` should be the ID of the file.

## PHP Example

The following PHP script demonstrates how to use the API method.

```php
// dependencies
require_once('copernica_rest_api.php');
  
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// do the call, and print result
print_r($api->get("profile/{$profileID}/file/{$fileID}/content"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [GET profile](rest-get-profile)
