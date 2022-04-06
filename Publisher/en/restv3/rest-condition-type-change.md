# REST conditions: Change

Conditions are smaller parts of rules. Only one condition has to be 
satisfied to satisfy a rule. Every condition has a few specific properties.

This article is about the **change** condition. If you're looking for 
any other condition you can find them in the **More information** section.

## Individual properties

The change condition has the following parameters:

* **change-type**: The changetype of the changecondition. See the change types table.
* **field**: Database field to be changed/not changed.
* **interest**: Database interest to be changed/not changed.

## Change types

The following table contains the possible values for the change type and 
their descriptions.

| Change type          | Description                               |
|----------------------|-------------------------------------------|
| any                  | Any change                                |
| none                 | No change                                 |
| field                | Field value changed                       |
| nofield              | Field value not changed                   |
| new                  | Profile was created                       |
| notnew               | Profile was not created                   |
| edit                 | Profile was edited                        |
| noedit               | Profile was not edited                    |
| newsubprofile        | New subprofile added                      |
| nonewsubprofile      | No new subprofile added                   |
| editsubprofile       | Subprofile was edited                     |
| noeditsubprofile     | Subprofile was not edited                 |
| removesubprofile     | Subprofile was removed                    |
| noremovesubprofile   | Subprofile was not removed                |
| interest             | Interest setting changed                  |
| gotinterest          | Interest added that was not there before  |
| lostinterest         | Interest lost that was there before       |

## Date properties

The date properties can be used to limit the selection to a specified 
time period. You can use the date property as follows:

* **before-time**: The timestamp before which the change must have occured. 
* **after-time**: The timestamp after which the change must have occured. 
* **before-mutation**: The beforemutation (time difference) of the changecondition.
* **after-mutation**: The aftermutation (time difference) of the changecondition.

You can specify the value for the 'time' properties in the following format:

```text
'YYYY-MM-DD HH:MM:SS'
'2022-01-01 00:00:00'
```

The 'mutation' properties accept the following string for the value:

```text
'["plus/minus", "count", "unit(second,minute,hour,day,week,month or year)", "floorto(second,minute,hour,day,month or year)"]'
'["plus", "0", "day", "day"]'
```

## Example

We use a condition here when there has ever been a change in any of the 
data.

```php
// dependencies
require_once("copernica_rest_api.php");

// change this to your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// add data for the call
$data = array(
    // select email condition
    'type' => 'Change',
    
    // select change type
    'change-type' => 'any'
);

// execute the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

This example requires the [REST API class](./rest-php).

## More information

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
