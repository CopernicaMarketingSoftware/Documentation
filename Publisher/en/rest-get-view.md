# REST API: fetch selection meta data

A method to request all metadata from a database. This method does not 
support parameters. It is called using the following address:

`GET https://api.copernica.com/v1/view/$id?access_token=xxxx`

## Returned fields

**ID**: unique numerical identifier
**name**: name of the selection
**description**: description of the selection
**parent-type**: type of the parent: view or database
**parent-id**: id of the database or view
**has-children**: boolean, are there nested selections?
**has-referred**: boolean, are there selections that refer to this selection?
**has-rules**: boolean, does this selection have selection rules?

## PHP example

The following example demonstrates how to use this method:

```PHP
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// do the call, and print result
print_r($api->get("view/1234"));
```
This example uses the [CopernicaRestAPi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [Fetch selection rules](./rest-get-view-rules)
