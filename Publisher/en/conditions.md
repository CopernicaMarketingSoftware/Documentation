As explained in [this article](./views-explained.md) a view consists of one
or multiple rules, which contain one or more conditions. With the
/rule/\$ruleID/conditions method you can retrieve all conditions of a
certain rule or add a new condition to the rule.

Properties of conditions
------------------------

A conditions that compares the value of a field with a certain value
contains the following information:

-   **ID** (int, system field, cannot be edited)
-   **type** (string, type of condition, see [views
    explained](./views-explained.md) for all types)
-   **rule** (int, id of the rule)
-   **comparison** (array, contains the way of comparing)
-   **field** (array, points to a field (if the type of condition is
    'Field')
-   **value** (string, value to compare the field with)
-   **other-field** (boolean, indicates if the comparison is with
    another field
-   **numeric-comparison** (boolean, indicates if the values are
    compaired numerically)

GET request
-----------

If you send a GET request, you will retrieve all conditions of the given
rule.

### Example GET request

```
https://api.copernica.com/v1/rule/5/conditions?access_token=ff96963b...
```

Sending the GET request to the url above will result in receiving the
following data:

```
{
    "ID":"5"
    "name":"Rule 1"
    "view":"13"
    "conditions":{
        "start":0
        "limit":2
        "total":2
        "data":[
            {
                "ID":"4"
                "type":"Field"
                "rule":"5"
                "comparison":"equals"
                "field":{
                    "ID":"13"
                    "name":"Email"
                    "type":"email"
                    "value":""
                    "displayed":true
                    "ordered":false
                    "length":"50"
                    "textlines":"1"
                    "hidden":false
                    "index":false
                }
                "value":"jonas.lodewegen@copernica.com"
                "other-field":false
                "numeric-comparison":false
            },
            {
                "ID": "18"
                "type": "Field"
                "rule": "5"
                "comparison": "more"
                "field": "false"
                "value": "0"
                "other-field": "false"
                "numeric-comparison": "false"
            }
        ]   
    "inversed":"false"
    "disabled":"false"
    }
```

POST request
------------

If you want to create a new condition inside a rule with id \$ruleID,
you can send a POST request containing the data with the properties of a
condition.

### Example POST request

This will be the payload for a POST request, which creates an (empty)
condition inside view 5. The type of the condition is case-sensitive!

```
{"name": "Rule 4","view": "13"}
```
