The method minirule/\$miniruleID gives you information about the
minirule with id \$miniruleID.

Properties of a minirule
------------------------

A minirule contains the following information:

-   **ID** (int, system field, cannot be edited)
-   **name** (string, name of the miniview)
-   **view** (int, id of the miniview to which the rule belongs)
-   **conditions** (array with conditions)
-   **inversed** (boolean, can invert the rule)
-   **disabled** (boolean, indicates whether rule is disabled)

GET-request
-----------

```
https://api.copernica.com/v1/minirule/6?access_token=ff96963b...
```

Sending the GET request to the url above will result in receiving the
following data:

```
{
    "ID":"6"
    "name":"Rule 1"
    "view":"7"
    "conditions":
    {
        "start":0
        "limit":1
        "total":1
        "data":[
            {
                "ID":"1"
                "type":"DoubleField"
                "rule":"6"
                "match-mode":"match_unique_subprofiles"
                "fields":
                {
                    "start":0
                    "limit":1
                    "total":1
                    "data":[
                        {
                            "ID":"74"
                            "name":"Inhoud"
                            "type":"text"
                            "value":""
                            "displayed":true
                            "ordered":false
                            "length":"255"
                            "textlines":"1"
                            "hidden":false
                            "index":false
                        }
                    ]
                }
            }
        ]
    }
    "inversed":false
    "disabled":false
}
```

PUT request
-----------

A minirule get be edited by a PUT request. You can send this to an URL
like the one below:

```
https://api.copernica.com/v1/minirule/6?access_token=ff96963b...
```

The following payload inverts the minirule:

```
{"inversed":"true"}
```
