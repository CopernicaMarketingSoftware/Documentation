# REST API: GET import

It is possible to fetch import information with an HTTP GET request
to the following URL:

`https://api.copernica.com/v3/import/$id?access_token=xxxx`

The `$id` here should be replaced with the numerical identifier of the import.

## Returned fields

The method returns a JSON object that contains the following fields:

| Variable          | Description                                                                               |
|-------------------|-------------------------------------------------------------------------------------------|
| **ID**            | The ID of the import.                                                                 |
| **name**          | Name of the import.                                                                   |
| **type**          | The type of the import                                                                    |
| **status**        | The status of the import                                                                  |
| **totallines**    | The total number of lines in an import                                                    |
| **processedlines**| The number of processed lines in an import                                                |
| **lastrun**       | Date + timestamp of the last time the import was finished                                 |
| **nextrun**       | Date + timestamp of the next time the import will start                                   |
| **lasterror**     | Description of the last error message                                                     |

### JSON example

The JSON for this method might look something like this:

```json
{
  "ID": "12",
  "name": "https://www.copernica.com/import/testimport.csv",
  "type": "add or update",
  "status": "ready for start",
  "totallines": "0",
  "processedLines": "0",
  "lastrun": false,
  "nextrun": false,
  "lasterror": false
}
```

## PHP example

The following PHP scripts is an example of how to call this API method:

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this to your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// execute the call and print the result.
print_r($api->get("import/{$importID}"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
