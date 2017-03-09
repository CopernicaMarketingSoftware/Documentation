# REST API: setting unsubscribe behaviour for a collection
For every collection you may also set the unsubscribe settings separately. 
When Copernica’s servers receive an unsubscription the unsubscribe behaviour determines what happens with the profile: should it be edited or removed?

To set this algorithm using an API call, make an HTTP PUT request to the following URL:

`https://api.copernica.com/v1/collection/$id/unsubscribe?access_token=xxxx'

In this, the variable $id has to be replaced by the numerical identifier of the collection you wish to set the unsubscribe behaviour for. The new setting should be added to the body of the HTTP request.

## Available parameters

The following variables must be put into the body of the request:

- **behavior**: the setting itself
- **fields**: the new profile setting (only applicable if ‘behavior’ is set to ‘update’)

‘behavior’ has three possible values: 'nothing', 'remove' and 'update'. 'Nothing' means unsubscriptions are simply ignored, 'remove' deletes unsubscribers and 'update' can be used to change a property of the profile such that you can keep the information while respecting their wish not to receive more email.

## PHP example

The following PHP script demonstrates how to use the method. In this example, when somebody unsubscribes, the field ‘newsletter’ is set to ‘no’.

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
    api->put("collection/1234", array(), $data);

This example uses the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API method](rest-api)
- [Requesting unsubscribe behaviour of a collection](rest-get-collection-unsubscribe)
