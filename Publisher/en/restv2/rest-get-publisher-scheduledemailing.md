# REST API: GET scheduledemailing (Publisher)

A scheduled emailing is an emailing that is scheduled to be sent in the 
future. Its start date can lie in the future as well as the past, as it 
can be sent multiple times. This method retrieves a scheduled emailing 
sent with Publisher. The method sends an HTTP GET request to 
the following address:

`https://api.copernica.com/v2/ms/scheduledemailing/$id?access=token=xxxx`

The **$id** should be replaced with the ID of the scheduled emailing you want 
to retrieve. You can find the method to retrieve all of the scheduled 
Publisher mailings [here](./rest-get-publisher-scheduledemailings).

## Returned fields

This method returns a JSON object with the scheduled emailing. The emailing 
contains the following fields:

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

The JSON object representing the emailing will look something like this:

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

// execute the request and print the result
print_r($api->get("publisher/scheduledemailing/{$emailingID}"));
```

The example above requires the [CopernicaRestApi class](./rest-php).

## More information

* [Overview of all API calls](./rest-api)
* [GET scheduled Publisher mailings](./rest-get-scheduledemailings)
