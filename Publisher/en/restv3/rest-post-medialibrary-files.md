# REST API: POST media library files

By sending an HTTP POST request to the following URL it is possible to import data:

`https://api.copernica.com/v3/medialibrary/$id/files?access_token=xxxx`

In this, `$id` should be replaced by the numerical identifier, the ID, 
or the name of the media library you want to add the file/image to. 

## File upload
To upload files to the REST API you can use HTTP POST requests. But beware, the content-type of the calls, unlike the other POST calls, must be set to "multipart/form-data". The body data of the request must also be sent in this multipart format (and not in JSON or application/x-www-form-urlencoded format as with the other POST calls).

The name you give to the variables is irrelevant. In our examples we use "file", but this can be anything. The content-type that you give to the file may be relevant, because images can be processed differently than regular files. This is especially relevant when uploading to a media library.

If you use PHP and CURL, CURL takes care of this for you. By making a CURL call with CURLFile objects, PHP/CURL will automatically switch to multipart encoding.

## PHP example

The following example demonstrates how to use this method.

```php
// the file to upload (with absolute path)
$file = "/home/path/to/file.ext";
 
// ID of the media library we want to upload the file to
$ID = 4;
 
// the access token 
$token = 'xxx';
 
// the API endpoint for file uploads
$url = "https://api.copernica.com/v3/medialibrary/{$ID}/files?access_token={$token}";
 
// open cURL session
$ch = curl_init($url);
 
// set POST type
curl_setopt($ch, CURLOPT_POST, 1);

// set content-type to multipart/form-data
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
 
// append the file
curl_setopt($ch, CURLOPT_POSTFIELDS, ['file' => new CURLFile($file, mime_content_type($file)]);
 
// execute the request
curl_exec($ch);
 
// close the cURL handle
curl_close($ch);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](rest-api)
