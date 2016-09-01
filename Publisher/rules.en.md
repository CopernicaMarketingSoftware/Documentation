As explained in [this article](./views-explained.en.md) a view consists of one
or multiple rules, which contain one or more conditions. With the
/view/\$viewID/rules method you can retrieve all rules of a certain view
or add a new rule to the view.

Properties of rules
-------------------

Rules contain the following information:

-   **ID** (int, system field, cannot be edited)
-   **name** (string, name of the rule. Is not being used)
-   **view** (int, id of the view)
-   **conditions** (array, contains all conditions of the rule)
-   **inversed** (boolean, indicates if the conditions is inversed (by a
    OR NOT relation)
-   **disabled** (boolean, indicates if the conditions is disabled)

GET request
-----------

If you send a GET request, you will retrieve all rules of the given view

### Example GET request

~~~~ {.language-javascript}
https://api.copernica.com/view/13/rules?access_token=ff96963b...
~~~~

Sending the GET request to the url above will result in receiving the
following data:

~~~~ {.language-javascript}
{
    "start":0
    "limit":2
    "total":2
    "data":[
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
        },
        {
            ...
        }
    ]
}
~~~~

POST request
------------

If you want to create a new rule inside a view with id \$viewID, you can
send a POST request containing the data with the properties of a rule.
It is not necessary to include the conditions, that can be done later
on.

### Example POST request

This will be the payload for a POST request, which creates a rule inside
view 13. You can make up any name you want.

~~~~ {.language-javascript}
{"name": "Rule 4","view": "13"}
~~~~
