# API reference
The Responsive Email API provides a simple RESTful interface. This means that
your application can access the API using the HTTP protocol. With simple (secure)
HTTP calls you can create, store and modify email messages (in raw HTML, prettified or MIME
format) and retrieve email statistics. All you need is an
[access-token](https://www.responsiveemail.com/app/#/admin/configuration/api/rest-token) and you are ready to go.

The API key is accessible via your Copernica account. Every request
starts with a [version number](../api/versions),
that allows us to make changes to the methods while keeping backwards
compatibility. With every request you also have to send an `access_token`
parameter to identify your application.

```
https://www.responsiveemail.com/v1/{RESOURCE}?access_token={YOUR_API_TOKEN}
```

> **Note:** API requests must use secure HTTPS connections. Unsecured HTTP
requests will result in a 400 Bad Request response. You can make a call to the API
with any programming language that supports HTTPS requests. The following is an
example of how to request the JSON representation of an email template using PHP.

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
?>
```

## Authentication
The API requires an application key (token) that is provided after you register
your app. The key identifies your application to the service, and is used to
track overall call usage. It's passed using the standard `access_token` parameter.
If you haven't have an API key yet, you can go to [SMTPeter.com](https://www.smtpeter.com)
got register and get one.

## Template ID
You can store a template on the responsiveemail.com servers. After storing your
template with a POST request, the API will return a link to your new template
and show the template ID in the JSON output. This ID can then be used to
retrieve the template via GET requests.

## Supported methods
The following table lists all the methods that are supported by the API.

### GET methods

| Method | Description                                                                                                                                             |
|:-----------------------------------------------------------------------------------------------------------------------------------------------------------------|
| [/v1/templates/{start}/{length}](../api/get-templates/) | Returns a list of your templates                                                                       |
| [/v1/template/{ID}/json](../api/get-template-json) | Returns the JSON representation of an email template.                                                       |
| [/v1/template/{ID}/html](../api/get-template-html) | Returns the HTML representation of an email for use inside an email.                                        |
| [/v1/template/{ID}/webversion](../api/get-template-webversion) | Returns the HTML representation of an email for us as a webversion.                             |
| [/v1/template/{ID}/mime](../api/get-template-mime) | Returns the MIME representation of an email, with externally hosted images                                  |
| [/v1/template/{ID}/embedded](../api/get-template-embedded) | Returns the MIME representation of an email, with embedded images                                   |
| [/v1/template/{ID}/text](../api/get-template-text) | Returns the text version of an email.                                                                       |

### POST methods

| Method | Description                                                                                                                                        |
|:------------------------------------------------------------------------------------------------------------------------------------------------------------|
| [/v1/template/{ID}/send](../api/post-template-send) | Send a template.                                                                                      |
| [/v1/template](../api/post-template) | Store a new template.                                                                                                |
| [/v1/send](../api/post-send) | Send an email.                                                                                                               |
| [/v1/html](../api/post-html) | Convert JSON input into a responsive HTML email, without creating a template resource                                        |
| [/v1/webversion](../api/post-webversion) | Convert JSON input into a responsive website, without creating a template resource                               |
| [/v1/mime](../api/post-mime) | Convert JSON input into MIME with externally hosted images, without creating a template resource                             |
| [/v1/embedded](../api/post-embedded) | Convert JSON input into MIME with embedded images, without creating a template resource                              |

### DELETE methods

| Method | Description                                                                                   |
|:-------------------------------------------------------------------------------------------------------|
| [/v1/template/{ID}](../api/delete-template) | Remove an existing template.                             |

## Create your first JSON document
Head over to the [JSON documentation](../json/introduction "JSON documentation") and learn how to create your first JSON documentation.
