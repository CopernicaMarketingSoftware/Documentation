# Example code

As explained in the [API reference](../api/introduction), 
you can do a call to the API with any programming language that supports HTTP 
requests. These examples will only work with existing templates stored in your 
ResponsiveEmail.com account. You will need to fill in the id of said template 
and your own access token.

## PHP

```php
<?php
// create curl resource
$ch = curl_init();

// set url
$href = "https://www.responsiveemail.com/v1/template/$id/json?access_token=$token";
curl_setopt($ch, CURLOPT_URL, $href);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);

// get the status code (should be 200 if all went good)
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// do something with the result if we succeeded
if ($status == 200) {
  doSomethingWithResult($output);
}

// close curl resource to free up system resources
curl_close($ch);
```

## Python

```python
#/usr/bin/python2
import urllib2

id = 1
token = "my_access_token"

url = "https://www.responsiveemail.com/v1/template/%d/json/?access_token=%s" % (id, token)

try:
    result = urllib2.urlopen(url)
    doSomethingWithResult(result)
except urllib2.URLError, e:
    handleError(e)
```
