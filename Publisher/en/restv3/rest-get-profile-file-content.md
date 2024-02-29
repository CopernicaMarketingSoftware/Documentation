# REST API: GET profile file download

Profiles can contain folders and subfolders containing files, pertaining 
to that specific profile. Information about a specific file can be retrieved 
by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v3/profile/$id/file/$id/content?access_token=xxxx`

The first `$id` should be replaced with the numerical identifier of the profile 
you're requesting the file information about. The second `$id` should be the ID of the file.

## Returned fields

This method returns a JSON object with the following data:

* **ID**: The file ID.
* **name**: The filename.
* **directory**: The directory the file is located in.
* **author**: The author of the file.
* **created**: Timestamp of creation of the file (YYYY-MM-DD hh:mm:ss format).
* **modified**: Timestamp of the last modification to the file (YYYY-MM-DD hh:mm:ss format).
* **size**: The file size in bytes.

### JSON example

The JSON response for a single file might look something like this:

```json
{  
   "ID":"20285",
   "name":"cat.png",
   "directory":"Images/Animals",
   "author":"Copernica BV",
   "created":"2008-08-25 16:14:56",
   "modified":"2010-08-25 16:15:56",
   "size":131364
}
```

## PHP Example

The following PHP script demonstrates how to use the API method.

```php
// dependencies
require_once('copernica_rest_api.php');
  
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// do the call, and print result
print_r($api->get("profile/{$profileID}/file/{$fileID}/json"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [GET profile](rest-get-profile)
