# REST API: GET view views

Copernica supports nested selections. To obtain a list of all selections that
are nested under a higher level selection you can send a HTTP GET request
to the following URL:

`https://api.copernica.com/v3/database/$id/views?access_token=xxxx`

In this, `$id` needs to be replaced by the numerical identifier of the selection
that you wish to request the subselections of.

## Available parameters

The following parameters can be added to the URL as variables:

- **start**: the first selection to be requested
- **limit**: length of the batch that is requested
- **total**: whether or not the total number of selections should be counted

More information on the meaning of these parameters can be found [in the article on paging](rest-paging).

## Returned fields

The method returns a JSON object with views in the **data** field. 
Each view has the following fields: 

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

The JSON for a single view might look something like this:

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

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters to pass to the call
$parameters = array(
    'limit'     =>  100
);

// do the call, and print result
print_r($api->get("view/{$viewID}/views", $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API methods](rest-api)
* [POST view views](rest-post-view-views)
* [GET database views](rest-get-database-views)
* [GET view rules](rest-get-view-rules)
