The method miniview/\$miniviewID/rules gives you the (mini-)rules of the
miniview with id \$miniviewID.

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
https://api.copernica.com/miniview/7/rules?access_token=ff96963b...
```

Sending the GET request to the url above will result in receiving the
following data:

```
{
    "start":0
    "limit":1
    "total":1
    "data":[
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
    ]
}
```
