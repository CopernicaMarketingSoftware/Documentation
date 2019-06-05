# REST API: GET subprofile emailings (Publisher)

A method to request a list of all mailings sent from Publisher to a specific subprofile. 
This is an HTTP GET call to the following address:

`https://api.copernica.com/v2/subprofile/{$subprofileID}/publisher/emailings?access_token=xxxx`

## Available parameters

* **type**: The type of mailing between mass or individual, defaults to both.
* **followups**: Indicates if we only use follow-up mailings ("yes"), only mailings 
that were *not* the result of a follow-up ("no") or all mailings ("both"). Defaults to "both".
* **test**: Indicates if we only use test mailings ("yes"), only mailings 
that were *not* a test ("no") or all mailings ("both"). Defaults to "both".
* **mindestinations**: Only retrieve mailings at least this many destinations.
* **maxdestinations**: Only retrieve mailings with at most this many destinations.
* **fromdate**: Only retrieve mailings sent after this date.
* **todate**: Only retrieve mailings sent before this date.

This method also supports [paging parameters](./rest-paging).

## Returned fields

The method returns a JSON object with several emailings in the **data** field. 
Each emailing contains the following fields:

* **id**: The ID of the mailing
* **timestamp**: The timestamp
* **document**: ID of the document used for the mailing
* **template**: ID of the template used for the mailing
* **subject**: Subject of the mailing
* **from_address**: The from address of the mailing as an array. (With properties 'name' and 'email')
* **destinations**: The number of destinations.
* **testgroups**: Amount of testgroups
* **finalgroup**: ID of the final group (only relevant in case of a splitrun)
* **type**: The type of mailing: mass or individual.
* **clicks**: Amount of clicks for this mailing
* **impressions**: Amount of opens for this mailing
* **contenttype**: The type of content in the mailing: html, text or both.
* **target**: Array containing the target type and the ID and type of its sources (for example the database a collection belongs to).

### Example

The JSON might look something like this:

```json
Array
(
    [id] => 1181
    [timestamp] => 2010-04-14 15:02:14
    [document] => 104
    [template] => 61
    [subject] => "Hello!"
    [from_address] => Array
        (
            [name] => Copernica BV
            [email] => support@copernica.com
        )

    [destinations] => 1
    [testgroups] => 0
    [finalgroup] => 1409
    [type] => individual
    [clicks] => 5
    [impressions] => 2
    [contenttype] => html
    [target] => Array
        (
            [type] => database
            [sources] => Array
                (
                    [0] => Array
                        (
                            [id] => 478
                            [type] => database
                        )

                )

        )

)
```

## PHP Example

The following script demonstrates how to use this method. Because we use the 
CopernicaRestApi class, you don't have to worry about escaping special characters 
in the URL; it is done automatically.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters to pass to the call
$parameters = array(
    'limit'                 => 10,
    'include_subprofiles'   => 'yes',
    'type'                  => 'mass',
    'followups'             => 'no',
    'registerclicks'        => 'yes',
);

// do the call, and print result
print_r($api->get("subprofile/{$subprofileID}/publisher/emailings", $parameters));
```

The example above requires the [CopernicaRestApi class](./rest-php).

## More information

* [Overview of all API calls](./rest-api)
* [Get Publisher mailings](./rest-get-publisher-emailings)
