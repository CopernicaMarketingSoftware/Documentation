# REST API: setting unsubscribe behaviour
For every database, you can set the unsubscribe algorithm. When Copernica’s servers receive an unsubscription, the unsubscribe behaviour determines what happens with the profile: should it be edited or removed?

To set this algorithm using an API call, make an HTTP PUT request to the following URL:
`https://api.copernica.com/v1/database/$id/unsubscribe?access_token=XXX`

In this, the variable $id has to be replaced by the numerical identifier of the database you wish to set the unsubscribe behaviour for. The new setting should be added to the body of the HTTP request.

## Available parameters
The following variables must be put into the body of the request:

- **behavior**: the setting itself
- **fields**: the new profile setting (only applicable if ‘behavior’ is set to ‘update’)

‘behavior’ has three possible values: nothing, remove and update. 'Nothing' means unsubscriptions are simply ignored (which is very impolite), 'remove' deletes unsubscribers and 'update' makes sure something is changed in the profile so you know it shouldn’t receive email any longer.

## PHP example
The following PHP script demonstrates how to use the method. In this example, when somebody unsubscribes, the field ‘newsletter’ is set to ‘no’.
```PHP
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// data to be sent to the api
$data = array(
    'behavior'      =>  'update',
    'fields'        =>  array('newsletter' => 'no')
);

// do the call
api->put("database/1234", array(), $data);
```

This example uses the [CopernicaRestApi class](rest-php).
## More information
- [Overview of all API method](rest-api)
- [Requesting unsubscribe behaviour](rest-get-database-unsubscribe)
