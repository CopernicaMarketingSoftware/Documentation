# REST API: POST media library files

By sending an HTTP POST request to the following URL it is possible to import data:

`https://api.copernica.com/v3/medialibrary/$id/files?access_token=xxxx`

In this, `$id` should be replaced by the numerical identifier, the ID, 
or the name of the media library you want to add the file/image to. 

## PHP example

The following example demonstrates how to use this method.

```php
// the file to upload (with absolute path)
$file = "/home/path/to/file.jpg";
 
// ID of the media library we want to upload the file to
$ID = 4;
 
// the access token 
$token = 'xxx';
 
// the API endpoint for file uploads
$url = "https://api.copernica.com/v3/medialibrary/{$ID}/files?access_token={$token}";
 
// create the cURL file instance and set the name of the file
$cFile = curl_file_create($file, mime_content_type($file), 'name_of_the_file.png');
 
// open cURL session
$ch = curl_init($url);
 
// set POST type
curl_setopt($ch, CURLOPT_POST, 1);

// set content-type to multipart/form-data
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
 
// append the file
curl_setopt($ch, CURLOPT_POSTFIELDS, ['file' => $cFile]);
 
// execute the request
curl_exec($ch);
 
// close the cURL handle
curl_close($ch);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](rest-api)
