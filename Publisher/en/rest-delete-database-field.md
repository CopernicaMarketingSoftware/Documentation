# REST API: deleting a field from a database

When you send an HTTP DELETE request to the following URL, you’ll delete a field from a database:

`https://api.copernica.com/database/$id/field/$id?access_token=xxxx`

The first $id needs to be replaced by the numerical identifier, the ID, of the database. The second needs to be replaced by the ID or the name of the field you want to delete.

## PHP example
The following example demonstrates how to make a call using this method.

```PHP
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// do the call
$api->delete("database/1234/field/firstname");
```
This example uses the [CopernicaRestAPi class](rest-php).

## More information
- [Overview of all API calls](rest-api)
- [Requesting all fields from a database](rest-get-database-fields)
- [Creating a new field](rest-post-database-fields)
