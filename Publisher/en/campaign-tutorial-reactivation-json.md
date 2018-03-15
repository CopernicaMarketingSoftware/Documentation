# Campaign Tutorial: Re-activation campaign tutorial

This page contains all the JSON code for the examples discussed in the 
[Re-activation campaign tutorial](./campaign-tutorial-profile-enrichment). 

See the article on [importing](./followups-importing-exporting) for more 
information.

## Example

This follow-up example is applied to a collection. It copies a value 
from a subprofile to a profile, in this case "purchase_date" from the 
subprofile to "last_purchase_date" in the profile.

```
{
    "name": "Last purchase date updater",
    "description": "This follow-up updates the \"last purchase date\"  field in the profile.",
    "target": {
        "database": "7656",
        "collection": 20985
    },
    "boxes": [
        {
            "id": "2606b5e1-ac4d-4777-bfa6-d8ccea637970",
            "title": "Followup start",
            "position": {
                "x": -32,
                "y": -160
            },
            "description": "",
            "data": [],
            "type": "link-click",
            "subtype": null,
            "disabled": false
        },
        {
            "id": "f771bae6-79cc-4015-8563-44e340d97002",
            "title": "Javascript execution",
            "position": {
                "x": -32,
                "y": -48
            },
            "description": "Script defined",
            "data": {
                "script": "profile.fields.last_purchase_date = subprofile.fields.purchase_date;"
            },
            "type": "execute",
            "subtype": null,
            "disabled": false
        }
    ],
    "links": [
        {
            "label": "",
            "from": "2606b5e1-ac4d-4777-bfa6-d8ccea637970",
            "to": "f771bae6-79cc-4015-8563-44e340d97002",
            "comparison": "=="
        }
    ],
    "events": [],
    "comments": [
        {
            "position": {
                "x": -288,
                "y": -160
            },
            "description": "Purchase is made."
        },
        {
            "position": {
                "x": -288,
                "y": -48
            },
            "description": "Update date of last purchase in the profile."
        }
    ]
}
```

[Back to the tutorial](./campaign-tutorial-reactivation)
