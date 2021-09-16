# REST API: GET database fields

This method is used to request all fields in a database. It is an HTTP 
GET call to the following address:

`https://api.copernica.com/v3/database/$id/fields?access_token=xxxx`

In this, `$id` should be replaced by the numerical identifier or the name 
of the database you want to request the fields of.

## Available parameters

This method only support paging parameters. More information on these 
parameters can be found [in the article on paging](./rest-paging.md).

## Returned fields

The method returns a list of fields in the database. For each field, 
the following properties are displayed:

| Name          | Description                                                                                   |
|---------------|-----------------------------------------------------------------------------------------------|
| **ID**        | ID of the field in the database                                                               |
| **name**      | The name of the field (mandatory)                                                             |
| **type**      | Type of the field                                                                             |
| **value**     | Default value of the field                                                                    |
| **displayed** | Boolean value to determine whether or not the field should be displayed in the user interface |
| **ordered**   | Boolean value to determine whether or not profiles should be ordered by this field            |
| **length**    | Maximum text length for a text field                                                          |
| **textlines** | Number of text lines allowed for the field (used in forms)                                    |
| **hidden**    | Boolean value to determine whether or not the field should be hidden in the user interface    |
| **index**     | Boolean value to determine whether or not the field should be indexed                         |

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters to pass to the call
$parameters = array(
    'limit'     =>  100
);
	
// do the call, and print result
print_r($api->get("database/{$databaseID}/fields", $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API methods](./rest-api)
* [POST database fields](./rest-post-database-fields)
* [PUT database field](./rest-put-database-field)
* [DELETE database field](./rest-delete-database-field)
