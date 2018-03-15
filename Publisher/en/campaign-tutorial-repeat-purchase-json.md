# Campaign Tutorial: Repeat purchases JSON

This page contains all the JSON code for the follow-ups discussed in the 
[Repeat purchases campaign tutorial](./campaign-tutorial-repeat-purchase). 

See the article on [importing](./followups-importing-exporting) for more 
information.

## Example

### With email

In this case all you need is two [miniselections](./selections-introduction).

### Without email

This example is applied on a collection. It updates a value from a subprofile 
to a profile depending on the category field of the subprofile.

```json
{
    "name": "Last Phone Purchase Updater",
    "description": "",
    "target": {
        "database": "7656",
        "collection": 20985
    },
    "boxes": [
        {
            "id": "ef563386-2a64-4334-ba4a-83c1431151e7",
            "title": "Followup start",
            "position": {
                "x": 48,
                "y": 64
            },
            "description": "",
            "data": {},
            "type": "link-click",
            "subtype": null,
            "disabled": false
        },
        {
            "id": "c3162089-c309-4b42-88ad-b7003963cf64",
            "title": "Javascript execution",
            "position": {
                "x": 48,
                "y": 176
            },
            "description": "Script defined",
            "data": {
                "script": "if (subprofile.fields.category == \"phones A\") profile.fields.last_phone_a = subprofile.fields.purchase_date;\nelse if (subprofile.fields.category == \"phones B\") profile.fields.last_phone_b = subprofile.fields.purchase_date;"
            },
            "type": "execute",
            "subtype": null,
            "disabled": false
        }
    ],
    "links": [
        {
            "label": "",
            "from": "ef563386-2a64-4334-ba4a-83c1431151e7",
            "to": "c3162089-c309-4b42-88ad-b7003963cf64",
            "comparison": "=="
        }
    ],
    "events": [],
    "comments": [
        {
            "position": {
                "x": -240,
                "y": 176
            },
            "description": "Add purchase date to corresponding field."
        },
        {
            "position": {
                "x": -240,
                "y": 64
            },
            "description": "Purchase was made."
        }
    ]
}
```
