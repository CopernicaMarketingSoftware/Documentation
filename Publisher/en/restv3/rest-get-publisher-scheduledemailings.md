# REST API: GET scheduledemailings (Publisher)

A scheduled emailing is an emailing that is scheduled to be sent in the 
future. Its start date can lie in the future as well as the past, as it 
can be sent multiple times. This method retrieves a list of all scheduled 
emailings sent with Publisher. The method sends an HTTP GET request to 
the following address:

`https://api.copernica.com/v3/ms/scheduledemailings?access=token=xxxx`

You can find the method to retrieve all of the sent Publisher mailings [here](./rest-get-publisher-emailings).

## Available parameters

The following parameters are available for the method:

* **type**: Indicates the type of mailings to retrieve between 'individual',
'mass' or 'both'. All mailings will be retrieved by default.
* **test**: Indicates whether to only retrieve test mailings ('test'), regular 
mailings ('normal') or both ('both'). All mailings will be retrieved by 
default.
* **fromdate**: A timestamp after which the next mailing should be sent (YYYY-MM-DD HH:MM:SS format).

## Returned fields

This method returns a JSON object with scheduled emailings under the **data**
field. Every emailing contains the following fields:

* **id**:                   The ID of the scheduled emailing.
* **next**:                 The timestamp of the next mailing (YYYY-MM-DD HH:MM:SS format).
* **previous**:             The timestamp of the previous mailing (YYYY-MM-DD HH:MM:SS format).
* **interval**:             An array for the time interval indicating the 'count' and the 'unit'.
* **iterations**:           The total number of times the mailing will be sent, or -1 for infinite mailings.
* **processed_iterations**: The total number of times the mailing has been sent.
* **scheduled_iterations**: The total number of times the mailing will be sent in the future, or -1 for infinite mailings.
* **document**:             The ID of the document used for this mailing.
* **template**:             The ID of the template used for this mailing.
* **subject**:              The subject of the mailing.
* **from_address**:         An array containing the 'name' and the email address ('email') of the sender.
* **testgroups**:           The number of testgroups used in this mailing.
* **emailing_type**:        Type of the mailing (splitrun, A/B test, normal).
* **contenttype**:          Type of content in this mailing; 'html', 'text' or 'both'.
* **target**:               Contains the target of the mailing and the ID and the types 
                            of the entities it is structured under (for example the database 
                            a collection belongs to).

### JSON example

The JSON object that will be returned contains a property named **data**, 
which is an array with **emailing** objects. A single one of these emailings 
looks like this:

```json
{
    "id":"456",
    "next":"2020-01-01 00:00:00",
    "previous":"2020-01-02 00:00:00",
    "interval":
        {
            "count":1,
            "unit":"day"
        },
    "iterations":-1,
    "processed_iterations":"168",
    "scheduled_iterations":"-1",
    "document":123,
    "template":234,
    "subject":"Your daily reminder",
    "from_address":
        {
            "name":John Doe,
            "email":test@copernica.com
        },
    "testgroups":2,
    "emailing_type":"splitrun",
    "contenttype":"both",
    "target":
        {
            "type":"database",
            "sources":
            [{
                "id":"1234",
                "type":"database"
            }]
        }
    }
}

```

## PHP Example

The following script demonstrates how to use this method.

```php
// required scripts
require_once('copernica_rest_api.php');

// change this to your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters to use in the call
$parameters = array(
    'type'  => 'mass',
    'test'  => 'normal',
);

// execute the request and print the result
print_r($api->get("publisher/scheduledemailings", $parameters));
```

The example above requires the [CopernicaRestApi class](./rest-php).

## More information

* [Overview of all API calls](./rest-api)
* [GET (processed) Publisher mailings](./rest-get-emailings)
* [GET Marketing Suite scheduled emailings](./rest-get-ms-scheduledemailings)
