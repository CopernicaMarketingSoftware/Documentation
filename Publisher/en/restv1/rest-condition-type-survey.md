# REST conditions: Survey

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv2/rest-api.md) of the REST API.

Conditions are smaller parts of rules. Only one condition has to be 
satisfied to satisfy a rule. Every condition has a few specific properties.

This article is about the **survey** condition. If you're looking for 
any other condition you can find them in the **More information** section.

## Individual properties

The survey condition has the following parameters:

* **submitter**: Required submitter of the survey. See the required submitters table.
* **survey-name**: Name of survey to check submission for.

## Required submitters

The following table contains the possible values for required submitters 
and their description.

| Required submitter | Description                                  |
|--------------------|----------------------------------------------|
| profile            | Survey must be submitted by the profile.     |
| subprofile         | Survey must be submitted by the subprofile.  |
| anything           | Survey can be submitted by any profile.      |
| none               | Survey was not submitted.                    |
| noprofile          | Survey was not submitted by profile.         |
| nosubprofile       | Survey was not submitted by subprofile.      |

## Date properties

The date properties can be used to limit the selection to a specified 
time period. All of the variables below are required to be YYYY-MM-DD HH:MM:SS 
format.

* **before-time**: Matches only profiles that received the document before this time
* **after-time**: Matches only profiles that received the document after this time
* **before-mutation**: The beforemutation (time difference) for the survey condition.
* **after-mutation**: The aftermutation (time difference) for the survey condition.

## Example

Sometimes people forget that you sent them an import survey, while you need 
the data! You can easily send an email to a selection of the people that 
forget with the survey condition. The following condition is validated when 
someone has not submitted your survey yet. 

```php
// required code
require_once("copernica_rest_api.php");

// make a new api object with your access token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // select survey condition
    'type' => 'Survey',

    // set survey name
    'survey-name' => 'survey x',
    
    // set submitter
    'submitter' => 'none'
);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
