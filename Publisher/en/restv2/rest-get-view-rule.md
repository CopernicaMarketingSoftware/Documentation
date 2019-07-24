# REST API: GET view rule

Selections use rules to decide which profiles are included in the selection
and which profiles are not. Profile that match at least on of the selection rules 
are included in the selection. To retrieve the properties and the conditions of a 
single rule, you can send a HTTP GET request to the following URL:

`https://api.copernica.com/v2/view/$id/rule/$id?access_token=xxxx`

The first `$id` code should be replaced with the numeric identifier of the 
selection from which you want to retrieve a rule. The second `$id` parameter
should be the ID of the rule.

## Returned fields

This method returns rule data. The following properties are returned:

* **ID**: ID of the rule
* **name**: Name of the rule
* **view**: ID of the selection to which the rule belongs
* **disabled**: Boolean value whether the rule is disabled / not used to match profiles
* **inverted**: Boolean value whether this is an inverted rule, meaning that profiles are included in the rule if they do *not* match the rule
* **conditions**: Array of conditions in the rule

### Conditions

A rule on its own contains conditions. For a profile to match a rule, it 
has to match all the conditions. The **conditions** property that is returned
by this method holds an array of condition objects, with the following 
properties per condition:

* **ID**: numeric ID of the condition
* **type**: condition type
* **rule**: numeric ID of the rule to which the condition belongs

Based on the condition type, specific properties are set. Specific condition 
types are discussed in separate articles, which are linked in the "More 
information" section.

### JSON example

The JSON for a rule looks something like this:

```json
{  
    "ID":"4012",
    "name":"Rule",
    "view":"4184",
    "conditions":{  
    "start":0,
    "limit":100,
    "count":1,
    "data":[  
        {  
            "ID":"2110",
            "type":"Field",
            "rule":"4039",
            "comparison":"equals",
            "field":{  
                "ID":"22142",
                "name":"subscribed",
                "type":"text",
                "value":"no",
                "displayed":false,
                "ordered":false,
                "length":"255",
                "textlines":"3",
                "hidden":false,
                "index":false
            },
            "value":"yes",
            "other-field":false,
            "numeric-comparison":false
        }
    ],
    "total":1
    },
    "inversed":false,
    "disabled":false
}
```

## PHP example

The following script can be used to fetch the properties of a rule.

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// do the call, and print result
print_r($api->get("view/{$viewID}/rule/{$ruleID}"));
```

The example above requires the [CopernicaRestApi class](rest-php).    

## More information

* [Overview of all API calls](./rest-api.md)
* [GET view rules](./rest-get-view-rules.md)
* [POST view rule](./rest-post-view-rules.md)
* [PUT rule](./rest-put-rule.md)
* [DELETE rule](./rest-delete-rule.md)
* [PUT rule condition](./rest-post-rule-conditions.md)
* [DELETE rule condition](./rest-delete-condition.md)

Since there are many condition types which behave very differently each 
condition type is explained in a separate article below.

* [Change conditions](./rest-condition-type-change.md)
* [Date conditions](./rest-condition-type-date.md)
* [DoubleField conditions](./rest-condition-type-doublefield.md)
* [Email conditions](./rest-condition-type-email.md)
* [Fax conditions](./rest-condition-type-fax.md)
* [Field conditions](./rest-condition-type-field.md)
* [Interest conditions](./rest-condition-type-interest.md)
* [LastContact conditions](./rest-condition-type-lastcontact.md)
* [Miniview conditions](./rest-condition-type-miniview.md)
* [SMS conditions](./rest-condition-type-sms.md)
* [Todo conditions](./rest-condition-type-todo.md)
* [Survey conditions](./rest-condition-type-survey.md)
* [Part conditions](./rest-condition-type-part.md)
* [ReferView conditions](./rest-condition-type-referview.md)
