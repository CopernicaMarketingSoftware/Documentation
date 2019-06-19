# REST API: GET view

A method to request all metadata from a view. This method does not 
support parameters. It is called by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v2/view/$id?access_token=xxxx`

In this, `$id` needs to be replaced by the numerical identifier or the 
name of the view you wish to request the selections for.

## Returned fields

The method returns a JSON object with the following fields: 

* **ID**: Unique numerical identifier.
* **name**: Name of the selection.
* **description**: Description of the selection.
* **parent-type**: Type of the parent: view or database.
* **parent-id**: ID of the database or view.
* **has-children**: Boolean value: whether or not the database has selections nested underneath it.
* **has-referred**: Boolean value: whether or not there are other selections that refer to this selection.
* **has-rules**: Boolean value: whether or not the selection has selection rules.
* **database**: ID of the database this selection belongs to.
* **last-built**: Timestamp of the last time the view was built.

### JSON example

The JSON for a view might look something like this:

```json
{  
   "ID":"4184",
   "name":"Leadscoring",
   "description":"",
   "parent-type":"database",
   "parent-id":"7616",
   "has-children":false,
   "has-referred":false,
   "has-rules":true,
   "database":"7616",
   "last-built":"2019-04-17 00:21:26"
}
```

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// do the call, and print result
print_r($api->get("view/{$viewID}"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [GET view rules](./rest-get-view-rules)
