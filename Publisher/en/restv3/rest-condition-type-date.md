# REST conditions: Date

Conditions are smaller parts of rules. Only one condition has to be 
satisfied to satisfy a rule. Every condition has a few specific properties.

This article is about the **date** condition. If you're looking for 
any other condition you can find them in the **More information** section.

## Individual properties

The date condition has the following parameters:

* **field**: The databasefield of the date condition.
* **compare-mode**: Compare mode of the date condition. Possible values: 
"full" when the full data must match, "ignoreyear" if the year may not match.

## Date properties

The date properties can be used to limit the selection to a specified 
time period. All of the variables below are required to be YYYY-MM-DD HH:MM:SS 
format.

* **before-time**: Matches only if the date value was in the field before given time
* **after-time**: Matches only if the date value was in the field after given time
* **before-mutation**: The variable time after which the chosen date field must be.
* **after-mutation**: The variable time before which the chosen date field must be.

## PHP example

Here we look at a date in a database in combination with an after-mutation. 
If the date falls within the after-mutation this condition is validated.

```php
// required code
require_once("copernica_rest_api.php");

// make a new api object with your access token
$api = new CopernicaRestAPI("your-access-token", 3);

$data = array(
    // select date condition
    'type' => 'Date',

    // use time interval
    'before-time' => '2018-01-01 00:00:00',

    // use mutation interval (overwrites before-time/after-time)
    'after-mutation' => '["plus","2016-01-01", "7:34:23"]',
);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

This example requires the [REST API class](./rest-php).

## More information

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
* [Condition type change](rest-condition-type-change)
