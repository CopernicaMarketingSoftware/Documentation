# REST API: PUT database unsubscribe

For every database, you can set the unsubscribe algorithm separately. 
When Copernica’s servers receive an unsubscription the unsubscribe behaviour 
determines what happens with the profile: should it be edited or removed?
To set this algorithm using an API call, make an HTTP PUT request to the 
following URL:

`https://api.copernica.com/v4/database/$id/unsubscribe`

In this, the variable `$id` has to be replaced by the numerical identifier 
of the database you wish to set the unsubscribe behaviour for. The 
new setting should be added to the body of the HTTP request.

## Available data

The following data must be put into the body of the request:

- **behavior**: the setting itself
- **fields**: the new profile setting (only applicable if ‘behavior’ is 
set to ‘update’)

The parameter ‘behavior’ has three possible values: 'nothing', 'remove' and 'update'. 
'Nothing' means unsubscriptions are simply ignored, 'remove' deletes 
unsubscribers and 'update' can be used to change a property of the 
profile such that you can keep the information while respecting their 
wish not to receive more email.

## JSON example

The following JSON demonstrates how to use the API method:

```json
{
  "behavior": "update",
  "fields": {
      "newsletter": "no"
    }
}
```

## PHP example

The following PHP script demonstrates how to use the method. In this 
example, when somebody unsubscribes, the field ‘newsletter’ is set to ‘no’. 
You could use this field in a [newsletter selection](./create-a-mailing-list).

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data to be sent to the api
$data = array(
    'behavior'      =>  'update',
    'fields'        =>  array('newsletter' => 'no')
);

// do the call
$api->put("database/{$databaseID}/unsubscribe", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API method](rest-api)
- [GET database unsubscribe](rest-get-database-unsubscribe)
