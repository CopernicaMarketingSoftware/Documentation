# REST API: PUT template translations (drag-and-drop-templates)

If you want to modify multiple translations with a single call to the API, you
can send a HTTP PUT request to the following URL:

`https://api.copernica.com/v4/ms/template/$id/translations`

The `$id` code should be replaced with the numeric identifier or the name
of the master template in which you want to modify translations. The new values
should be sent in the request body.

## Supported parameters

* **language**: language of the templates to modify (array)

## Body data

Besides the parameters you pass to the URL, you must also add body data to the PUT request. 
In the body of the request, you specify a "texts" array of the elements to be modified. These elements then contain an array with the language of the template and the new input.

To receive the unique IDs of the elements, you can use the [GET translations method](./rest-get-ms-template-translations)

## JSON example

The following JSON demonstrates how to use the API method:

URL: `https://api.copernica.com/v4/ms/template/{$tempalteID}/translations?languages[]=de_DE&languages[]=nl_NL&access_token=xxx`

```json
{
  "texts": {
    "73a5a4794893bbce6832ca706284ed31-attr-alt":{
        "nl_NL":"new_text",
        "de_DE":"new_textDE"
    }
  }
}
```

## PHP example

The following PHP script demonstrates how to call the API method:

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// parameters to select the languages
$parameters = array(
    'languages'  =>  array("nl_NL")
);

// elements to update
$texts = array(
    '73a5a4794893bbce6832ca706284ed31-attr-alt' =>  array(
        'nl_NL' => 'new_text'
    )
);

// the texts form the data for the call
$data = array(
    'texts'    =>  $texts
);
    
// do the call and print the result
print_r($api->put("ms/template/{$templateID}/translations", $data, $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](./rest-api.md)
